<?php

/***********************************************************************
 * Extension Manager/Repository config file for ext "t3theme_typo3com".
 *
 * Auto generated 10-03-2016 17:20
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***********************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title'            => 'TYPO3.com base settings',
    'description'      => 'TYPO3.com base settings for templating',
    'category'         => 'plugin',
    'version'          => '1.0.0',
    'state'            => 'stable',
    'uploadfolder'     => 0,
    'createDirs'       => '',
    'clearcacheonload' => 0,
    'author'           => 'Alexander Boehm, Christiane Helmchen',
    'author_email'     => 'boehm@punkt.de, helmchen@punkt.de',
    'author_company'   => '',
    'constraints'      => array(
        'depends'   => array(
            'typo3'   => '7.6',
            'belayout_fileprovider' => ''
        ),
        'conflicts' => array(),
        'suggests'  => array(),
    ),
);
