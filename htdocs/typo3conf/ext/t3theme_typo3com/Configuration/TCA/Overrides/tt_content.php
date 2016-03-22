<?php
if (! defined('TYPO3_MODE')) {
    die('Access denied.');
}
 
 
/***************
 * Add Content Element: Text
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['text'] = 'content-text';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:CType.I.1',
        'text',
        'content-text'
    ],
    'header',
    'after'
);
if (!is_array($GLOBALS['TCA']['tt_content']['types']['text'])) {
    $GLOBALS['TCA']['tt_content']['types']['text'] = [];
}
$GLOBALS['TCA']['tt_content']['types']['text'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['text'],
    [
        'showitem' => '
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;header,
            bodytext,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended,
        ',
        'columnsOverrides' => [
            'bodytext' => [
                'defaultExtras' => 'richtext:rte_transform'
            ]
        ]
    ]
);


/***************
 * Add Content Element: Image
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['image'] = 'content-image';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:CType.I.3',
        'image',
        'content-image'
    ],
    'textmedia',
    'after'
);
if (!is_array($GLOBALS['TCA']['tt_content']['types']['image'])) {
    $GLOBALS['TCA']['tt_content']['types']['image'] = [];
}
$GLOBALS['TCA']['tt_content']['types']['image'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['image'],
    [
        'showitem' => '
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;header,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.images,
            assets,
            imagecols,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended,
        ',         
        'columnsOverrides' => [
            'assets' => [
                'config' => [
                    'foreign_selector_fieldTcaOverride' => [
                        'config' => [
                            'appearance' => [
                                'elementBrowserAllowed' => 'jpg,jpeg,png,svg'
                            ],
                        ],
                    ],
                    'foreign_types' => [
                        0 => [
                            'showitem' => 'title, alternative, --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => 'title, alternative, --palette--;;filePalette'
                        ],
                    ],
                ],
            ],
        ],
    ]
);
 
 
/***************
 * Add Content Elements to List
 */
$backupCTypeItems = $GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'];
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'] = [
    [
        'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:ce_group',
        '--div--',
    ],
    [
        'Case Study Teaser',
        'casestudy_teaser',
        'apps-clipboard-images',
    ],
    [
        'Case Study Partner',
        'casestudy_partner',
        'apps-pagetree-backend-user-hideinmenu',
    ],
    [
        'Hard Facts',
        'hard_facts',
        'overlay-shop',
    ],
    [
        'List Item',
        'list_item',
        'overlay-approved',
    ],
    [
        'Intro Block',
        'intro_block',
        'content-beside-text-img-above-center',
    ],
    [
        'Related Case Studies',
        'related_case_studies',
        'content-textpic',
    ],
    [
        'Top Features',
        'top_features',
        'apps-filetree-folder-list',
    ],
];
foreach ($backupCTypeItems as $key => $value) {
    $GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = $value;
}
unset($key);
unset($value);
unset($backupCTypeItems);


/***************
 * Add Icons
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['casestudy_teaser'] = 'apps-clipboard-images';
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['casestudy_partner'] = 'apps-pagetree-backend-user-hideinmenu';
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['hard_facts'] = 'overlay-shop';
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['list_item'] = 'overlay-approved';
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['intro_block'] = 'content-beside-text-img-above-center';
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['related_case_studies'] = 'content-textpic';
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['top_features'] = 'apps-filetree-folder-list';


/***************
 * Modify the tt_content TCA
 */
$tca = [
    'columns' => [
        'header_position' => [
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_position',
            'exclude' => true,
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                        '',
                    ],
                    [
                        'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_position.I.1',
                        'center',
                    ],
                ],
                'default' => '',
            ],
        ],
        'image_overlap' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.image_overlap',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                    ],
                ],
                'default' => 0,
            ],
        ],
        'tx_t3themetypo3com_t3a_membership' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_t3a_membership',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_t3a_membership.I.0',
                        0,
                    ],
                    [
                        'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_t3a_membership.I.1',
                        1,
                    ],
                    [
                        'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_t3a_membership.I.2',
                        2,
                    ],
                    [
                        'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_t3a_membership.I.3',
                        3,
                    ],
                    [
                        'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_t3a_membership.I.4',
                        4,
                    ],
                ],
                'default' => 0,
            ],
        ],
        'tx_t3themetypo3com_featurelist_link' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_featurelist_link',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'wizards' => [
                    'link' => [
                        'type' => 'popup',
                        'title' => 'LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_featurelist_link',
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_link.gif',
                        'module' => [
                            'name' => 'wizard_link',
                        ],
                        'JSopenParams' => 'width=800,height=600,status=0,menubar=0,scrollbars=1',
                    ],
                ],
                'softref' => 'typolink',
            ],
        ],
    ],
    'types' => [
        'hard_facts' => [
            'showitem' => '
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header.ALT.div_formlabel,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended
            ',
        ],
        'casestudy_teaser' => [
            'showitem' => '
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header.ALT.div_formlabel,
                pages;LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.pages,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended
            ',
            'columnsOverrides' => [
                'pages' => [
                    'config' => [
                        'maxitems' => 1,
                        'minitems' => 1,
                        'show_thumbs' => 0,
                        'size' => 1,
                    ],
                ],
            ],
        ],
        'casestudy_partner' => [
            'showitem' => '
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                header,
                bodytext,
                tx_t3themetypo3com_t3a_membership;LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_t3a_membership,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,assets,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended
            ',
            'columnsOverrides' => [
                'bodytext' => [
                    'defaultExtras' => 'richtext:rte_transform',
                ],
                'assets' => [
                    'config' => [
                        'foreign_selector_fieldTcaOverride' => [
                            'config' => [
                                'appearance' => [
                                    'elementBrowserAllowed' => 'jpg,jpeg,png,svg'
                                ],
                            ],
                        ],
                        'minitems' => 1,
                        'maxitems' => 1,
                        'foreign_types' => [
                            0 => [
                                'showitem' => 'title, alternative, --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => 'title, alternative, --palette--;;filePalette'
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'list_item' => [
            'showitem' => '
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                header,
                bodytext,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended
            ',
            'columnsOverrides' => [
                'bodytext' => [
                    'defaultExtras' => 'richtext:rte_transform',
                ],
            ],
        ],
        'intro_block' => [
            'showitem' => '
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;header,
                bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended
            ',
            'columnsOverrides' => [
                'bodytext' => [
                    'config' => [
                        'rows' => 5,
                    ],
                ],
            ],
        ],
        'related_case_studies' => [
            'columnsOverrides' => [
                'bodytext' => [
                    'defaultExtras' => 'richtext:rte_transform',
                ],
            ],
            'showitem' => '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;header,
                bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
                pages;LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.case_studies,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended',
        ],
        'top_features' => [
            'showitem' => '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;header,
                pages;LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.top_features,
                tx_t3themetypo3com_featurelist_link;LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.tx_t3themetypo3com_featurelist_link,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended',
        ],
    ],
    'palettes' => [
        'imagelinks' => [
            'showitem' => '
                image_zoom;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:image_zoom_formlabel,
				image_overlap;LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.image_overlap
            ',
        ],
        'header' => [
            'showitem' => '
                header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,
                --linebreak--,
                header_layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_layout_formlabel,
                header_position;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_position_formlabel,
                date;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:date_formlabel,
                --linebreak--,
                header_link;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_link_formlabel
            ',
        ],        
    ],
];
$GLOBALS['TCA']['tt_content'] = array_replace_recursive($GLOBALS['TCA']['tt_content'], $tca);


/***************
 * Modify palettes
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tt_content',
    'headers',
    'header_position',
    'after:header_layout'
);
