<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'List',
	'List banners'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . list;
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .list. '.xml');


t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Random banners');


t3lib_extMgm::addLLrefForTCAdescr('tx_randombanners_domain_model_banner', 'EXT:randombanners/Resources/Private/Language/locallang_csh_tx_randombanners_domain_model_banner.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_randombanners_domain_model_banner');
$TCA['tx_randombanners_domain_model_banner'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xml:tx_randombanners_domain_model_banner',
		'label' 			=> 'name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Banner.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_randombanners_domain_model_banner.gif'
	),
);

?>