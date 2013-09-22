<?php
namespace Webfox\MediaFrontend\Utility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * A class for handling settings of the extension
 */
class Setting implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * @var string
	 */
	protected $extensionKey = 'media_frontend';

	/**
	 * @var array
	 */
	protected $settings = array();

	/**
	 * Returns a class instance.
	 *
	 * @return \Webfox\MediaFrontend\Utility\Setting
	 */
	static public function getInstance() {
		return \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Webfox\MediaFrontend\Utility\Setting');
	}

	/**
	 * Constructor
	 *
	 * @return \Webfox\MediaFrontend\Utility\Setting
	 */
	public function __construct() {
		$settings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$this->extensionKey]);
		$this->settings = \TYPO3\CMS\Core\Utility\GeneralUtility::array_merge($this->defaultSettings, $settings);
	}

	/**
	 * @var array
	 */
	protected $defaultSettings = array(
		'storage' => 1,
		'recycler_folder' => '_recycler_',
		'mount_point_for_file_type_1' => 0, // text (txt, html, ...)
		'mount_point_for_file_type_2' => 0, // image
		'mount_point_for_file_type_3' => 0, // audio
		'mount_point_for_file_type_4' => 0, // video
		'mount_point_for_file_type_5' => 0, // application (pdf, doc, ...)
		'mount_point_for_variants' => 0, // mount point for images generated by the image editor.
		'media_folders' => '', // pid where to store media
		'category_folders' => '', // pid where to find categories
		'image_thumbnail' => '100x100',
		'image_mini' => '120x120',
		'image_small' => '320x320',
		'image_medium' => '760x760',
		'image_large' => '1200x1200',
		'image_original' => '1920x1920',
		'default_categories' => '',
		'extension_allowed_file_type_1' => 'txt, html',
		'extension_allowed_file_type_2' => 'jpg, jpeg, bmp, png, tiff, tif, gif, eps',
		'extension_allowed_file_type_3' => 'mp3, mp4, m4a, wma, f4a',
		'extension_allowed_file_type_4' => 'mov, avi, mpeg, mpg, mp4, m4v, flv, f4v, webm, wmv, ogv, 3gp',
		'extension_allowed_file_type_5' => 'doc, docx, dotx, ppt, pptx, pps, ppsx, odt, xls, xlsx, xltx, pdf, zip, rtf, xlt',
		'variations' => '200x200, 300x300',
	);

	/**
	 * Returns a setting key.
	 *
	 * @param string $key
	 * @return array
	 */
	public function get($key) {
		$settings = $this->getSettings();
		return isset($settings[$key]) ? $settings[$key] : NULL;
	}

	/**
	 * Set a setting key.
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function set($key, $value) {
		$this->settings[$key] = $value;
	}

	/**
	 * @return array
	 */
	public function getSettings() {
		return $this->settings;
	}

	/**
	 * @param array $settings
	 */
	public function setSettings($settings) {
		$this->settings = $settings;
	}
}
?>
