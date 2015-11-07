<?php
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3_MODE') || die('Access denied.');

// get complete context
$context = GeneralUtility::getApplicationContext()->__toString();

// alternative: set $context (please keep in mind that you also have to set the correct context for cli tasks)
//$context = 'Development/Production';

// check for "Production/Live/Server123" etc
if ($context) {
    list($contextMainPart, $contextSubPart1, $contextSubPart2) = explode('/', $context);
}

    // project specific configuration
$customChanges = [
    'BE' => [
        'sessionTimeout' => 3600,
        'versionNumberInFilename' => 0,
    ],
    'EXT' => [
        'extConf' => [
            'news' => serialize([
                'removeListActionFromFlexforms' => 2,
                'archiveDate' => 'date',
                'pageModuleFieldsCategory' => 'title,description',
                'pageModuleFieldsNews' => 'LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:pagemodule_simple=title,datetime;LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:pagemodule_advanced=title,datetime,teaser,categories;LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:pagemodule_complex=title,datetime,teaser,categories,archive;',
                'showMediaDescriptionField' => 0,
                'rteForTeaser' => 0,
                'tagPid' => 1,
                'prependAtCopy' => 0,
                'categoryRestriction' => 'none',
                'categoryBeGroupTceFormsRestriction' => 0,
                'contentElementRelation' => 1,
                'manualSorting' => 0,
                'useFal' => 1,
                'showAdministrationModule' => 0,
                'showImporter' => 1,
                'storageUidImporter' => '1',
                'resourceFolderImporter' => '/news_import',
            ]),
            'realurl' => serialize([
                'configFile' => 'typo3conf/ext/theme/Resources/Private/Extensions/Realurl/ManualConfiguration.php',
                'enableAutoConf' => 1,
                'enableDevLog' => 0,
                'enableChashUrlDebug' => 0,
            ]),
            'rtehtmlarea' => serialize([
                'defaultConfiguration' => 'Typical (Most commonly used features are enabled. Select this option if you are unsure which one to use.)',
                'enableImages' => 0,
                'enableInlineElements' => 0,
                'allowStyleAttribute' => 0,
                'enableAccessibilityIcons' => 0,
                'forceCommandMode' => 0,
                'noSpellCheckLanguages' => 'ja,km,ko,lo,th,zh,b5,gb',
                'AspellDirectory' => '/usr/bin/aspell',
            ]),
            'scheduler' => serialize([
                'maxLifetime' => 1440,
                'enableBELog' => 1,
                'showSampleTasks' => 1,
                'useAtDaemon' => 0,
            ]),
        ]
    ],
    'FE' => [
        'disableNoCacheParameter' => true,
        'hidePagesIfNotTranslatedByDefault' => true,
    ],
    'GFX' => [
        'jpg_quality' => 86,
    ],
    'SYS' => [
        'sitename' => 'TYPO3 community website' . ' [' . ($context ?: 'No applicationContext') . ']',
        'curlUse' => true,
        'devIPmask' => '',
        'textfile_ext' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['textfile_ext'] . ',setupts,constantsts,ts1,tsc,tsconfig',
        'UTF8filesystem' => true,
        'systemLocale' => 'en_EN.utf8',
        'defaultCategorizedTables' => '',
        'clearCacheSystem' => true,
        't3lib_cs_convMethod' => 'mbstring',
        't3lib_cs_utils' => 'mbstring',
    ],
    'MAIL' => [
        'defaultMailFromAddress' => 'no-reply@typo3.org',
        'defaultMailFromName' => 'TYPO3',
    ],
];

$GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive($GLOBALS['TYPO3_CONF_VARS'], (array)$customChanges);

/*
 * include the most general file e.g. "AdditionalConfiguration_Staging.php
 */
$file = realpath(__DIR__) . '/AdditionalConfiguration_' . $contextMainPart . '.php';
if (is_file($file)) {
    include_once($file);
    $GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive($GLOBALS['TYPO3_CONF_VARS'], (array)$customChanges);
}

/*
 * check for a more specific configuration as well e.g. "AdditionalConfiguration_Development_Profiling.php"
 */
$file = realpath(__DIR__) . '/AdditionalConfiguration_' . $contextMainPart . '_' . $contextSubPart1 . '.php';
if (is_file($file)) {
    include_once($file);
    $GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive($GLOBALS['TYPO3_CONF_VARS'], (array)$customChanges);
}

/*
 * check for a more specific configuration as well, e.g. "AdditionalConfiguration_Production_Live_Server4.php"
 */
$file = realpath(__DIR__) . '/AdditionalConfiguration_' . $contextMainPart . '_' . $contextSubPart1
    . '_' . $contextSubPart2 . '.php';
if (is_file($file)) {
    include_once($file);
    $GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive($GLOBALS['TYPO3_CONF_VARS'], (array)$customChanges);
}

/*
 * load custom configuration, that is not placed in git, e.g. for local development only changes
 */
if ($contextMainPart === 'Development') {
    $file = realpath(__DIR__) . '/AdditionalConfiguration_custom.php';
    if (is_file($file)) {
        include_once($file);
        $GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive($GLOBALS['TYPO3_CONF_VARS'], (array)$customChanges);
    }
}

/*
 * add composer autoloader
 */
$composerAutoloader = realpath(__DIR__ . '/../../vendor/autoload.php');

if (!empty($composerAutoloader) && is_file($composerAutoloader)) {
    include_once($composerAutoloader);
}
