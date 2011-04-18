<?php
class Tx_T3orgFlickrfeed_Utility_Response {
	
	protected $content = null;
	
	public function __construct($content) {
		$this->content = $content;
	}
	
	public function isError() {
		return $this->content === false;
	}
	
	public function getBody() {
		return $this->content;
	}
}

?>