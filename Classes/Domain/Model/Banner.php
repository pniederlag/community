<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Thomas Loeffler <loeffler@spooner-web.de>
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
 * Statistics for clicking and displaying banners
 */
class Tx_Randombanners_Domain_Model_Banner extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * link
	 *
	 * @var string
	 */
	protected $link;

	/**
	 * email
	 *
	 * @var string
	 */
	protected $email;

	/**
	 * Logo
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $logo;

	/**
	 * displayedThisMonth
	 *
	 * @var integer
	 */
	protected $displayedThisMonth;

	/**
	 * clickedThisMonth
	 *
	 * @var integer
	 */
	protected $clickedThisMonth;

	/**
	 * displayedLastMonth
	 *
	 * @var integer
	 */
	protected $displayedLastMonth;

	/**
	 * clickedLastMonth
	 *
	 * @var string
	 */
	protected $clickedLastMonth;

	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $link
	 * @return void
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * @return string
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * @param integer $logo
	 * @return void
	 */

	/**
	 * Set Logo
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
	 */
	public function setLogo($logo) {
		$this->logo = $logo;
	}

	/**
	 * Get logo
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
	 */
	public function getLogo() {
		return $this->logo;
	}

	/**
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param integer $displayedThisMonth
	 * @return void
	 */
	public function setDisplayedThisMonth($displayedThisMonth) {
		$this->displayedThisMonth = $displayedThisMonth;
	}

	/**
	 * @return integer
	 */
	public function getDisplayedThisMonth() {
		return $this->displayedThisMonth;
	}

	/**
	 * @param integer $clickedThisMonth
	 * @return void
	 */
	public function setClickedThisMonth($clickedThisMonth) {
		$this->clickedThisMonth = $clickedThisMonth;
	}

	/**
	 * @return integer
	 */
	public function getClickedThisMonth() {
		return $this->clickedThisMonth;
	}

	/**
	 * @param integer $displayedLastMonth
	 * @return void
	 */
	public function setDisplayedLastMonth($displayedLastMonth) {
		$this->displayedLastMonth = $displayedLastMonth;
	}

	/**
	 * @return integer
	 */
	public function getDisplayedLastMonth() {
		return $this->displayedLastMonth;
	}

	/**
	 * @param string $clickedLastMonth
	 * @return void
	 */
	public function setClickedLastMonth($clickedLastMonth) {
		$this->clickedLastMonth = $clickedLastMonth;
	}

	/**
	 * @return string
	 */
	public function getClickedLastMonth() {
		return $this->clickedLastMonth;
	}

}
?>