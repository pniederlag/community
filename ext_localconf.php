<?php
	if (!defined ('TYPO3_MODE')) {
		die ('Access denied.');
	}

	Tx_Extbase_Utility_Extension::configurePlugin(
		$_EXTKEY,
		'List',
		array(
			'Banner' => 'index, list, show',

		),
		array(
			'Banner' => 'show',

		)
	);

	// Register extension list update task
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['Tx_Randombanners_Task_SendingMonthlyMailsTask'] = array(
		'extension'        => $_EXTKEY,
		'title'            => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.xml:tx_randombanners_task_sendingmonthlymailstask.name',
		'description'      => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.xml:tx_randombanners_task_sendingmonthlymailstask.description',
		'additionalFields' => '',
	);

	$TYPO3_CONF_VARS['FE']['eID_include']['randombanners'] = 'EXT:randombanners/Classes/Ajax/RandomBannersAjax.php';

?>