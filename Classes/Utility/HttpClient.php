<?php 

/**
 * mocks Zend_Rest_Client and Zend_Http_Client
 * 
 * @author Christian Zenker <christian.zenker@599media.de>
 */
class Tx_T3orgFlickrfeed_Utility_HttpClient {
	
	/**
	 * baseUrl to fetch from
	 * @var string
	 */
	protected $uri = null;
	
	/**
	 * __constructor
	 * @param string $uri baseUrl
	 */
	public function __construct($uri) {
		$this->uri = $uri;
	}
	
	/**
	 * get an HTTP client
	 * 
	 * (Zend uses different clients, but we just mock this
	 * one in this class, too)
	 * 
	 * @return Tx_T3orgFlickrfeed_Utility_HttpClient
	 */
	public function getHttpClient() {
		return $this;
	}
	
	/**
	 * reset all given parameters
	 * 
	 * this is empty here, as I don't know what should be reset
	 */
	public function resetParameters() {
		
	}
	
	/**
     * Performs an HTTP GET request to the $path.
     *
     * @param string $path
     * @param array  $query Array of GET parameters
     */
	public function restGet($path, array $query = null) {
		return new Tx_T3orgFlickrfeed_Utility_Response(t3lib_div::getURL(sprintf(
			'%s%s?%s',
			$this->uri,
			$path,
			t3lib_div::implodeArrayForUrl('',$query)
		)));
        
    }
	
}

?>