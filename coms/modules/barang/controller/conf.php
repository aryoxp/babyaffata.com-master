<?php
class barang_conf extends comsmodule {

	private $coms;

	function __construct($coms) {
		parent::__construct($coms);
		$this->coms = $coms;
		
		// this controller requires authentication
		// initialize it
		$coms->require_auth('auth'); 
	}
		
	function  index(){
		
		$mconf = new model_conf();		
		
		$data['posts'] = $mconf->read();			
			
		$this->view( 'conf/index.php', $data );
	}
	
	
	
	
	function kategori_barang(){
		if(isset($_GET['term'])){
			$str = $_GET['term'];
		}else{
			$str = "";
		}
		
		$mconf 	= new model_conf();
		$data	= $mconf->get_kategori_barang($str);
		
		$return_arr = array();
		
		foreach($data as $row){
			foreach ($row as $key => $value) {
				 $arr[$key] = $value;				 
			}
			array_push($return_arr,$arr);
		}
			
		$json_response = json_encode($return_arr);

		# Optionally: Wrap the response in a callback function for JSONP cross-domain support
		if(isset($_GET["callback"])) {
			$json_response = $_GET["callback"] . "(" . $json_response . ")";
		}

		# Return the response
		echo $json_response;
	}
	
	function brand(){
		if(isset($_GET['term'])){
			$str = $_GET['term'];
		}else{
			$str = "";
		}
		
		$mconf 	= new model_conf();
		$data	= $mconf->get_brand($str);
		
		$return_arr = array();
		
		foreach($data as $row){
			foreach ($row as $key => $value) {
				 $arr[$key] = $value;				 
			}
			array_push($return_arr,$arr);
		}
			
		$json_response = json_encode($return_arr);

		# Optionally: Wrap the response in a callback function for JSONP cross-domain support
		if(isset($_GET["callback"])) {
			$json_response = $_GET["callback"] . "(" . $json_response . ")";
		}

		# Return the response
		echo $json_response;
	}
	
}
?>