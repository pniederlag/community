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
class Tx_T3orgFlickrfeed_ViewHelpers_Widget_ImagesViewHelper extends Tx_Fluid_Core_Widget_AbstractWidgetViewHelper {

	/**
	 * @var Tx_T3orgFlickrfeed_ViewHelpers_Widget_Controller_ImagesController
	 */
	protected $controller;

	/**
	 * @param Tx_T3orgFlickrfeed_ViewHelpers_Widget_Controller_ImagesController $controller
	 * @return void
	 */
	public function injectController(Tx_T3orgFlickrfeed_ViewHelpers_Widget_Controller_ImagesController $controller) {
		$this->controller = $controller;
	}

	/**
	 * 
	 * @param string $apiKey
	 * @param string $type
	 * @param string $templatePathAndName
	 * @param string $tags
	 * @param string $user_id
	 * @param string $group_id
	 * @param array $options
	 * @return string
	 */
	public function render($apiKey, $type = 'search', $templatePathAndName = '', $tags='', $user_id = '', $group_id = '', $options = array()) {
		return $this->initiateSubRequest();
	}
}

?>
