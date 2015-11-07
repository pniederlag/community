<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Christian Zenker, typo3@xopn.de
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


class Tx_Amqp_Reports_RegisteredConsumers implements tx_reports_StatusProvider {

	/**
	 * @return array<tx_reports_reports_status_Status>
	 */
	public function getStatus() {
		$reports = array();
		$reports[] = $this->getRegisteredConsumers();
		return $reports;
	}

	protected function getRegisteredConsumers() {
		$output = '';
		$queueNames = Tx_Amqp_Util_ConfigurationHelper::getQueueNames();
		foreach($queueNames as $queueName) {
			$output .= '<b>' . htmlspecialchars($queueName) . '</b><ul>';
			$consumerConfigurations = Tx_Amqp_Util_ConfigurationHelper::getRegisteredConsumerConfiguration($queueName);
			foreach($consumerConfigurations as $consumerConfiguration) {
				$output .= '<li>' . htmlspecialchars($consumerConfiguration['className']) . '</li>';
			}
			$output .= '</ul>';
		}

		return new tx_reports_reports_status_Status(
			'AMQP Registered Consumers', '', $output, tx_reports_reports_status_Status::NOTICE
		);
	}
}

?>
