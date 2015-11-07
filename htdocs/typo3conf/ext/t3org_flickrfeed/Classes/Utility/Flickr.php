<?php 

require_once 'Zend/Service/Flickr.php';

/**
 * extend Zend_Service_Flickr to use the TYPO3 methods 
 * to fetch an url
 * 
 * @author Christian Zenker <christian.zenker@599media.de>
 */
class Tx_T3orgFlickrfeed_Utility_Flickr extends Zend_Service_Flickr {

	const URI_BASE = 'https://www.flickr.com';
	
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
    
   /**
     * resolve dependencies on Zend/Validate
     *
     * @param  array $options
     * @return void
     * @throws Zend_Service_Exception
     */
    protected function _validateTagSearch(array $options)
    {
        $validOptions = array('method', 'api_key', 'user_id', 'tags', 'tag_mode', 'text', 'min_upload_date',
                              'max_upload_date', 'min_taken_date', 'max_taken_date', 'license', 'sort',
                              'privacy_filter', 'bbox', 'accuracy', 'safe_search', 'content_type', 'machine_tags',
                              'machine_tag_mode', 'group_id', 'contacts', 'woe_id', 'place_id', 'media', 'has_geo',
                              'geo_context', 'lat', 'lon', 'radius', 'radius_units', 'is_commons', 'is_gallery',
                              'extras', 'per_page', 'page');

        $this->_compareOptions($options, $validOptions);

        $options['per_page'] = t3lib_div::intInRange($options['per_page'], 1, 500, 10);

        if($options['page']) {
        	$options['page'] = intval($options['page']);
        }

    }
    
    /**
    * resolve dependencies on Zend/Validate
    *
    * @param  array $options
    * @throws Zend_Service_Exception
    * @return void
    */
    protected function _validateGroupPoolGetPhotos(array $options)
    {
        $validOptions = array('api_key', 'tags', 'method', 'group_id', 'per_page', 'page', 'extras', 'user_id');

        $this->_compareOptions($options, $validOptions);

        $options['per_page'] = t3lib_div::intInRange($options['per_page'], 1, 500, 10);

        if($options['page']) {
        	$options['page'] = intval($options['page']);
        }
    }
    
    /**
     * Validate User Search Options
     *
     * @param  array $options
     * @return void
     * @throws Zend_Service_Exception
     */
    protected function _validateUserSearch(array $options)
    {
        $validOptions = array('api_key', 'method', 'user_id', 'per_page', 'page', 'extras', 'min_upload_date',
                              'min_taken_date', 'max_upload_date', 'max_taken_date', 'safe_search');

        $this->_compareOptions($options, $validOptions);

        $options['per_page'] = t3lib_div::intInRange($options['per_page'], 1, 500, 10);

        if($options['page']) {
        	$options['page'] = intval($options['page']);
        }
    }
    
}

