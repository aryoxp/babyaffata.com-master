<?php

class controller_home extends controller {
	public function __construct() {
		parent::__construct();
	}	
	
	public function index() {
		$this->view('header.php');
		$this->view('home.php');
		$this->view('footer.php');
	}
}