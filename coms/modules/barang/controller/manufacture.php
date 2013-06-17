<?php
class barang_manufacture extends comsmodule {

	private $coms;

	function __construct($coms) {
		parent::__construct($coms);
		$this->coms = $coms;
		
		$coms->require_auth('auth'); 
	}
	
	function index($by = 'all', $keyword = NULL, $page = 1, $perpage = 500){
		$mmanufacture = new model_manufacture();		
		
		$data['posts'] = $mmanufacture->read('');	
		
		$this->coms->add_style('css/bootstrap/DT_bootstrap.css');
		$this->coms->add_script('js/datatables/jquery.dataTables.js');	
		$this->coms->add_script('js/datatables/DT_bootstrap.js');	

		$this->coms->add_script('js/jsform.js');
		
		switch($by){
			case 'ok';
				$data['status'] 	= 'OK';
				$data['statusmsg']  = 'OK, data telah diupdate.';
			break;
			case 'nok';
				$data['status'] 	= 'Not OK';
				$data['statusmsg']  = 'Maaf, data tidak dapat tersimpan.';
			break;
		}
		
		$this->view( 'manufacture/index.php', $data );
	}
	
	function write(){
		$mconf = new model_conf();
		$mmanufacture = new model_manufacture();		
	
		$data['posts'] = "";
		
		$this->add_script('js/barang.js');
		
		$this->view('manufacture/edit.php', $data);
		
	}	
	
	function edit($id){
		if( !$id ) {
			$this->redirect('module/barang/manufacture');
			exit;
		}
		
		$mconf = new model_conf();
		$mmanufacture = new model_manufacture();	
		
		$data['posts'] = $mmanufacture->read($id);	
	
		$this->add_script('js/barang.js');
		
		$this->view('manufacture/edit.php', $data);
	}
	
	function save(){
	
		if(isset($_POST['b_manufacture'])!=""){
			$this->saveToDB();
			exit();
		}else{
			$this->index();
			exit;
		}
	
	}
	
	function saveToDB(){
		ob_start();
		
		$mmanufacture	 = new model_manufacture();	
						
		$lastupdate	= date("Y-m-d H:i:s");
		$user		= $this->coms->authenticatedUser->username;
		
		$manufacture= $_POST['manufacture'];
		
		if($manufacture){
		
			$datanya 	= Array('manufacture_by'=>$manufacture);
						
			if($_POST['hidId']){
				$idnya	= array('manufacture_id'=>$_POST['hidId']);
				$mmanufacture->update_manufacture($datanya, $idnya);
				
			}else{
				$mmanufacture->replace_manufacture($datanya);
			}
			
			$this->index('ok');
			exit();
		}else{
			$this->index('nok');
			exit();
		}
	}
	
	function delete(){
		$id = $_POST['id'];
		
		$mmanufacture = new model_manufacture();	
		
		ob_start();
		
		$result = array();
		
		$datanya=array('manufacture_id'=>$id);
				
		if($mmanufacture->delete_manufacture($datanya))
			$result['status'] = "OK";
		else {
			$result['status'] = "NOK";
			$result['error'] = $mmanufacture->error;
		}
		echo json_encode($result);
	}
	
}
?>