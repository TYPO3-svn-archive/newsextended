<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Georg Ringer <typo3@ringerge.org>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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
 * Hook into tcemain
 *	- Update path_segment with title if empty
 *
 * @package TYPO3
 * @subpackage tx_newsextended
 */
class Tx_Newsextended_Hooks_Tcemain {

	/**
	 * Generate a different preview link
	 *
	 * @param string $status status
	 * @param string $table tablename
	 * @param integer $recordUid id of the record
	 * @param array $fieldArray fieldArray
	 * @param t3lib_TCEmain $parentObject parent Object
	 * @return void
	 */
	public function processDatamap_afterDatabaseOperations($status, $table, $recordUid, array $fieldArray, t3lib_TCEmain $parentObject) {


		if ($table === 'tx_news_domain_model_news') {
			$configuration = Tx_Newsextended_Utility_EmConfiguration::getSettings();

			if ($configuration->getFillEmptyPathSegment()) {

				if (!is_numeric($recordUid)) {
					$recordUid = $parentObject->substNEWwithIDs[$recordUid];
				}

				$record = t3lib_BEfunc::getRecord($table, $recordUid);

				if (empty($record['path_segment'])) {
					$update = array(
						'path_segment' => $record['title']
					);
					$GLOBALS['TYPO3_DB']->exec_UPDATEquery($table, 'uid=' . $recordUid, $update);
				}
			}
		}
	}


}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/newsextended/Classes/Hooks/Tcemain.php']) {
	require_once ($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/newsextended/Classes/Hooks/Tcemain.php']);
}

?>