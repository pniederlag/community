<?php 

class Tx_T3orgFlickrfeed_Utility_HttpClient {
	
	protected $uri = null;
	
	public function __construct($uri) {
		$this->uri = $uri;
	}
	
	public function getHttpClient() {
		return $this;
	}
	
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