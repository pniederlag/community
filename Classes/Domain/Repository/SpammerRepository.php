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
 * @package t3org_spamremover
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_T3orgSpamremover_Domain_Repository_SpammerRepository extends Tx_Extbase_Domain_Repository_FrontendUserRepository {

	/**
	 * @return array|Tx_Extbase_Persistence_QueryResultInterface
	 */
	public function findAll() {
		$query = $this->createQuery();
		$query->matching($query->greaterThan('spam', 0));

		return $query->execute();
	}

	/**
	 * @param $md5Mail
	 * @return object
	 */
	public function getSpammerByMd5Email($md5Mail) {
		$query = $this->createQuery();
		$query->statement(
			'SELECT * FROM fe_users WHERE MD5(email)=? AND deleted=0 AND disable=0',
			array($md5Mail)
		);
		$result = $query->execute();

		return $result->getFirst();
	}


}
?>