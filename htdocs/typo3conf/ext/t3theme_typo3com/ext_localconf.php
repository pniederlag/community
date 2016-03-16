<?php


if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

if (TYPO3_MODE === 'BE') {

    // homepage backend layout
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['BackendLayoutFileProvider']['file'][]
        =  'EXT:t3theme_typo3com/Configuration/TypoScript/BackendLayout/Homepage.ts';

    // contentpage backend layout
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['BackendLayoutFileProvider']['file'][]
        =  'EXT:t3theme_typo3com/Configuration/TypoScript/BackendLayout/Contentpage.ts';

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Imaging\IconRegistry::class
    );
    $iconRegistry->registerIcon(
        'page-doktype-casestudy',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:t3theme_typo3com/Resources/Public/Icons/page-doktype-casestudy.svg']
    );
    $iconRegistry->registerIcon(
        'page-doktype-feature',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:t3theme_typo3com/Resources/Public/Icons/page-doktype-feature.svg']
    );
}