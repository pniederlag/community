<?php

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

	protected function getDomainFromHost($host) {
		$parts = array_slice(explode('.', $host), -2);
		return implode('.', $parts);
	}
}