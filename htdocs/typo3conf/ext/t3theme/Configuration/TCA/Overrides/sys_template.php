<?php
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3_MODE') || die ('Access denied.');

// Embed static TypoScript template(s)
$websites = array('Base', 'Typo3Org', 'Typo3Com');
foreach($websites as $website) {
    ExtensionManagementUtility::addStaticFile(
        't3theme',
        'Configuration/TypoScript/Tree/' . $website,
        'Thm TS:' . $website
    );
}
