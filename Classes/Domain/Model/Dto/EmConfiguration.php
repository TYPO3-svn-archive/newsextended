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
 * Extension Manager configuration
 *
 * @package TYPO3
 * @subpackage tx_newsextended
 */
class Tx_Newsextended_Domain_Model_Dto_EmConfiguration {

	/**
	 * Fill the properties properly
	 *
	 * @param array $configuration em configuration
	 * @return void
	 */
	public function __construct(array $configuration) {
		foreach($configuration as $key => $value) {
			$this->$key = $value;
		}
	}

	/**
	 * @var boolean
	 */
	protected $useBeUserInformation = TRUE;

	/**
	 * @var boolean
	 */
	protected $fillEmptyPathSegment = TRUE;

	/**
	 * @return boolean
	 */
	public function getUseBeUserInformation() {
		return (bool)$this->useBeUserInformation;
	}

	/**
	 * @return boolean
	 */
	public function getFillEmptyPathSegment() {
		return (bool)$this->fillEmptyPathSegment;
	}



}

?>