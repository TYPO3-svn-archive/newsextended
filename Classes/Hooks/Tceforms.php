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
 * Hook into tceforms
 *	- Preset fields
 *
 * @package TYPO3
 * @subpackage tx_newsextended
 */
class Tx_Newsextended_Hooks_Tceforms {

	/**
	 * Add be user name/email as default value
	 *
	 * @param string $table
	 * @param string $field
	 * @param array $row
	 * @param string $altName
	 * @param string $palette
	 * @param string $extra
	 * @param string $pal
	 * @param t3lib_TCEforms  $parentObject
	 */
	public function getSingleField_preProcess($table, $field, array &$row, $altName, $palette, $extra, $pal, t3lib_TCEforms $parentObject) {

		$configuration = Tx_Newsextended_Utility_EmConfiguration::getSettings();

			// just for new fields
		if ($table === 'tx_news_domain_model_news' && !is_numeric($row['uid']) && $configuration->getUseBeUserInformation()) {
			$row['author'] = $GLOBALS['BE_USER']->user['realName'];
			$row['author_email'] = $GLOBALS['BE_USER']->user['email'];
		}
	}

}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/newsextended/Classes/Hooks/Tceforms.php']) {
	require_once ($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/newsextended/Classes/Hooks/Tceforms.php']);
}

?>