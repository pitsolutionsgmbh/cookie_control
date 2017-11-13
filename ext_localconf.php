<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'PITSOLUTIONS.' . $_EXTKEY,
	'Cookiecontrol',
	array(
		'Cookiecontrol' => 'list, show, delete',
		
	),
	// non-cacheable actions
	array(
	)
);

$TYPO3_CONF_VARS['FE']['eID_include']['cookieDelete'] = 'EXT:cookie_control/Classes/Utility/cookieHandlerController.php';
