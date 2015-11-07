<?php
	/*******************************************************************
	 *  Copyright notice
	 *
	 *  (c) 2011 Thomas Loeffler <loeffler@spooner-web.de>
	 *
	 *  All rights reserved
	 *
	 *  This script is part of the TYPO3 project. The TYPO3 project is
	 *  free software; you can redistribute it and/or modify
	 *  it under the terms of the GNU General Public License as
	 *  published by the Free Software Foundation; either version 2 of
	 *  the License, or (at your option) any later version.
	 *
	 *  The GNU General Public License can be found at
	 *  http://www.gnu.org/copyleft/gpl.html.
	 *
	 *  This script is distributed in the hope that it will be useful,
	 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
	 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 *  GNU General Public License for more details.
	 *
	 *  This copyright notice MUST APPEAR in all copies of the script!
	 ******************************************************************/

	/**
	 * Utilities to manage and convert Typoscript Code
	 *
	 * @version $Id$
	 * @copyright Copyright belongs to the respective authors
	 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
	 */
	class Tx_Randombanners_Utility_TypoScript {

		/**
		 * @var tslib_cObj
		 */
		static protected $contentObject;

		/**
		 * @var Tx_Extbase_Configuration_ConfigurationManager
		 */
		static protected $configurationManager;


		/**
		 * Initialize configuration manager and content object
		 *
		 * @return void
		 */
		static protected function initialize() {
			// Get configuration manager
			$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Tx_Extbase_Object_ObjectManager');
			self::$configurationManager = $objectManager->get('Tx_Extbase_Configuration_ConfigurationManager');

			// Simulate Frontend
			if (TYPO3_MODE == 'BE') {
				\TYPO3\CMS\Extbase\Utility\FrontendSimulatorUtility::simulateFrontendEnvironment();
				if (empty($GLOBALS['TSFE']->sys_page)) {
					$GLOBALS['TSFE']->sys_page = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('t3lib_pageSelect');
				}
				if (empty($GLOBALS['TT'])) {
					$GLOBALS['TT'] = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('t3lib_TimeTrackNull');
				}
				self::$configurationManager->setContentObject($GLOBALS['TSFE']->cObj);
			}

			// Get content object
			self::$contentObject = self::$configurationManager->getContentObject();
			if (empty(self::$contentObject)) {
				self::$contentObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
			}

			// Reset Frontend if modified
			if (TYPO3_MODE == 'BE') {
				\TYPO3\CMS\Extbase\Utility\FrontendSimulatorUtility::resetFrontendEnvironment();
			}
		}


		/**
		 * Returns unparsed TypoScript setup
		 *
		 * @return array TypoScript setup
		 */
		static public function getSetup() {
			if (empty(self::$configurationManager)) {
				self::initialize();
			}

			$setup = self::$configurationManager->getConfiguration(
				\TYPO3\CMS\Extbase\Configuration\ConfigurationManager::CONFIGURATION_TYPE_FULL_TYPOSCRIPT
			);

			if (empty($setup['plugin.']['tx_randombanners.'])) {
				return array();
			}

			return $setup['plugin.']['tx_randombanners.'];
		}


		/**
		 * Parse given TypoScript configuration
		 *
		 * @param array $configuration TypoScript configuration
		 * @param boolean $isPlain Is a plain "Fluid like" configuration array
		 * @return array Parsed configuration
		 */
		static public function parse(array $configuration, $isPlain = TRUE) {
			if (empty(self::$contentObject)) {
				self::initialize();
			}

			// Convert to classic TypoScript array
			if ($isPlain) {
				$configuration = \TYPO3\CMS\Extbase\Service\TypoScriptService::convertPlainArrayToTypoScriptArray($configuration);
			}

			// Parse configuration
			$configuration = self::parseTypoScriptArray($configuration);
			$configuration = \TYPO3\CMS\Core\Utility\GeneralUtility::removeDotsFromTS($configuration);

			return $configuration;
		}


		/**
		 * Parse TypoScript configuration
		 *
		 * @param array $configuration TypoScript configuration
		 * @return array Parsed configuration
		 */
		static protected function parseTypoScriptArray(array $configuration) {
			$typoScriptArray = array();

			foreach ($configuration as $key => $value) {
				$ident = rtrim($key, '.');
				if (is_array($value)) {
					if (!empty($configuration[$ident])) {
						$typoScriptArray[$ident] = self::$contentObject->cObjGetSingle($configuration[$ident], $value);
						unset($configuration[$key]);
					} else {
						$typoScriptArray[$key] = self::parseTypoScriptArray($value);
					}
				} else if (is_string($value) && $key == $ident) {
					$typoScriptArray[$key] = $value;
				}
			}

			return $typoScriptArray;
		}

	}
?>