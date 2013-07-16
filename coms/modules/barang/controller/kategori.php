<?php
class barang_kategori extends comsmodule {

	private $coms;

	function __construct($coms) {
		parent::__construct($coms);
		$this->coms = $coms;
		$coms->require_auth('auth'); 
	}
	
	function index($by = 'all', $keyword = NULL, $page = 1, $perpage = 500){

        if(isset( $_GET['q'] ))
            $keyword = trim($_GET['q']);

		$this->coms->add_style('css/bootstrap/DT_bootstrap.css');
		//$this->coms->add_script('js/datatables/jquery.dataTables.js');
		//$this->coms->add_script('js/datatables/DT_bootstrap.js');
		$this->coms->add_script('js/jsform.js');
		$data = array();
        $mkategori = new model_kategori();
        switch($by){
            case 'search':
                $data['posts'] = $mkategori->search($keyword);
                break;
            case 'all':
                $data['posts'] = $mkategori->read('');
                break;
            case 'ok':
				$data['status'] 	= 'OK';
				$data['statusmsg']  = 'OK, data telah diupdate.';
                $data['posts'] = $mkategori->read('');
			break;
            case 'nok':
				$data['status'] 	= 'Not OK';
				$data['statusmsg']  = 'Maaf, data tidak dapat disimpan.';
                $data['posts'] = $mkategori->read('');
			break;
		}
		
		$this->view( 'kategori/index.php', $data );
	}
	
	function write(){
		$mconf 	= new model_conf();
		$mkategori = new model_kategori();		
		
		$data['posts'] 		= "";
		$data['kategori']	= $mkategori->get_kategori();
		
		$this->add_script('js/barang.js');
		
		$this->view('kategori/edit.php', $data);
		
	}	
	
	function edit($id){
		if( !$id ) {
			$this->redirect('module/barang/kategori');
			exit;
		}
		
		$mconf 	= new model_conf();
		$mkategori = new model_kategori();	
		
		$data['posts'] = $mkategori->read($id);	
		$data['kategori']	= $mkategori->get_kategori();
						
		$this->add_script('js/barang.js');
		
		$this->view('kategori/edit.php', $data);
	}
	
	function save(){
	
		if(isset($_POST['b_kategori'])!=""){
			$this->saveToDB();
		} else {
            $this->redirect('coms/module/barang/kategori'); // prev: $this->index();
			exit;
		}
	
	}
	
	function saveToDB(){
		ob_start();
		
		$mkategori	 = new model_kategori();	
		$mconf	 = new model_conf();
					
		$today	= str_replace('-', '', date("y-m-d"));
		$jam	= str_replace(':', '', date("H:i:s"));		
		
		
		$noreg	= $mkategori->get_kategori_id();
			
		if($_POST['hidId']!=""){
			$kode 		= $_POST['hidId'];
			$action 	= "update";
		}else{
			$kode		= $noreg;
			$action 	= "insert";			
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
        $key        = trim(preg_replace('/[ \/]/', '-',
            (preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 \/]/', '', strtolower($keterangan))))));
		
		if($keterangan){
			$datanya 	= Array('kategori_id'=>$kode, 'kategori_key'=>$key, 'parent_id'=>$subkategori, 'keterangan'=>$keterangan,  'is_publish'=>$ispublish);
			$mkategori->replace_kategori($datanya);
			$this->redirect('module/barang/kategori/index/ok');
			exit();
		}else{
			$this->redirect('module/barang/kategori/index/nok');
			exit();
		}
	}
	
	function delete(){
		$id = $_POST['id'];
		
		$mkategori = new model_kategori();	
		
		ob_start();
		
		$result = array();
		
		$datanya=array('kategori_id'=>$id);
				
		if($mkategori->delete_komponen($datanya))
			$result['status'] = "OK";
		else {
			$result['status'] = "NOK";
			$result['error'] = $mkategori->error;
		}
		echo json_encode($result);
	}
	
}
?>