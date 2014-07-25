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
abstract class Tx_T3orgSpamremover_Controller_AbstractController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * TRUE if the currently logged in user is allowed admin rights for removing spam
	 * @return bool
	 */
	protected function isLoggedInUserAnAdministrator() {
		$adminRoleId = intval($this->settings['adminUserGroup']);
		return
			is_array($GLOBALS['TSFE']->fe_user->groupData['uid']) &&
			in_array($adminRoleId, $GLOBALS['TSFE']->fe_user->groupData['uid'])
		;
	}

	protected function restrictAccessToAdministrators() {
		if(!$this->isLoggedInUserAnAdministrator()) {
			$this->throwStatus(403, 'You are not allowed to access this page.');
		}
	}

}
?>