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
class Tx_T3orgSpamremover_Domain_Model_SpamReport extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * title
	 *
	 * @validator StringLength(minimum=3,maximum=255)
	 * @var string
	 */
	protected $title;

	/**
	 * description
	 *
	 * @validator StringLength(minimum=5,maximum=2000)
	 * @var string
	 */
	protected $description;

	/**
	 * reporter
	 *
	 * @validator NotEmpty()
	 * @var Tx_T3orgSpamremover_Domain_Model_Spammer
	 */
	protected $reporter;

	/**
	 * spammer
	 *
	 * @validator NotEmpty()
	 * @var Tx_T3orgSpamremover_Domain_Model_Spammer
	 */
	protected $spammer;

	/**
	 * @var string
	 * @validate Tx_T3orgSpamremover_Validator_Typo3UrlValidator()
	 */
	protected $link;

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @return void
	 */
	public function updateTitle() {
		$this->title = sprintf(
			'"%s" reports: "%s" spams on %s',
			$this->getReporter() ? $this->getReporter()->getUsername() : '[anonymous]',
			$this->getSpammer() ? $this->getSpammer()->getUsername() : '[anonymous]',
			$this->getLinkDomain()
		);
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the reporter
	 *
	 * @return Tx_Extbase_Domain_Model_FrontendUser $reporter
	 */
	public function getReporter() {
		return $this->reporter;
	}

	/**
	 * Sets the reporter
	 *
	 * @param Tx_Extbase_Domain_Model_FrontendUser $reporter
	 * @return void
	 */
	public function setReporter(Tx_Extbase_Domain_Model_FrontendUser $reporter) {
		$this->reporter = $reporter;
		$this->updateTitle();
	}

	/**
	 * Returns the spammer
	 *
	 * @return Tx_T3orgSpamremover_Domain_Model_Spammer $spammer
	 */
	public function getSpammer() {
		return $this->spammer;
	}

	/**
	 * Sets the spammer
	 *
	 * @param Tx_T3orgSpamremover_Domain_Model_Spammer $spammer
	 * @return void
	 */
	public function setSpammer(Tx_T3orgSpamremover_Domain_Model_Spammer $spammer) {
		$this->spammer = $spammer;
		$this->updateTitle();
	}

	/**
	 * @param string $link
	 */
	public function setLink($link) {
		$this->link = $link;
		$this->updateTitle();
	}

	/**
	 * @return string
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * @return mixed
	 */
	public function getLinkDomain() {
		return parse_url($this->link, PHP_URL_HOST);
	}

}
?>