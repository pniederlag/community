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
 * @package t3org_spamremover
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_T3orgSpamremover_Controller_SpammerController extends Tx_T3orgSpamremover_Controller_AbstractController {

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$this->restrictAccessToAdministrators();

		/** @var Tx_T3orgSpamremover_Domain_Repository_SpammerRepository $spammerRepository */
		$spammerRepository = $this->objectManager->get('Tx_T3orgSpamremover_Domain_Repository_SpammerRepository');
		$spammers = $spammerRepository->findAll();
		$this->view->assign('spammers', $spammers);
	}

	/**
	 * @param Tx_T3orgSpamremover_Domain_Model_Spammer $spammer
	 */
	public function showAction(Tx_T3orgSpamremover_Domain_Model_Spammer $spammer) {
		$this->restrictAccessToAdministrators();

		if($spammer->getSpam()->count() === 0) {
			$GLOBALS['TSFE']->pageNotFoundAndExit('This use has no reported spam');
		}

		$this->view->assign('spammer', $spammer);
	}

	/**
	 * @param Tx_T3orgSpamremover_Domain_Model_Spammer $user
	 */
	public function confirmAction(Tx_T3orgSpamremover_Domain_Model_Spammer $user) {
		$this->restrictAccessToAdministrators();

		if($user->getSpam()->count() === 0) {
			$GLOBALS['TSFE']->pageNotFoundAndExit('This use has no reported spam');
		}

		/** @var Tx_Amqp_Service_ProducerService $producerService */
		$producerService = $this->objectManager->get('Tx_Amqp_Service_ProducerService');

		$data = array(
			'id' => $user->getUid(),
			'username' => $user->getUsername(),
			'email' => $user->getEmail(),
		);

		if($producerService->sendToExchange($data, 'org.typo3.spam.user')) {
			$this->removeReportsForUser($user);
			$this->view->assign('success_text', 'User is successfully queued to be removed.');
		} else {
			$this->view->assign(
				'error_text',
				'User could not be queued to be removed, because the message queue was not reachable. Try again later.'
			);
		}
		$this->view->assign('spammer', $user);
	}

	/**
	 * delete spam reports for user
	 *
	 * @param Tx_T3orgSpamremover_Domain_Model_Spammer $user
	 */
	public function deleteAction(Tx_T3orgSpamremover_Domain_Model_Spammer $user) {
		$this->restrictAccessToAdministrators();

		if($user->getSpam()->count() === 0) {
			$GLOBALS['TSFE']->pageNotFoundAndExit('This use has no reported spam');
		}

		$this->removeReportsForUser($user);

		$this->view->assign('success_text', 'Thanks for rehabilitating this user.');
		$this->view->assign('spammer', $user);
	}

	/**
	 * remove all spam reports for that user
	 *
	 * @param $user Tx_T3orgSpamremover_Domain_Model_Spammer
	 */
	protected function removeReportsForUser($user) {
		$spamReportRepository = $this->objectManager->get('Tx_T3orgSpamremover_Domain_Repository_SpamReportRepository');
		$spammerRepository = $this->objectManager->get('Tx_T3orgSpamremover_Domain_Repository_SpammerRepository');
		$persistenceManager = $this->objectManager->get('Tx_Extbase_Persistence_Manager');

		foreach($user->getSpam()->toArray() as $spam) {
			$user->removeSpam($spam);
			$spamReportRepository->remove($spam);
		}
		$persistenceManager->persistAll();

		// spammer needs to be updated so spam count is set to zero
		$spammerRepository->update($user);
		$persistenceManager->persistAll();

	}

}
?>