<?php
App::uses('Component', 'Controller');

class WebsiteComponent extends Component {
	
	public function getWebsite($url) {
		return new Website($url);
	}
	
	
}

class Website {
	
	public $htmlContent = '';
	public $title = '';
	public $url = '';
	
	
	function __construct($url = null) {
		
		$url;
		
		if ($url == null) {
			throw new Exception('Website-Exception: No url passed for Website-Object-Instantiation!');
			return;
		}
		
		$htmlContent = file_get_contents($url);
		
		if(empty($htmlContent)) {
			throw new Exception('Website-Exception: URL linked to no content! URL: '.$url);
			return;
		}
		
		if(strlen($htmlContent)>0) {
			preg_match("/\<title\>(.*)\<\/title\>/",$htmlContent,$result);
		}
		
		if (isset($result[1]) && !empty($result[1])) {
			$this->title = $result[1];
		} else if (isset($result[0]) && !empty($result[0])) {
			$this->title = $result[0];
		} else {
			$this->title = $url;
		}
		$this->url = $url;
		$this->htmlContent = $htmlContent;
		 
 }
	
	public function getHtmlContent() {
		return $this->htmlContent;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function getUrl() {
		return $this->url;
	}
	
}
