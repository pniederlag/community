<?php

/*                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * 
 * @author Christian Zenker <christian.zenker@599media.de>
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_T3orgFlickrfeed_ViewHelpers_Widget_Controller_ImagesController extends Tx_Fluid_Core_Widget_AbstractWidgetController {

	public function initializeAction() {
		set_include_path(
			get_include_path().
			PATH_SEPARATOR.
			t3lib_extMgm::extPath($this->request->getControllerExtensionKey())
		);
	}
	
    /**
     * 
     * @return string
     */
    public function indexAction() {
    	try {
			$options = $this->widgetConfiguration['options'];
			
			$apiKey = $this->widgetConfiguration['apiKey'];
			
    		if(!empty($this->widgetConfiguration['templatePathAndName'])) {
	    		$this->view->setTemplatePathAndFilename(t3lib_div::getFileAbsFileName($this->widgetConfiguration['templatePathAndName']));
	    	}
			
			$flickr = new Tx_T3orgFlickrfeed_Utility_Flickr($apiKey);
			if($this->widgetConfiguration['type'] == 1 || $this->widgetConfiguration['type'] === 'tag') {
				// tagSearch
				$this->view->assign('result', $flickr->tagSearch($this->widgetConfiguration['tags'], $options));
				
				if(is_array($this->widgetConfiguration['tags']) || $this->widgetConfiguration['tags'] instanceof Traversable) {
					$tags = $this->widgetConfiguration['tags'];
				} else {
					$tags = t3lib_div::trimExplode(',', $this->widgetConfiguration['tags'], true);
				}
				$this->view->assign('tags', $tags);
			} elseif($this->widgetConfiguration['type'] == 2 || $this->widgetConfiguration['type'] === 'user') {
				// people.getPublicPhotos
				$this->view->assign('result', $flickr->userSearch($this->widgetConfiguration['user_id'], $options));
			} else {
				$this->view->assign('result', $flickr->groupPoolGetPhotos($this->widgetConfiguration['group_id'], $options));
			}
			
		}
		catch (Exception $e) {
			t3lib_div::sysLog($e->getMessage(), $this->request->getControllerExtensionKey(), LOG_ERR);
    		$this->view->assign('error', $e->getMessage());
		}
    }
}

?>