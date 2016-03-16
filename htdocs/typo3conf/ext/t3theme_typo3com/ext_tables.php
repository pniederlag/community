<?php

if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript',
    'TYPO3.com base settings');

/**
 * Custom Doktypes for Features and Case Studies
 */
$GLOBALS['PAGES_TYPES'][101] = array(
    'type' => 'web',
    'allowedTables' => '*'
);

$GLOBALS['PAGES_TYPES'][102] = array(
    'type' => 'web',
    'allowedTables' => '*'
);