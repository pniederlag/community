<?php
/*******************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Thomas Loeffer <loeffler@spooner-web.de>
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
	 * Sending monthly mails
	 *
	 * @version $Id$
	 * @copyright Copyright belongs to the respective authors
	 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
	 */


	class Tx_Randombanners_Task_SendingMonthlyMailsTask extends tx_scheduler_Task {


		/**
		 * @var array
		 */
		protected $settings;

		/**
		 * @var Tx_Randombanners_Domain_Repository_BannerRepository
		 */
		protected $bannerRepository;

		/**
		 * @var t3lib_htmlmail
		 */
		protected $htmlMail;

		/**
		 * @var Tx_Extbase_Object_ObjectManager
		 */
		protected $objectManager;

		/**
		 * @var Tx_Extbase_Persistence_Manager
		 */
		protected $persistenceManager;

		/**
		 * Public method, usually called by scheduler.
		 *
		 * @return boolean TRUE on success
		 */
		public function execute() {
			$this->initialize();

			$banners = $this->bannerRepository->findAll();

			foreach ($banners as $banner) {
				if ($banner->getEmail() and $this->sendReport($banner)) {
					$this->setStatisticsForNewMonth($banner);
				}
			}
			$this->persistenceManager->persistAll();

			return TRUE;
		}


		/**
		 * Initialize environment
		 *
		 * @return void
		 */
		protected function initialize() {
			// Dummy Extension configuration for Dispatcher
			$configuration = array(
				'extensionName' => 'Randombanners',
				'pluginName'    => 'Pi1',
			);

			// Get TypoScript configuration
			$setup          = Tx_Randombanners_Utility_TypoScript::getSetup();
			$this->settings = Tx_Randombanners_Utility_TypoScript::parse($setup['settings.'], FALSE);
			$configuration  = array_merge($configuration, $setup);

			// Load Dispatcher
			$dispatcher = t3lib_div::makeInstance('Tx_Extbase_Core_Bootstrap');
			$dispatcher->initialize($configuration);

			// Load required objects
			$this->objectManager       = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager');
			$this->bannerRepository    = t3lib_div::makeInstance('Tx_Randombanners_Domain_Repository_BannerRepository');
			$this->htmlMail            = t3lib_div::makeInstance('t3lib_htmlmail');
			$this->persistenceManager  = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
		}


		/**
		 * Sending report to sponsor
		 *
		 * @param Tx_Randombanners_Domain_Model_Banner $banner
		 * @return boolean
		 */
		protected function sendReport(Tx_Randombanners_Domain_Model_Banner $banner) {
			$message = "Your banner statistics for ".date('F Y', strtotime('-1 month')).":\n\nDisplayed: ".$banner->getDisplayedThisMonth()." times\nClicked: ".$banner->getClickedThisMonth()." times\n\nThanks for sponsoring\nTYPO3 Association";

			$this->htmlMail->start();
			$this->htmlMail->subject = 'Report for your banner on typo3.org on '.date('F', strtotime('-1 month'));
			$this->htmlMail->from_email = 'no-reply@typo3.org';
			$this->htmlMail->from_name = 'TYPO3 Website Banner';
			$this->htmlMail->organisation = 'TYPO3 Association';
			$this->htmlMail->addPlain($message);
			$sent = $this->htmlMail->send($banner->getEmail());
			return $sent;
		}



		protected function setStatisticsForNewMonth(Tx_Randombanners_Domain_Model_Banner $banner) {
			$banner->setClickedLastMonth($banner->getClickedThisMonth());
			$banner->setDisplayedLastMonth($banner->getDisplayedThisMonth());

			$banner->setDisplayedThisMonth(0);
			$banner->setClickedThisMonth(0);
		}
	}

?>