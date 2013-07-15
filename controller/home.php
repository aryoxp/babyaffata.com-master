<?php

class controller_home extends extcontroller {
	public function __construct() {
		parent::__construct();
	}	
	
	public function index() {

        $mbrand = new model_brand();
        $brands = $mbrand->read();

        $data['brands'] = $brands;

        $this->add_style('style/home.css');
        $this->add_style('style/lemonslider.css');
        $this->add_script('script/lemmon-slider.js');
        //$this->add_style('style/elastislide.css');
        //$this->add_script('script/jquerypp.custom.js');
        //$this->add_script('script/jquery.elastislide.js');
        $this->add_script('script/home.js');

		$this->view('header.php');
		$this->view('home.php', $data);
		$this->view('footer.php');
	}
}