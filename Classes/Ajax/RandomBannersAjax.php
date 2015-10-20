<?php

class RandomBannersAjax {

	protected $bannerRepository;

	protected $persistanceManager;

	protected $objectManager;

	public function __construct() {
		$this->bannerRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Tx_Randombanners_Domain_Repository_BannerRepository');
		$this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Tx_Extbase_Object_ObjectManager');
		$this->persistenceManager = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
	}

	public function increaseClickNumber($uid) {
		$banner = $this->bannerRepository->findByUid($uid);
		$banner->setClickedThisMonth($banner->getClickedThisMonth() + 1);
		$this->persistanceManager->persistAll();
	}
}

$function = \TYPO3\CMS\Core\Utility\GeneralUtility::_GET('function');

switch ($function) {
	case 'clickBanner':
		if ($uid = intval(\TYPO3\CMS\Core\Utility\GeneralUtility::_GET('banner'))) {
			$output = new RandomBannersAjax();
			$output->increaseClickNumber($uid);
		}
		break;
	default:
		$returnValue = 'This function is not implemented!';
		break;
}

echo json_encode($returnValue);

?>