<?php
class barang_home extends comsmodule {

	private $coms;

	function __construct($coms) {
		parent::__construct($coms);
		$this->coms = $coms;
		
		// this controller requires authentication
		// initialize it
		$coms->require_auth('auth'); 
	}
	
	function index() {
		$data['content'] = 'Hello! I am content from controller <code>' 
			. $this->className . '</code> method <code>' 
			. $this->methodName . '</code>';
		$this->head();
		$this->view( 'home.php', $data );
		$this->foot();
	}

    function settings() {
        $this->head();
        $this->view('conf/settings.php');
        $this->foot();
    }
	
	
}
?>