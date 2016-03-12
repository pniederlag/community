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
}