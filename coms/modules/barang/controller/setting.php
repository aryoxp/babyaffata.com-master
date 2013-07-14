<?php
class barang_setting extends comsmodule {

	private $coms;

	function __construct($coms) {
		parent::__construct($coms);
		$this->coms = $coms;
		
		$coms->require_auth('auth'); 
	}
	
	function index($by = 'all', $keyword = NULL, $page = 1, $perpage = 500){
		$msetting = new model_setting();		
		
		$data['posts'] = $msetting->read();	
		
		//$this->coms->add_style('css/bootstrap/DT_bootstrap.css');
		//$this->coms->add_script('js/datatables/jquery.dataTables.js');
		//$this->coms->add_script('js/datatables/DT_bootstrap.js');

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
		
		$this->view( 'setting/index.php', $data );
	}
	
	function write(){
		$msetting = new model_setting();		
	
		$data['posts'] = "";
		
		$this->add_script('js/barang.js');
		
		$this->view('setting/edit.php', $data);
		
	}	
	
	function edit($id){
		if( !$id ) {
			$this->redirect('module/barang/setting');
			exit;
		}
		
		$msetting = new model_setting();	
		
		$data['posts'] = $msetting->read($id);	
	
		$this->add_script('js/barang.js');
		
		$this->view('setting/edit.php', $data);
	}
	
	function save(){
	
		if(isset($_POST['b_nama_detail'])!=""){
			$this->saveToDB();
			exit();
		}else{
			$this->redirect('module/barang/setting'); //$this->index();
			exit;
		}
	
	}
	
	function saveToDB(){
		ob_start();
		
		$msetting	= new model_setting();	
						
		$lastupdate	= date("Y-m-d H:i:s");
		$user		= $this->coms->authenticatedUser->username;
		
		$setting	= $_POST['nama_detail'];
		
		$datanya 	= Array('nama_detail'=>$setting);
			
								
		if($_POST['hidId']){
			$idnya	= array('nama_detail_id'=>$_POST['hidId']);
			$msetting->update_nama_detail($datanya, $idnya);
			
		}else{
			$msetting->replace_nama_detail($datanya);
		}

        $this->redirect('module/barang/setting/index/ok'); //$this->index('ok');
        exit;
	
	}
	
	function delete(){
		$id = $_POST['id'];
		
		$msetting = new model_setting();	
		
		ob_start();
		
		$result = array();
		
		$datanya=array('nama_detail_id'=>$id);
				
		if($msetting->delete_nama_detail($datanya))
			$result['status'] = "OK";
		else {
			$result['status'] = "NOK";
			$result['error'] = $msetting->error;
		}
		echo json_encode($result);
	}
	
}
?>