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
*  the Free Software Foundation; either version 2 of the License, or
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
 * Testcase for class Tx_Randombanners_Domain_Model_Banner.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Random banners
 * 
 * @author Thomas Loeffler <loeffler@spooner-web.de>
 */
class Tx_Randombanners_Domain_Model_BannerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var Tx_Randombanners_Domain_Model_Banner
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Randombanners_Domain_Model_Banner();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getDisplayedThisMonthReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getDisplayedThisMonth()
		);
	}

	/**
	 * @test
	 */
	public function setDisplayedThisMonthForIntegerSetsDisplayedThisMonth() { 
		$this->fixture->setDisplayedThisMonth(12);

		$this->assertSame(
			12,
			$this->fixture->getDisplayedThisMonth()
		);
	}
	
	/**
	 * @test
	 */
	public function getClickedThisMonthReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getClickedThisMonth()
		);
	}

	/**
	 * @test
	 */
	public function setClickedThisMonthForIntegerSetsClickedThisMonth() { 
		$this->fixture->setClickedThisMonth(12);

		$this->assertSame(
			12,
			$this->fixture->getClickedThisMonth()
		);
	}
	
	/**
	 * @test
	 */
	public function getDisplayedLastMonthReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getDisplayedLastMonth()
		);
	}

	/**
	 * @test
	 */
	public function setDisplayedLastMonthForIntegerSetsDisplayedLastMonth() { 
		$this->fixture->setDisplayedLastMonth(12);

		$this->assertSame(
			12,
			$this->fixture->getDisplayedLastMonth()
		);
	}
	
	/**
	 * @test
	 */
	public function getClickedLastMonthReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setClickedLastMonthForStringSetsClickedLastMonth() { 
		$this->fixture->setClickedLastMonth('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getClickedLastMonth()
		);
	}
	
}
?>