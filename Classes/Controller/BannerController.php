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
 * Controller for the Banner object
 */
class Tx_Randombanners_Controller_BannerController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Randombanners_Domain_Repository_BannerRepository
	 */
	protected $bannerRepository;

	/**
	 * @param Tx_Randombanners_Domain_Repository_BannerRepository $bannerRepository
 	 * @return void
	 */
	public function injectBannerRepository(Tx_Randombanners_Domain_Repository_BannerRepository $bannerRepository) {
		$this->bannerRepository = $bannerRepository;
	}


	/**
	 *
	 *
	 * @return void
	 */
	public function indexAction() {

	}


	/**
	 * Set click counter +1 and redirect to sponsor
	 *
	 * @param Tx_Randombanners_Domain_Model_Banner $banner
	 * @return void
	 */
	public function showAction(Tx_Randombanners_Domain_Model_Banner $banner) {
		$banner->setClickedThisMonth($banner->getClickedThisMonth() + 1);
		$this->response->setStatus(200);
		#$this->response->setHeader('Location', (string)$banner->getLink());
		throw new Tx_Extbase_MVC_Exception_StopAction();
		#$this->redirectToURI($banner->getLink());
	}

	/**
	 * Displays all Statistics
	 *
	 * @param integer $numberOfBannersShown
	 * @return void
	 */
	public function listAction($numberOfBannersShown=0) {
			// initialization
		$banners = $this->bannerRepository->findRandomBanners();
		
		foreach ($banners as $banner) {
			if (!($banner->getLogo() instanceof Tx_Extbase_Domain_Model_Dam)) {
				$banner->setLogo(Tx_ExtbaseDam_Utility_Dam::getOne('tx_randombanners_domain_model_banner', $banner->getUid(), 'tx_randombanner_dam_images'));
			}

				// increment the displayed counter
			$banner->setDisplayedThisMonth($banner->getDisplayedThisMonth() + 1); // seems rather useless when caching is enabled
		}
		$this->view->assign('banners', $banners);
	}


}
?>