<?php

class RandomBannersAjax {

	protected $bannerRepository;

	protected $persistanceManager;

	protected $objectManager;

	public function __construct() {
		$this->bannerRepository = t3lib_div::makeInstance('Tx_Randombanners_Domain_Repository_BannerRepository');
		$this->objectManager = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager');
		$this->persistenceManager = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
	}

	public function increaseClickNumber($uid) {
		$banner = $this->bannerRepository->findByUid($uid);
		$banner->setClickedThisMonth($banner->getClickedThisMonth() + 1);
		$this->persistanceManager->persistAll();
	}
}

$function = t3lib_div::_GET('function');

switch ($function) {
	case 'clickBanner':
		if ($uid = intval(t3lib_div::_GET('banner'))) {
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