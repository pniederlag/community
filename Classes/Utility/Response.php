<?php
/**
 * mocks Zend_Rest_Client_Response
 * 
 * @author Christian Zenker <christian.zenker@599media.de>
 */
class Tx_T3orgFlickrfeed_Utility_Response {
	
	/**
	 * @var string the fetched content from the url
	 */
	protected $content = null;
	
	/**
	 * _constructor
	 * 
	 * @param string $content the plain response to build the response from
	 */
	public function __construct($content) {
		$this->content = $content;
	}
	
	/**
	 * did some error occur?
	 * 
	 * @return boolean
	 */
	public function isError() {
		return $this->content === false;
	}
	
	/**
	 * get the body of the response
	 * 
	 * @return string
	 */
	public function getBody() {
		return $this->content;
	}
}

?>