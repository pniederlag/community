<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2011 Christian Zenker <christian.zenker@599media.de>
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
 * The main controller to show items from a feed
 *
 * @author Christian Zenker <christian.zenker@599media.de>
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class Tx_T3orgFlickrfeed_Controller_ImagesController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * set the Zend framework in include_path
	 */
	public function initializeAction() {
		set_include_path(
			get_include_path().
			PATH_SEPARATOR.
			t3lib_extMgm::extPath($this->request->getControllerExtensionKey())
		);
	}
	
	public function listAction() {
		require_once 'Zend/Service/Flickr.php';
		$flickr = new Zend_Service_Flickr('27a0921fa1e736bbd9e9707672f795ef');
		
		$this->view->assign('result', $flickr->tagSearch("typo3"));
	}
}

?>