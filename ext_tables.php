<?php 
if (!defined ('TYPO3_MODE')) die ('Access denied.');

Tx_Extbase_Utility_Extension::registerPlugin(
    $_EXTKEY,
    'Pi1',
    'Flickr Feed integration'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Default config for '.$_EXTKEY);

$extensionName = strtolower(t3lib_div::underscoredToLowerCamelCase($_EXTKEY));

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$extensionName . '_pi1'] = 'layout,select_key,recursive,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$extensionName . '_pi1'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($extensionName . '_pi1', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');

?>