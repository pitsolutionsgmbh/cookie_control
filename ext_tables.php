<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'PITSOLUTIONS.' . $_EXTKEY,
	'Cookiecontrol',
	'Cookie Control'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Cookie Control');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_cookiecontrol_domain_model_cookiecontrol', 'EXT:cookie_control/Resources/Private/Language/locallang_csh_tx_cookiecontrol_domain_model_cookiecontrol.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_cookiecontrol_domain_model_cookiecontrol');

// Include flex forms
$pluginSignature = str_replace('_', '', $_EXTKEY) . '_' .    'cookiecontrol'; // from registerPlugin(...)
$TCA['tt_content']['types']['list']['subtypes_addlist']   [$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,    
    'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_cookiecontrol.xml'
); 