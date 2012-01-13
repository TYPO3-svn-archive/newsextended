<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

	// Hook into TceMain
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][$_EXTKEY] =
	'EXT:' . $_EXTKEY. '/Classes/Hooks/Tcemain.php:Tx_Newsextended_Hooks_Tcemain';

	// Hook into Tceforms
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tceforms.php']['getSingleFieldClass'][$_EXTKEY] =
	'EXT:' . $_EXTKEY. '/Classes/Hooks/Tceforms.php:Tx_Newsextended_Hooks_Tceforms';


?>