<?php 

require_once 'Zend/Service/Flickr.php';

/**
 * extend Zend_Service_Flickr to use the TYPO3 methods 
 * to fetch an url
 * 
 * @author Christian Zenker <christian.zenker@599media.de>
 */
class Tx_T3orgFlickrfeed_Utility_Flickr extends Zend_Service_Flickr {
	
	/**
     * Returns a reference to the REST client, instantiating it if necessary
     *
     * @return Tx_T3orgFlickrfeed_Utility_HttpClient
     */
    public function getRestClient() {
        if (is_null($this->_restClient)) {
            $this->_restClient = new Tx_T3orgFlickrfeed_Utility_HttpClient(self::URI_BASE);
        }

        return $this->_restClient;
    }
}

