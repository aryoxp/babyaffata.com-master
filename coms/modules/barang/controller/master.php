<?php
class barang_master extends comsmodule {

	private $coms;

	function __construct($coms) {
		parent::__construct($coms);
		$this->coms = $coms;
		
		$coms->require_auth('auth'); 
	}
	
	function index($by = 'all', $keyword = NULL, $page = 1, $perpage = 500){
		$mmaster = new model_master();		
		
		$data['posts'] = $mmaster->read('');	
		
		$this->coms->add_style('bootstrap/css/DT_bootstrap.css');
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
		
		$this->view( 'master/index.php', $data );
	}
	
	function write(){
		$mconf = new model_conf();
		$mmaster = new model_master();		
		
		
		$data['posts'] 		= "";
		$data['kategori'] 	= $mconf->get_kategori_barang();
		$data['manufacture']= $mconf->get_manufacture();	
		$data['dimensi']	= $mconf->get_dimensi_barang();
		$data['deskripsi']	= array('deskripsi','features');
		
		$this->coms->add_style('css/custom-theme/jquery-ui-1.8.16.custom.css');
		$this->coms->add_style('css/token-input-facebook.css');
		$this->coms->add_style('bootstrap/css/bootstrap-tagmanager.css');
		
		$this->coms->add_script('js/jquery-ui-1.8.16.custom.min.js');		
		$this->coms->add_script('bootstrap/js/bootstrap-tagmanager.js');
		$this->coms->add_script('ckeditor/ckeditor.js');
		$this->coms->add_script('js/jquery.tokeninput.js');		
		$this->add_script('js/barang.js');	
		
		$this->view('master/edit.php', $data);
		
	}	
	
	function edit($id){
		if( !$id ) {
			$this->redirect('module/barang/master');
			exit;
		}
		
		$mconf = new model_conf();
		$mmaster = new model_master();	
		
		$data['posts'] = $mmaster->read($id);	
		$data['tahap'] = $mmaster->get_tahap();	
						
		$this->add_script('js/barang.js');
		
		$this->view('master/edit.php', $data);
	}
	
	function save(){
	
		if(isset($_POST['b_master'])!=""){
			$this->saveToDB();
			exit();
		}else{
			$this->index();
			exit;
		}
	
	}
	
	function saveToDB(){
		ob_start();
		
		$mmaster = new model_master();	
		$mconf	 = new model_conf();
			
		if($_POST['hidId']!=""){
			$id 	= $_POST['hidId'];
			$action = "update";
		}else{			
			$id		= $mmaster->get_barang_id();
			$action = "insert";			
		}
		
		if(isset($_POST['isaktif'])){
			$isaktif = $_POST['isaktif'];
		}else{
			$isaktif = 0;
		}
		
		if(isset($_POST['ispublish'])){
			$ispublish = $_POST['ispublish'];
		}else{
			$ispublish = 0;
		}
		
		if(isset($_POST['isbaru'])){
			$isbaru = $_POST['isbaru'];
		}else{
			$isbaru = 0;
		}
		
		if(isset($_POST['ispromo'])){
			$ispromo = $_POST['ispromo'];
		}else{
			$ispromo = 0;
		}
		
		if(isset($_POST['ispreorder'])){
			$ispreorder = $_POST['ispreorder'];
		}else{
			$ispreorder = 0;
		}
						
		$lastupdate	= date("Y-m-d H:i:s");
		$tahun		= date("y");
		$user		= $this->coms->authenticatedUser->username;
		
						
		/* generate kode barang */
		if(isset($_POST['chkgenerate'])){
			$str		= strToUpper(substr($_POST['nama_barang'],0,1)).$tahun;
			$strkode	= $mmaster->get_kode_barang($str);
			
			$kodebarang	= $str.$strkode;				
		}else{
			$kodebarang	= $_POST['kode_barang'];	
		}
		
		$namabarang		= $_POST['nama_barang'];
		$manufacturer	= $_POST['manufactureid'];
		$alias			= trim(preg_replace('/[ \/]/', '-', (preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 \/]/', '', strtolower($kodebarang.$namabarang))))));
		
		echo $kodebarang;
		if($namabarang){
			
			/* qty barang */		
			$available	= $_POST['qty'];
			$rejected	= $_POST['rejected'];
			$reserved	= $_POST['reserved'];
			$preorder	= $_POST['preorder'];
			$minorder	= $_POST['min_order'];
			$maxorder	= $_POST['max_order'];
			$tglpreoder	= $_POST['tgl_preorder'];
			$qty		= $available + $rejected + $reserved;
			
			$datanya = Array('barang_id'=>$id, 'nama_barang'=>$namabarang, 'kode_barang'=>$kodebarang, 'qty'=>$qty, 'available'=>$available,
						'rejected'=>$rejected, 'reserved'=>$reserved, 'alias_barang'=>$alias, 'preorder'=>$preorder, 'tgl_available'=>$tglpreoder,
						'is_preoder'=>$ispreorder, 'is_publish'=>$ispublish, 'is_promo'=>$ispromo, 'is_aktif'=>$isaktif, 'is_baru'=>$isbaru,
						'user_id'=>$user, 'last_update'=>$lastupdate);
			$mmaster->replace_barang($datanya);
			
			/*kategori barang */
			$kategori 	= explode(",", $_POST['kategori']);
			
			for($i=0;$i<count($kategori);$i++){
				$datanya = Array('kelompok_id'=>$kategori[$i], 'barang_id'=>$id);
				$mmaster->replace_kategori($datanya);
			}
			
			/*tag barang */
			$tags	= explode("&", $_POST['hidBarang']);
			
			for($i=0;$i<count($tags);$i++){
				$datanya = Array('tag'=>$tags[$i], 'barang_id'=>$id);
				$mmaster->replace_tags($datanya);
			}		
			
			/*deskripsi barang */
			
			if(isset($_POST['ispaktif'])){
				$ispaktif = $_POST['ispaktif'];
			}else{
				$ispaktif = 0;
			}
			
			if(isset($_POST['isppublish'])){
				$isppublish = $_POST['isppublish'];
			}else{
				$isppublish = 0;
			}
				
			for($i=0;$i<count($_POST['hidDesc']);$i++){
				$hiddesk	= $_POST['hidDesc'][$i];
				$deskripsi	= $_POST['deskripsi'][$i];
				
				$deskid	= $id.$i;
				
				$datanya = Array('info_id'=>$deskid, 'jenis_info'=>$hiddesk, 'barang_id'=>$id, 'keterangan'=>$deskripsi, 
							'is_aktif'=>$ispaktif, 'is_publish'=>$isppublish);
				$mmaster->replace_deskripsi($datanya);
			}
			
			/*dimensi barang */		
			for($i=0;$i<count($_POST['hidDimensi']);$i++){
				$jenisdimensi= $_POST['hidDimensi'][$i];
				$dimensi	= $_POST['dimensi'][$i];
				$satuan		= $_POST['satuan'][$i];
				
				$dimensiid	= $id.$i;
				
				$datanya = Array('dimensi_id'=>$dimensiid, 'jenis_dimensi_barang'=>$jenisdimensi, 'barang_id'=>$id, 
							'keterangan'=>$dimensi, 'satuang'=>$satuan);
				$mmaster->replace_dimensi($datanya);
				
			}
			
			/*harga barang */
			if(isset($_POST['ishaktif'])){
				$ishaktif = $_POST['ishaktif'];
			}else{
				$ishaktif = 0;
			}
			
			$beli		= $_POST['beli'];
			$jual		= $_POST['jual'];
			$ppn		= $_POST['ppn'];
			$infdiskon	= $_POST['diskon'];
			$diskon		= $jual - ($infdiskon * $jual);
			$tglberlaku	= $_POST['tgl_berlaku'];
			$matauang	= $_POST['kurs'];
			
			$dataupdate	= Array('is_aktif'=>0);
			$idnya		= Array('barang_id'=>$id);
			$datanya	= Array('barang_id'=>$id, 'harga_jual'=>$jual, 'harga_beli'=>$beli, 'ppn'=>$ppn, 'diskon'=>$diskon, 'inf_diskon'=>$infdiskon, 'tgl_mulai_berlaku'=>$tglberlaku, 
						  'mata_uang'=>$matauang, 'is_aktif'=>$ishaktif);
			$mmaster->update_harga_barang($dataupdate, $idnya);
			$mmaster->replace_harga_barang($datanya);
			
			exit();
		
		}else{
			$this->index('nok');
			exit();
		}
				
		echo $kode;
		exit();
		
		if($kategori){
			$datanya 	= Array('kategori_id'=>$kode, 'parent_id'=>$subkategori, 'keterangan'=>$kategori,  'is_aktif'=>$isaktif, 
						 'user_id'=>$user, 'last_update'=>$lastupdate);
			//$mmaster->replace_kategori($datanya);
			
			$this->index('ok');
			exit();
		}else{
			$this->index('nok');
			exit();
		}
	}
	
	function delete(){
		$id = $_POST['id'];
		
		$mmaster = new model_master();	
		
		ob_start();
		
		$result = array();
		
		$datanya=array('kategori_id'=>$id);
				
		if($mmaster->delete_komponen($datanya))
			$result['status'] = "OK";
		else {
			$result['status'] = "NOK";
			$result['error'] = $mmaster->error;
		}
		echo json_encode($result);
	}
	
}
?>