<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Christian Zenker <typo3@xopn.de>
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
 *
 * @package t3org_spamremover
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_T3orgSpamremover_Validator_Typo3UrlValidator extends Tx_Extbase_Validation_Validator_AbstractValidator {

	/**
	 * Checks if the given value is valid according to the validator.
	 *
	 * If at least one error occurred, the result is FALSE and any errors can
	 * be retrieved through the getErrors() method.
	 *
	 * Note that all implementations of this method should set $this->errors() to an
	 * empty array before validating.
	 *
	 * @param mixed $value The value that should be validated
	 * @return boolean TRUE if the value is valid, FALSE if an error occured
	 */
	public function isValid($value) {
		$value = trim($value);
		if($value === '') {
			$this->addError('must not be empty', 1394289279);
			return FALSE;
		}
		$urlParts = parse_url($value);
		if($urlParts === FALSE) {
			$this->addError('this is not a valid url', 1394289280);
			return FALSE;
		}
		if(!array_key_exists('scheme', $urlParts)) {
			$this->addError('the url must contain a protocol', 1394289281);
			return FALSE;
		}
		if($urlParts['scheme'] !== 'http' && $urlParts['scheme'] !== 'https') {
			$this->addError('only http and https are supported', 1394289282);
			return FALSE;
		}
		if(!array_key_exists('host', $urlParts) || empty($urlParts['host'])) {
			$this->addError('host must not be empty', 1394289283);
			return FALSE;
		}
		$domain = $this->getDomainFromHost($urlParts['host']);
		if($domain !== 'typo3.org') {
			$this->addError('needs to be a typo3.org domain', 1394289284);
			return FALSE;
		}

		return TRUE;
	}

	/**
	 * Get domain from host
	 *
	 * @param $host
	 * @return string
	 */
	protected function getDomainFromHost($host) {
		$parts = array_slice(explode('.', $host), -2);
		return implode('.', $parts);
	}
}