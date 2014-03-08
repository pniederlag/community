<?php

class Tx_T3orgSpamremover_Domain_Repository_SpammerRepository extends Tx_Extbase_Domain_Repository_FrontendUserRepository {
	public function findAll() {
		$query = $this->createQuery();
		$query->matching($query->greaterThan('spam', 0));

		return $query->execute();
	}

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