<?php
class content_install extends comsmodule {
	private $coms;

	function __construct($coms) {
		parent::__construct($coms);
		$this->coms = $coms;

		// this controller requires authentication
		// initialize it
		$coms->require_auth('auth'); 
	}
	
	public function execute() {	
		$mcontent = new model_content();
		if($mcontent->install()) {
			$this->redirect('module/content/install/success');
		} else {
			$this->redirect('module/content/install/fail');
		}
		exit;
	}
	
	public function success() {
		$this->view('install-ok.php');
	}
	
	public function fail() {
		$this->view('install-nok.php');
	}
}