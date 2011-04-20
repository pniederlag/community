<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_randombanners_domain_model_banner'] = array(
	'ctrl' => $TCA['tx_randombanners_domain_model_banner']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, link, email, logo, displayed_this_month, clicked_this_month, displayed_last_month, clicked_last_month',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, link, email, logo, displayed_this_month, clicked_this_month, displayed_last_month, clicked_last_month,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_randombanners_domain_model_banner',
				'foreign_table_where' => 'AND tx_randombanners_domain_model_banner.pid=###CURRENT_PID### AND tx_randombanners_domain_model_banner.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' =>array(
				'type' =>'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
			'type' => 'input',
			'size' => 30,
			'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xml:tx_randombanners_domain_model_banner.name',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'link' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xml:tx_randombanners_domain_model_banner.link',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'email' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xml:tx_randombanners_domain_model_banner.email',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'logo' => txdam_getMediaTCA('image_field', 'tx_randombanner_dam_images'),
		'displayed_this_month' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xml:tx_randombanners_domain_model_banner.displayed_this_month',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int',
				'readOnly' => 1,
			),
		),
		'clicked_this_month' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xml:tx_randombanners_domain_model_banner.clicked_this_month',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int',
				'readOnly' => 1,
			),
		),
		'displayed_last_month' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xml:tx_randombanners_domain_model_banner.displayed_last_month',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int',
				'readOnly' => 1,
			),
		),
		'clicked_last_month' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:randombanners/Resources/Private/Language/locallang_db.xml:tx_randombanners_domain_model_banner.clicked_last_month',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'trim',
				'readOnly' => 1,
			),
		),
	),
);

$TCA['tx_randombanners_domain_model_banner']['columns']['logo']['config']['minitems'] = 1;
$TCA['tx_randombanners_domain_model_banner']['columns']['logo']['config']['maxitems'] = 1;
$TCA['tx_randombanners_domain_model_banner']['columns']['logo']['config']['size'] = 2;

?>