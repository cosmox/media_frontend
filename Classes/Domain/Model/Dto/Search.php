<?php
namespace Webfox\MediaFrontend\Domain\Model\Dto;

/***************************************************************
 *  Copyright notice
 *  (c) 2013 Dirk Wenzel <wenzel@webfox01.de>
 *  All rights reserved
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Search object for searching text in fields
 *
 * @package TYPO3
 * @subpackage tx_media_frontend
 */
class Search extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Basic search word
	 *
	 * @var \string
	 */
	protected $subject;

	/**
	 * Search fields
	 *
	 * @var \string
	 */
	protected $fields;

	/**
	 * Get the subject
	 *
	 * @return \string
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * Set subject
	 *
	 * @param \string $subject
	 * @return void
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
	}

	/**
	 * Get fields
	 *
	 * @return \string A comma separated list of search fields
	 */
	public function getFields() {
		return $this->fields;
	}

	/**
	 * Set fields
	 *
	 * @param $fields A comma separated list of search fields
	 * @return void
	 */
	public function setFields($fields) {
		$this->fields = $fields;
	}

}

?>
