<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(function () {

    // Add theme's general PageTSConfig
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        't3theme',
        'Configuration/TSConfig/PageGeneral.tsc',
        'EXT:t3theme :: General PageTSConfig'
    );

    // Add "Only X" PageTSConfig
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        't3theme',
        'Configuration/TSConfig/Page/OnlyFeUsers.tsc',
        'EXT:t3theme :: Restrict pages to FeUsers/FeGroups'
    );

    // Add ext:realurl tca palette to pagetype "Link to External URL"
    if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('realurl', true)) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
            'pages',
            'tx_realurl_pathsegment;;137;;,tx_realurl_exclude',
            '3',
            'after:nav_title'
        );
    }
});
