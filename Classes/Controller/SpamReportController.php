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
class Tx_T3orgSpamremover_Controller_SpamReportController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * action new
	 *
	 * @param Tx_T3orgSpamremover_Domain_Model_SpamReport $newSpamReport
	 * @dontvalidate $newSpamReport
	 * @return void
	 */
	public function newAction(Tx_T3orgSpamremover_Domain_Model_SpamReport $newSpamReport = NULL) {
		$this->view->assign('newSpamReport', $newSpamReport);
	}

	/**
	 * action create
	 *
	 * @param Tx_T3orgSpamremover_Domain_Model_SpamReport $newSpamReport
	 * @return void
	 */
	public function createAction(Tx_T3orgSpamremover_Domain_Model_SpamReport $newSpamReport) {
		$this->spamReportRepository->add($newSpamReport);
		$this->flashMessageContainer->add('Your new SpamReport was created.');
		$this->redirect('list');
	}

}
?>