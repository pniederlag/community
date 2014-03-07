<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Christian Zenker <typo3@xopn.de>
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
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
 ***************************************************************/

/**
 *
 *
 * @package t3org_spamremover
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_T3orgSpamremover_Domain_Model_Spammer extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * spam
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_T3orgSpamremover_Domain_Model_SpamReport>
	 */
	protected $tx_t3orgspamremover_spam;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->tx_t3orgspamremover_spam = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Adds a SpamReport
	 *
	 * @param Tx_T3orgSpamremover_Domain_Model_SpamReport $spam
	 * @return void
	 */
	public function addSpam(Tx_T3orgSpamremover_Domain_Model_SpamReport $spam) {
		$this->tx_t3orgspamremover_spam->attach($spam);
	}

	/**
	 * Removes a SpamReport
	 *
	 * @param Tx_T3orgSpamremover_Domain_Model_SpamReport $spamToRemove The SpamReport to be removed
	 * @return void
	 */
	public function removeSpam(Tx_T3orgSpamremover_Domain_Model_SpamReport $spamToRemove) {
		$this->tx_t3orgspamremover_spam->detach($spamToRemove);
	}

	/**
	 * Returns the spam
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_T3orgSpamremover_Domain_Model_SpamReport> $spam
	 */
	public function getSpam() {
		return $this->tx_t3orgspamremover_spam;
	}

	/**
	 * Sets the spam
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_T3orgSpamremover_Domain_Model_SpamReport> $spam
	 * @return void
	 */
	public function setSpam(Tx_Extbase_Persistence_ObjectStorage $spam) {
		$this->tx_t3orgspamremover_spam = $spam;
	}

}
?>