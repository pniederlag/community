<?php

/**
 * Custom Doktypes for Features and Case Studies
 */
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$itemsConf = [
    'Feature',
    101,
    'page-doktype-feature',
];
$GLOBALS['TCA']['pages']['columns']['doktype']['config']['items'][] = $itemsConf;
$GLOBALS['TCA']['pages_language_overlay']['columns']['doktype']['config']['items'][] = $itemsConf;

$itemsConf = [
    'Case Study',
    102,
    'page-doktype-casestudy',
];
$GLOBALS['TCA']['pages']['columns']['doktype']['config']['items'][] = $itemsConf;
$GLOBALS['TCA']['pages_language_overlay']['columns']['doktype']['config']['items'][] = $itemsConf;

$GLOBALS['TCA']['pages']['ctrl']['typeicon_classes'][101] = 'page-doktype-feature';
$GLOBALS['TCA']['pages']['ctrl']['typeicon_classes'][102] = 'page-doktype-casestudy';

$additionalFields = [
    'columns' => [
        'tx_t3themetypo3com_case_logo' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_case_logo',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'tx_t3themetypo3com_case_logo',                
                [          
                    'foreign_selector_fieldTcaOverride' => [
                        'config' => [
                            'appearance' => [
                                'elementBrowserAllowed' => 'jpg,jpeg,png,svg'
                            ],
                        ],
                    ],
                    'maxitems' => 1,
                    'foreign_types' => [
                        0 => [
                            'showitem' => 'title, alternative, --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => 'title, alternative, --palette--;;filePalette'
                        ],
                    ],
                ]
            )
        ],
        'tx_t3themetypo3com_feature_icon' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_feature_icon',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'tx_t3themetypo3com_feature_icon',
                [
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette',
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette',
                        ],
                    ],
                ]
            ),
        ],
        'tx_t3themetypo3com_hero_headline' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_hero_headline',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'max' => '255',
            ],
        ],
        'tx_t3themetypo3com_hero_image' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_hero_image',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'tx_t3themetypo3com_hero_image',
                [
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette',
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette',
                        ],
                    ],
                ]
            ),
        ],
        'tx_t3themetypo3com_longteaser_headline' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_longteaser_headline',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'max' => '255',
            ],
        ],
        'tx_t3themetypo3com_longteaser_image' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_longteaser_image',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'tx_t3themetypo3com_longteaser_image',
                [
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette',
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette',
                        ],
                    ],
                ]
            ),
        ],
        'tx_t3themetypo3com_shortteaser_headline' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_shortteaser_headline',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'max' => '255',
            ],
        ],
        'tx_t3themetypo3com_testimonial_headline' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_testimonial_headline',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'max' => '255',
            ],
        ],
        'tx_t3themetypo3com_testimonial_copytext' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_testimonial_copytext',
            'config' => [
                'type' => 'text',
                'cols' => '80',
                'rows' => '3',
            ],
            'defaultExtras' => 'richtext:rte_transform',
        ],
        'tx_t3themetypo3com_testimonial_image' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_testimonial_image',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'tx_t3themetypo3com_testimonial_image',
                [
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette',
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette',
                        ],
                    ],
                ]
            ),
        ],
        'tx_t3themetypo3com_case_copytext' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_case_copytext',
            'config' => [
                'type' => 'text',
                'cols' => '80',
                'rows' => '3',
            ],
            'defaultExtras' => 'richtext:rte_transform',
        ],
        'tx_t3themetypo3com_featured_case' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_featured_case',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => '3',
                'maxitems' => '1',
                'minitems' => '0',
                'show_thumbs' => '1',
                'wizards' => [
                    'suggest' => [
                        'type' => 'suggest',
                    ],
                ],
            ],
        ],
        'tx_t3themetypo3com_case_study_hero' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_case_study_hero',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => '1',
                'maxitems' => '1',
                'minitems' => '0',
                'show_thumbs' => '1',
                'wizards' => [
                    'suggest' => [
                        'type' => 'suggest',
                    ],
                ],
            ],
        ],
    ],
    'types' => [
        102 => [
            'showitem' => '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.standard;standard,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.title;title,tx_realurl_pathsegment,--palette--;;137,tx_realurl_exclude,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.visibility;visibility,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.metadata,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.abstract;abstract,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.metatags;metatags,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.editorial;editorial,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.appearance,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.layout;layout,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.replace;replace,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.behaviour,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.links;links,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.caching;caching,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.language;language,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.miscellaneous;miscellaneous,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.module;module,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.resources,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.media;media,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.config;config,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.extended,--div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category,categories,--div--;LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:pages.tabs.case_study_testimonial,tx_t3themetypo3com_testimonial_headline,tx_t3themetypo3com_testimonial_copytext,tx_t3themetypo3com_testimonial_image,--div--;LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:pages.tabs.case_study_heroteaser,tx_t3themetypo3com_hero_headline,tx_t3themetypo3com_hero_image,--div--;LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:pages.tabs.case_study_successstory,tx_t3themetypo3com_longteaser_headline,tx_t3themetypo3com_longteaser_image,--div--;LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:pages.tabs.case_study_vendor,tx_t3themetypo3com_shortteaser_headline,tx_t3themetypo3com_case_copytext,tx_t3themetypo3com_case_logo',
        ],
        101 => [
            'showitem' => '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.standard;standard,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.title;title,tx_realurl_pathsegment,--palette--;;137,tx_realurl_exclude,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.visibility;visibility,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.metadata,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.abstract;abstract,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.metatags;metatags,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.editorial;editorial,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.appearance,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.layout;layout,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.replace;replace,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.behaviour,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.links;links,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.caching;caching,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.language;language,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.miscellaneous;miscellaneous,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.module;module,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.resources,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.media;media,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.config;config,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.extended,--div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category,categories,--div--;Feature,tx_t3themetypo3com_feature_icon',
        ],
    ],
];
$GLOBALS['TCA']['pages'] = array_replace_recursive($GLOBALS['TCA']['pages'], $additionalFields);

ExtensionManagementUtility::addToAllTCAtypes('pages', '--div--;Case Study Hero,tx_t3themetypo3com_case_study_hero', 1);
ExtensionManagementUtility::registerPageTSConfigFile(
    't3theme_typo3com',
    'Configuration/TypoScript/page_TSConfig.ts',
    'TYPO3.com Page TSConfig'
);
