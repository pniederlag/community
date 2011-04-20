<?php
	$extensionPath = t3lib_extMgm::extPath('randombanners');
	$extensionClassesPath = $extensionPath . 'Classes/';

	return array(
		'tx_randombanners_controller_bannercontroller' => $extensionClassesPath . 'Controller/BannerController.php',
		'tx_randombanners_domain_model_banner' => $extensionClassesPath . 'Domain/Model/Banner.php',
		'tx_randombanners_domain_repository_bannerrepository' => $extensionClassesPath . 'Domain/Repository/BannerRepository.php',
		'tx_randombanners_utility_typoscript' => $extensionClassesPath . 'Utility/TypoScript.php',
		'tx_randombanners_task_sendingmonthlymailstask' => $extensionClassesPath . 'Task/SendingMonthlyMailsTask.php',
	);
?>