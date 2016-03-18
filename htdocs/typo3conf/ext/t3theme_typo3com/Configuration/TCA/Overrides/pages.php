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

$additionalFields = [
    'columns' => [
        'tx_t3themetypo3com_case_logo' => [
            'exclude' => 1,
            'label' => 'Case Logo',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('tx_t3themetypo3com_case_logo',
                [
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette'
                        ]
                    ]
                ]
            )
        ],
        'tx_t3themetypo3com_feature_icon' => [
            'exclude' => 1,
            'label' => 'Feature Icon',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('tx_t3themetypo3com_feature_icon',
                [
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                                    --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette'
                        ]
                    ]
                ]
            )
        ],
        'tx_t3themetypo3com_hero_headline' => [
            'exclude' => 1,
            'label' => 'Hero Headline',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'tx_t3themetypo3com_longteaser_headline' => [
            'exclude' => 1,
            'label' => 'Longteaser Headline',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'tx_t3themetypo3com_longteaser_author' => [
            'exclude' => 1,
            'label' => 'Longteaser Author',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'tx_t3themetypo3com_shortteaser_headline' => [
            'exclude' => 1,
            'label' => 'Shortteaser Headline',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'tx_t3themetypo3com_testimonial_headline' => [
            'exclude' => 1,
            'label' => 'Testimonial Headline',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'max' => '255',
            ]
        ],
        'tx_t3themetypo3com_testimonial_copytext' => [
            'exclude' => 1,
            'label' => 'Testimonial Copytext',
            'config' => [
                'type' => 'text',
                'cols' => '80',
                'rows' => '15',
            ],
            'defaultExtras' => 'richtext:rte_transform',
        ],
        'tx_t3themetypo3com_case_copytext' => [
            'exclude' => 1,
            'label' => 'Case Vendor Copytext',
            'config' => [
                'type' => 'text',
                'cols' => '80',
                'rows' => '15',
            ],
            'defaultExtras' => 'richtext:rte_transform',
        ],
        'tx_t3themetypo3com_featured_case' => array(
            'exclude' => 1,
            'label' => 'Featured Case Study',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => '3',
                'maxitems' => '1',
                'minitems' => '0',
                'show_thumbs' => '1',
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest'
                    )
                )
            )
        ),
        'tx_t3themetypo3com_case_study_hero' => array(
            'exclude' => 1,
            'label' => 'select Case Study',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => '1',
                'maxitems' => '1',
                'minitems' => '0',
                'show_thumbs' => '1',
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest'
                    )
                )
            )
        ),
    ],
    'types' => [
        102 => [
            'showitem' => '
            --palette--;
                LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.standard;
                standard,
            --palette--;
                LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.title;
                title,
             tx_realurl_pathsegment;;137;;,
             tx_realurl_exclude,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.visibility;visibility,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.metadata,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.abstract;abstract,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.metatags;metatags,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.editorial;editorial,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.appearance,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.layout;layout,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.replace;replace,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.behaviour,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.links;links,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.caching;caching,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.language;language,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.miscellaneous;miscellaneous,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.module;module,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.resources,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.media;media,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.config;config,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.extended,
             --div--;Case Study,
             tx_t3themetypo3com_hero_headline,
             tx_t3themetypo3com_longteaser_headline,
             tx_t3themetypo3com_longteaser_author,
             tx_t3themetypo3com_shortteaser_headline,
             tx_t3themetypo3com_testimonial_headline,
             tx_t3themetypo3com_testimonial_copytext,
             tx_t3themetypo3com_case_copytext,
             tx_t3themetypo3com_case_logo'
        ],
        101 => [
            'showitem' => '
            --palette--;
                LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.standard;
                standard,
            --palette--;
                LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.title;
                title,
             tx_realurl_pathsegment;;137;;,
             tx_realurl_exclude,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.visibility;visibility,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.metadata,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.abstract;abstract,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.metatags;metatags,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.editorial;editorial,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.appearance,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.layout;layout,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.replace;replace,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.behaviour,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.links;links,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.caching;caching,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.language;language,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.miscellaneous;miscellaneous,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.module;module,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.resources,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.media;media,
             --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.config;config,
             --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.extended,
             --div--;Feature,
             tx_t3themetypo3com_feature_icon'
        ]
    ]
];
$GLOBALS['TCA']['pages'] = array_replace_recursive($GLOBALS['TCA']['pages'], $additionalFields);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', '--div--;Case Study Hero,tx_t3themetypo3com_case_study_hero', 1);
