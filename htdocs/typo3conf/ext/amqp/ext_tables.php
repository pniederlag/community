<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

if (TYPO3_MODE == 'BE' ) {
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['reports']['tx_reports']['status']['providers']['amqp'] = array(
		'Tx_Amqp_Reports_ConnectionStatus',
		'Tx_Amqp_Reports_RegisteredConsumers',
	);
}
?>
