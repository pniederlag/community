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
    'types' => [
        'casestudy_teaser' => [
            'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
                image;Teaser Image,
                header;Headline,
                subheader;Sub headline,
                header_link;Link to the case study,
                table_caption;Name,
                --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.visibility;visibility,
                --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.access;access
                --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.extended,tx_gridelements_container,tx_gridelements_columns'
        ],
    ]
];

$GLOBALS['TCA']['tt_content'] = array_replace_recursive($GLOBALS['TCA']['tt_content'], $tca);
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items']['casestudy_teaser'] = [
    'Case Study Teaser',
    'casestudy_teaser'
];