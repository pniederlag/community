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
	
	/**
	 * listAction
	 * 
	 * @see http://www.flickr.com/services/api/flickr.photos.search.html
	 * @see http://www.flickr.com/services/api/flickr.groups.pools.getPhotos.html
	 * @see http://www.flickr.com/services/api/flickr.people.getPublicPhotos.html
	 * 
	 */
	public function listAction() {
		require_once 'Zend/Service/Flickr.php';
		
		$options = $this->buildOptions();
		
		$apiKey = $this->settings['apiKey'];
		
		$flickr = new Zend_Service_Flickr($apiKey);
		if($this->settings['type'] == 1) {
			// tagSearch
			$this->view->assign('result', $flickr->tagSearch($this->settings['tags'], $options));
		} elseif($this->settings['type'] == 2) {
			// people.getPublicPhotos
			$this->view->assign('result', $flickr->userSearch($this->settings['user_id'], $options));
		} else {
			$this->view->assign('result', $flickr->groupPoolGetPhotos($this->settings['group_id'], $options));
		}
	}
	
	/**
	 * get the additional options as array
	 * 
	 * @return array
	 */
	protected function buildOptions() {
		$options = array();
		
		/* fetch all custom options by the user in "optionsAsText"
		 * 
		 * content might look like:
		 * <code>
		 * 	key1: value1
		 * 	foobar: 42
		 * </code>
		 * 
		 */
		if($this->settings['optionsAsText'] && is_string($this->settings['optionsAsText'])) {
			foreach(t3lib_div::trimExplode("\n", $this->settings['optionsAsText'], true) as $line) {
				
				// remove coments
				if(($pos = strpos($line, '#')) !== false) {
					$line = substr($line, 0, $pos);
				}
				if(trim($line) === '') {
					continue;
				}
				
				list($key, $value) = t3lib_div::trimExplode('=', $line, false, 2);
				if(!empty($key) && !empty($value)) {
					$options[$key] = $value;
				}
			}
		}
		
		if($this->settings['options'] && is_array($this->settings['options'])) {
			$options = array_merge(
				$options,
				$this->settings['options']
			);
		}
		return $options;
	}
}

?>