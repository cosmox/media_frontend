<?php
namespace Webfox\MediaFrontend\Domain\Repository;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Dirk Wenzel <wenzel@webfox01.de>, Agentur Webfox
 *  
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
 *
 *
 * @package media_frontend
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class AssetRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

		public function myFileOperationsFal($filename, $filetype, $filesize, $uidNew){

		$newSysFields = array(
				'pid' => 0,
				'identifier' =>'/user_upload/'.$filename,
				'mime_type' => $filetype,
				'name' => $filename,
				'size' => $filesize,
				'storage' => 1,
				'crdate' => $GLOBALS['EXEC_TIME'],
				'tstamp' => $GLOBALS['EXEC_TIME']
		);

		$newSysRes = $GLOBALS['TYPO3_DB']->exec_INSERTquery('sys_file', $newSysFields);

		$uid_local = $GLOBALS['TYPO3_DB']->sql_insert_id($newSysRes);
		$newRefFields = array(
				'pid' => 17,
				'tablenames' => 'tx_mediafrontend_domain_model_asset',
				'uid_foreign' => $uidNew,
				'uid_local' => $uid_local,
				'table_local' => 'sys_file',
				'fieldname' => 'files',
				'crdate' => $GLOBALS['EXEC_TIME'],
				'tstamp' => $GLOBALS['EXEC_TIME']
		);

		$GLOBALS['TYPO3_DB']->exec_INSERTquery('sys_file_reference', $newRefFields);
		}

}
?>
