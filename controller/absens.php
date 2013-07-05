<?php
class controller_absen extends controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() {
		$mconf		 	= new model_absen();
		$data['absen'] 	= $mconf->get_absen(date('Y-m-d'));
		$data['absen_pimpinan'] 	= $mconf->get_absen_pimpinan(date('Y-m-d'));
		
		$this->view( 'absen/index.php', $data );
	}
	
	
}
?>