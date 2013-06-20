<?php

class controller_page extends controller {
	public function __construct() {
		parent::__construct();
	}	
	
	public function read($key) {
	
		$mcontent = new model_content();
		$data['content'] = $mcontent->read(trim($key));
	
		$this->view('header.php');
		$this->view('read.php', $data);
		$this->view('footer.php');
	}
}