<?php

class controller_home extends extcontroller {
	public function __construct() {
		parent::__construct();
	}	
	
	public function index() {
        $this->add_style('style/home.css');
        $this->add_style('style/elastislide.css');
        $this->add_script('script/jquerypp.custom.js');
        $this->add_script('script/jquery.elastislide.js');
        $this->add_script('script/home.js');
		$this->view('header.php');
		$this->view('home.php');
		$this->view('footer.php');
	}
}