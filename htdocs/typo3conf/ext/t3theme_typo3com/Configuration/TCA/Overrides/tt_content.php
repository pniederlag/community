<?php
/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
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
                    [
                        'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_position.I.2',
                        'right',
                    ],
                    [
                        'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_position.I.3',
                        'left',
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
    ],
    'types' => [
        'casestudy_teaser' => [
            'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
                pages;LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:labels.pages,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,assets,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.imagelinks;imagelinks,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:layout_formlabel,
                --palette--;LLL:EXT:fluid_styled_content/Resources/Private/Language/Database.xlf:tt_content.palette.mediaAdjustments;mediaAdjustments,
                --palette--;LLL:EXT:fluid_styled_content/Resources/Private/Language/Database.xlf:tt_content.palette.gallerySettings;gallerySettings,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
                --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.access;access
                --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.extended,tx_gridelements_container,tx_gridelements_columns',
        ],
        'indented_textmedia' => [
            'columnsOverrides' => [
                'bodytext' => [
                    'defaultExtras' => 'richtext:rte_transform[mode=ts_css]',
                ],
            ],
            'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;header,
                bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,assets,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.imagelinks;imagelinks,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:layout_formlabel,
                --palette--;LLL:EXT:fluid_styled_content/Resources/Private/Language/Database.xlf:tt_content.palette.mediaAdjustments;mediaAdjustments,
                --palette--;LLL:EXT:fluid_styled_content/Resources/Private/Language/Database.xlf:tt_content.palette.gallerySettings;gallerySettings,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
                --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.access;access
                --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.extended,tx_gridelements_container,tx_gridelements_columns',
        ],
    ],
];

$GLOBALS['TCA']['tt_content'] = array_replace_recursive($GLOBALS['TCA']['tt_content'], $tca);
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items']['casestudy_teaser'] = [
    'Case Study Teaser',
    'casestudy_teaser',
];
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items']['indented_textmedia'] = [
    'Indented TextMedia Element',
    'indented_textmedia',
];

$GLOBALS['TCA']['tt_content']['palettes'] = array_replace(
    $GLOBALS['TCA']['tt_content']['palettes'],
    [
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
    ]
);
