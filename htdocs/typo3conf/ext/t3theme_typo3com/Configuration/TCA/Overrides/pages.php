<?php


/**
 * Custom Doktypes for Features and Case Studies
 */
$itemsConf = array(
    'Feature',
    101,
    'page-doktype-feature'
);
$GLOBALS['TCA']['pages']['columns']['doktype']['config']['items'][] = $itemsConf;
$GLOBALS['TCA']['pages_language_overlay']['columns']['doktype']['config']['items'][] = $itemsConf;

$itemsConf = array(
    'Case Study',
    102,
    'page-doktype-casestudy'
);
$GLOBALS['TCA']['pages']['columns']['doktype']['config']['items'][] = $itemsConf;
$GLOBALS['TCA']['pages_language_overlay']['columns']['doktype']['config']['items'][] = $itemsConf;

$GLOBALS['TCA']['pages']['ctrl']['typeicon_classes'][101] = 'page-doktype-feature';
$GLOBALS['TCA']['pages']['ctrl']['typeicon_classes'][102] = 'page-doktype-casestudy';