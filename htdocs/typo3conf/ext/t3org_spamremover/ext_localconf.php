<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'SpamReport' => 'new,create,thanks',
		'Spammer' => 'list,show,confirm,delete',
	),
	// non-cacheable actions
	array(
		'SpamReport' => 'new,create,confirm,delete',
	)
);

?>