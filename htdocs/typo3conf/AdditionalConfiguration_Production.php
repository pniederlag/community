<?php
defined('TYPO3_MODE') || die('Access denied.');

// Override configuration of LocalConfiguration
$customChanges = [
    'BE' => [
        'debug' => false,
        'warning_email_addr' => '',
        'warning_mode' => '',
        'adminOnly' => 0,
        'installToolPassword' => '$P$CWETx5l5d1H4jWTSv4pjqmsxurHb6I/',
    ],
    'FE' => [
        'debug' => false,
    ],
    'SYS' => [
        'displayErrors' => false,
        'enableDeprecationLog' => '',
        'sqlDebug' => 0,
        'systemLogLevel' => 0,
        'clearCacheSystem' => true,
    ],
    'LOG' => [
        'writerConfiguration' => [
            \TYPO3\CMS\Core\Log\LogLevel::DEBUG => [
                'TYPO3\\CMS\\Core\\Log\\Writer\\NullWriter' => []
            ]
        ],
        'deprecated' => [
            'writerConfiguration' => [
                \TYPO3\CMS\Core\Log\LogLevel::WARNING => [
                    'TYPO3\\CMS\\Core\\Log\\Writer\\FileWriter' => [
                        'logFile' => 'typo3conf/deprecation.log'
                    ]
                ]
            ]
        ]
    ]
];

$GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive($GLOBALS['TYPO3_CONF_VARS'], $customChanges);
