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
class Tx_T3orgSpamremover_Controller_SpamReportController extends Tx_T3orgSpamremover_Controller_AbstractController {

	/**
	 * action new
	 *
	 * @param Tx_T3orgSpamremover_Domain_Model_SpamReport $newSpamReport
	 * @dontvalidate $newSpamReport
	 * @return void
	 */
	public function newAction(Tx_T3orgSpamremover_Domain_Model_SpamReport $newSpamReport = NULL) {
		try {
			$newSpamReport = $this->addDefaultValuesToReport($newSpamReport);

			// don't use plugin specific parameters, because url should be public API
			if (t3lib_div::_GET('spammer')) {
				/** @var Tx_T3orgSpamremover_Domain_Repository_SpammerRepository $spammerRepository */
				$spammerRepository = $this->objectManager->get('Tx_T3orgSpamremover_Domain_Repository_SpammerRepository');
				$spammer = $spammerRepository->getSpammerByMd5Email(
					t3lib_div::_GET('spammer')
				);
				if (!$spammer) {
					throw new InvalidArgumentException('The given user is not found. The user might have been deleted in the meantime.');
				}
				$newSpamReport->setSpammer($spammer);
			} elseif (!$newSpamReport->getSpammer()) {
				if($this->isLoggedInUserAnAdministrator()) {
					$this->redirect('list', 'Spammer');
				}
				throw new InvalidArgumentException('No user given');
			}

			if (t3lib_div::_GET('link')) {
				$newSpamReport->setLink((string)t3lib_div::_GET('link'));
			}
			$this->view->assign('newSpamReport', $newSpamReport);
		} catch(InvalidArgumentException $e) {
			$this->view->assign('error_text', $e->getMessage());
		}
	}

	/**
	 * action create
	 *
	 * @param Tx_T3orgSpamremover_Domain_Model_SpamReport $newSpamReport
	 * @return void
	 */
	public function createAction(Tx_T3orgSpamremover_Domain_Model_SpamReport $newSpamReport) {
		$newSpamReport = $this->addDefaultValuesToReport($newSpamReport);

		$spamReportRepository = $this->objectManager->get('Tx_T3orgSpamremover_Domain_Repository_SpamReportRepository');
		$spammerRepository = $this->objectManager->get('Tx_T3orgSpamremover_Domain_Repository_SpammerRepository');
		$persistenceManager = $this->objectManager->get('Tx_Extbase_Persistence_Manager');

		$spamReportRepository->add($newSpamReport);
		$persistenceManager->persistAll();

		// spammer needs to be updated, so tx_t3orgspamremover_spam is increased
		$spammer = $newSpamReport->getSpammer();
		$spammer->addSpam($newSpamReport);
		$spammerRepository->update($spammer);
		$persistenceManager->persistAll();

		$this->redirect('thanks', NULL, NULL, array('user' => $spammer));
	}

	public function thanksAction(Tx_T3orgSpamremover_Domain_Model_Spammer $user) {
		$this->view->assign('spammer', $user);
	}

	/**
	 * @param Tx_T3orgSpamremover_Domain_Model_SpamReport|NULL $newSpamReport
	 * @throws InvalidArgumentException
	 * @return Tx_T3orgSpamremover_Domain_Model_SpamReport
	 */
	protected function addDefaultValuesToReport(Tx_T3orgSpamremover_Domain_Model_SpamReport $newSpamReport = NULL) {
		if (!$newSpamReport) {
			$newSpamReport = $this->objectManager->get('Tx_T3orgSpamremover_Domain_Model_SpamReport');
		}
		if(!$GLOBALS['TSFE']->fe_user->user || !$GLOBALS['TSFE']->fe_user->user['uid']) {
			throw new InvalidArgumentException('You need to be logged in to report spam.');
		}

		/** @var Tx_T3orgSpamremover_Domain_Repository_SpammerRepository $spammerRepository */
		$spammerRepository = $this->objectManager->get('Tx_T3orgSpamremover_Domain_Repository_SpammerRepository');
		$reporter = $spammerRepository->findByUid($GLOBALS['TSFE']->fe_user->user['uid']);
		if(!$reporter) {
			throw new InvalidArgumentException('You are not allowed to report spam.');
		}
		$newSpamReport->setReporter($reporter);

		return $newSpamReport;
	}

}
?>