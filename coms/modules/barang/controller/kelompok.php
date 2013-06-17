<?php
class barang_kelompok extends comsmodule {

	private $coms;

	function __construct($coms) {
		parent::__construct($coms);
		$this->coms = $coms;
		
		$coms->require_auth('auth'); 
	}
	
	function index($by = 'all', $keyword = NULL, $page = 1, $perpage = 500){
		$mkelompok = new model_kelompok();		
		
		$data['posts'] = $mkelompok->read('');	
		
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
		
		$this->view( 'kelompok/index.php', $data );
	}
	
	function write(){
		$mconf 	= new model_conf();
		$mkelompok = new model_kelompok();		
		
		
		$data['tahap'] 		= $mkelompok->get_tahap();	
		$data['posts'] 		= "";
		$data['kategori']	= $mkelompok->get_kategori();
		
		$this->add_script('js/barang.js');
		
		$this->view('kelompok/edit.php', $data);
		
	}	
	
	function edit($id){
		if( !$id ) {
			$this->redirect('module/barang/kelompok');
			exit;
		}
		
		$mconf 	= new model_conf();
		$mkelompok = new model_kelompok();	
		
		$data['posts'] = $mkelompok->read($id);	
		$data['tahap'] = $mkelompok->get_tahap();	
		$data['kategori']	= $mkelompok->get_kategori();
						
		$this->add_script('js/barang.js');
		
		$this->view('kelompok/edit.php', $data);
	}
	
	function save(){
	
		if(isset($_POST['b_kelompok'])!=""){
			$this->saveToDB();
			exit();
		}else{
			$this->index();
			exit;
		}
	
	}
	
	function saveToDB(){
		ob_start();
		
		$mkelompok	 = new model_kelompok();	
		$mconf	 = new model_conf();
					
		$today	= str_replace('-', '', date("y-m-d"));
		$jam	= str_replace(':', '', date("H:i:s"));		
		
		
		$noreg	= $mkelompok->get_kelompok_id();
			
		if($_POST['hidId']!=""){
			$kode 		= $_POST['hidId'];
			$action 	= "update";
		}else{
			$kode		= $noreg;
			$action 	= "insert";			
		}
		
		if(isset($_POST['isaktif'])!=""){
			$isaktif	= $_POST['isaktif'];
		}else{
			$isaktif	= 0;
		}
		
		if(isset($_POST['ispublish'])!=""){
			$ispublish	= $_POST['ispublish'];
		}else{
			$ispublish	= 0;
		}
		
				
		$lastupdate	= date("Y-m-d H:i:s");
		$user		= $this->coms->authenticatedUser->username;
		$subkategori= $_POST['cmbsub'];
		$keterangan	= $_POST['keterangan'];
		$kategoriid	= $_POST['cmbkategori'];
		
		if($keterangan){
			$datanya 	= Array('kelompok_id'=>$kode, 'kategori_id'=>$kategoriid, 'parent_id'=>$subkategori, 'keterangan'=>$keterangan,  'is_publish'=>$ispublish, 'is_aktif'=>$isaktif, 'user_id'=>$user, 'last_update'=>$lastupdate);
			$mkelompok->replace_kelompok($datanya);
			
			$this->index('ok');
			exit();
		}else{
			$this->index('nok');
			exit();
		}
	}
	
	function delete(){
		$id = $_POST['id'];
		
		$mkelompok = new model_kelompok();	
		
		ob_start();
		
		$result = array();
		
		$datanya=array('kelompok_id'=>$id);
				
		if($mkelompok->delete_komponen($datanya))
			$result['status'] = "OK";
		else {
			$result['status'] = "NOK";
			$result['error'] = $mkelompok->error;
		}
		echo json_encode($result);
	}
	
}
?>