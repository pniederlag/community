<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Spam Remover Plugin'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Spam Remover for typo3org');

t3lib_extMgm::addLLrefForTCAdescr('tx_t3orgspamremover_domain_model_spamreport', 'EXT:t3org_spamremover/Resources/Private/Language/locallang_csh_tx_t3orgspamremover_domain_model_spamreport.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_t3orgspamremover_domain_model_spamreport');
$TCA['tx_t3orgspamremover_domain_model_spamreport'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3org_spamremover/Resources/Private/Language/locallang_db.xml:tx_t3orgspamremover_domain_model_spamreport',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,description,reporter,spammer,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/SpamReport.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3orgspamremover_domain_model_spamreport.gif'
	),
);

t3lib_div::loadTCA('fe_users');
$tempColumns = array(
	'tx_t3orgspamremover_spam' => array(
		'exclude' => 0,
		'label' => 'Reported Spam',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tx_t3orgspamremover_domain_model_spamreport',
			'appearace' => array(
				'collapseAll' => TRUE,
			),
			'foreign_field' => 'spammer',
		),
	),
);
t3lib_extMgm::addTCAcolumns("fe_users", $tempColumns, TRUE);
t3lib_extMgm::addToAllTCAtypes('fe_users', '--div--;Reported Spam,tx_t3orgspamremover_spam');

?>