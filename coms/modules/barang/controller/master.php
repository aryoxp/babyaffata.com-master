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
		
		$data['posts'] = $mmaster->read();	
		
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
		
		$this->view( 'master/index.php', $data );
	}
	
	function write(){
		$mconf = new model_conf();
		$mmaster = new model_master();		
		
		
		$data['posts'] 		= "";
		$data['kategori'] 	= $mconf->get_kategori_barang();
		$data['brand']		= $mconf->get_brand();	
		$data['dimensi']	= $mconf->get_dimensi_barang();
		$data['deskripsi']	= $mconf->get_nama_detail_barang();
		
		$this->coms->add_style('css/custom-theme/jquery-ui-1.8.16.custom.css');
		$this->coms->add_style('css/token-input-facebook.css');
		$this->coms->add_style('css/bootstrap/bootstrap-tagmanager.css');
		
		$this->coms->add_script('js/jquery-ui-1.8.16.custom.min.js');		
		$this->coms->add_script('js/bootstrap/bootstrap-tagmanager.js');
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
		
		$mconf 		= new model_conf();
		$mmaster 	= new model_master();	
		
		$data['posts'] 		= $mmaster->read($id);	
		$data['kategori'] 	= $mconf->get_kategori_barang();
		$data['brand']		= $mconf->get_brand();	
		$data['dimensi']	= $mconf->get_dimensi_barang();
		$data['deskripsi']	= $mconf->get_nama_detail_barang();
		
		$this->coms->add_style('css/custom-theme/jquery-ui-1.8.16.custom.css');
		$this->coms->add_style('css/token-input-facebook.css');
		$this->coms->add_style('css/bootstrap/bootstrap-tagmanager.css');
		
		$this->coms->add_script('js/jquery-ui-1.8.16.custom.min.js');		
		$this->coms->add_script('js/bootstrap/bootstrap-tagmanager.js');
		$this->coms->add_script('ckeditor/ckeditor.js');
		$this->coms->add_script('js/jquery.tokeninput.js');		
						
		$this->add_script('js/barang.js');
		
		$this->view('master/edit.php', $data);
	}
	
	function save(){
	
		if(isset($_POST['b_master'])){
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
		
		$lastupdate	= date("Y-m-d H:i:s");
		$tahun		= date("y");
		$user		= $this->coms->authenticatedUser->username;
		
		if($_POST['b_master']){
			
			
		/* generate kode barang */
			if(isset($_POST['chkgenerate'])){
				$str		= strToUpper(substr($_POST['nama_barang'],0,1)).$tahun;
				$strkode	= $mmaster->get_kode_barang($str);
				
				$kodebarang	= $str.$strkode;				
			}else{
				$kodebarang	= $_POST['kode_barang'];	
			}
			
			$namabarang		= $_POST['nama_barang'];
			$brand			= $_POST['brandid'];
			$alias			= trim(preg_replace('/[ \/]/', '-', (preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 \/]/', '', strtolower($kodebarang.$namabarang))))));
						
			if(isset($_POST['ispublish'])){
				$ispublish = $_POST['ispublish'];
			}else{
				$ispublish = 0;
			}
				
			if($_POST['hidId']){
				$bid 	= $_POST['hidId'];
				$action = "update";
			}else{			
				$bid	= "";
				$action = "insert";			
			}		
				
			if($namabarang){
				$datanya = array('nama_barang'=>$namabarang, 'kode_barang'=>$kodebarang, 'alias_barang'=>$alias, 'brand_id'=>$brand, 'is_publish'=>$ispublish, 'user_id'=>$user, 'last_update'=>$lastupdate);								 
				if($bid){
					$idnya	 = array('barang_id'=>$_POST['hidId']);
					$mmaster->update_barang($datanya, $idnya);
					$id		= $bid;
				}else{
					$mmaster->replace_barang($datanya);
					$id		= $mmaster->get_barang_id($namabarang, $kodebarang);
				}			
			}
			
					
			if($id){		
				$sfile	= $_FILES['file'];
				for($i=0;$i<count($sfile);$i++){
					if($i=0){
						$jenis	= 'main';
					}else{
						$jenis	= '-';
					}
					$nfile	= $_FILES['file']['name'][$i];
					$tfile	= $_FILES['file']['tmp_name'][$i];
					
					$this->upload_foto($i, $nfile,$tfile, $id, $alias, $mmaster, $jenis);
				}
						
				/* qty barang */		
				$available	= $_POST['qty'];
				$rejected	= $_POST['rejected'];
				$reserved	= $_POST['reserved'];
				$preorder	= $_POST['preorder'];
				/*$minorder	= $_POST['min_order'];
				$maxorder	= $_POST['max_order'];
				$tglpreoder	= $_POST['tgl_preorder'];*/
				$qty		= $available + $rejected + $reserved;
						
				
				/* stok */
				$datanya = array( 'qty'=>$qty, 'available'=>$available,	'rejected'=>$rejected, 'reserved'=>$reserved, 'preorder'=>$preorder, 
							'barang_id'=>$id, 'user_id'=>$user, 'last_update'=>$lastupdate);
				$mmaster->replace_stok($datanya);
				
				
				
				/*kategori barang */
				$kategori 	= explode(",", $_POST['kategori']);
				
				for($i=0;$i<count($kategori);$i++){
					$datanya = array('kategori_id'=>$kategori[$i], 'barang_id'=>$id);
					$mmaster->insert_kategori_barang($datanya);
				}
				
				for($i=0;$i<count($_POST['hidDesc']);$i++){
					$hiddesk	= $_POST['hidDesc'][$i];
					$deskripsi	= $_POST['deskripsi'][$i];
					
					$deskid	= $id.$i;
					
					if($deskripsi){
						$datanya = array('detail_id'=>$deskid, 'nama_detail_id'=>$hiddesk, 'barang_id'=>$id, 'keterangan'=>$deskripsi);
						$mmaster->replace_deskripsi($datanya);
					}
				}
				
				$beli		= $_POST['beli'];
				$jual		= $_POST['jual'];
				$ppn		= $_POST['ppn'];
				$diskon		= $_POST['diskon'];
				$this->insert_harga($beli, $jual, $ppn, $diskon, $id, $user, $lastupdate, $mmaster, $bid);
				
				$this->insert_tag($_POST['hidBarang'], $id, $mmaster);
				
											
				unset($_POST['b_master']);
				$this->index('ok');
				exit();
				
			}else{
				$this->index('nok');
				exit();
			}
		}
		
	}
	
	function delete(){
		$id = $_POST['id'];
		
		$mmaster = new model_master();	
		
		ob_start();
		
		$result = array();
		
		$datanya=array('barang_id'=>$id);
				
		if($mmaster->delete_barang($datanya))
			$result['status'] = "OK";
		else {
			$result['status'] = "NOK";
			$result['error'] = $mmaster->error;
		}
		echo json_encode($result);
	}
	
	function insert_harga($beli, $jual, $ppn, $diskon, $id, $user, $lastupdate, $mmaster, $bid){
		$idnya	 = Array('barang_id'=>$id);
		$datanya = Array('harga_jual'=>$jual, 'harga_beli'=>$beli, 'ppn'=>$ppn, 'diskon'=>$diskon, 'user_id'=>$user, 'last_update'=>$lastupdate, 'barang_id'=>$id);
		
		if($bid){
			$mmaster->update_harga_barang($datanya, $idnya);
		}else{
			$mmaster->replace_harga_barang($datanya);
		}
	}
	
	function insert_tag($tags, $id, $mmaster){
		$tag = explode("&", $tags);
				
		for($i=0;$i<count($tag);$i++){
			$datanya = array('barang_id'=>$id, 'tag'=>$tag[$i]);
			if($tag[$i]){
				$mmaster->replace_tags($datanya);	
			}				
		}		
	}
	
	
	function upload_foto($i, $sfile, $tfile, $id, $alias, $mmaster, $jenis){
		if($sfile){
			$filename 	= stripslashes(@$sfile); 
			$extension 	= $this->getExtension($filename); 
			$extension 	= strtolower($extension); 
			
			$big		= $i.$alias.".".$extension;
			$small		= "thumb-".$big;
			
			
			
			if (($extension != "png") && ($extension != "jpg") && ($extension != "jpeg")){ 
				$result['error'] = "Unknown extension! Please upload image only";
				print "<script> alert('Unknown extension! Please upload image only'); </script>"; 
				$errors=1; 
				
				$this->index();
				exit();
				
			}
			
			if($extension=="jpg" || $extension=="jpeg" )
			{
			$uploadedfile = $tfile;
			$src = imagecreatefromjpeg($uploadedfile);
			
			}
			else if($extension=="png")
			{
			$uploadedfile = $tfile;
			$src = imagecreatefrompng($uploadedfile);
			
			}
			else 
			{
			$src = imagecreatefromgif($uploadedfile);
			}
			
			$dirbig 	= "assets/uploads/file/barang";
			$dirsmall 	= "assets/uploads/file/barang/thumb";
			
			
			if(!file_exists($dirbig) OR !is_dir($dirbig)){
				mkdir($dirbig, 0777, true);         
			} 
			
			if(!file_exists($dirsmall) OR !is_dir($dirsmall)){
				mkdir($dirsmall, 0777, true);         
			} 
			
			list($width,$height)=getimagesize($uploadedfile);

			$newwidth=60;
			$newheight=($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);				
			
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);						
			
			$newname = "assets/uploads/file/barang/". $big;
			$copied = move_uploaded_file($tfile, $newname); 
			
			$thumbname = "assets/uploads/file/barang/thumb/". $small;
			imagejpeg($tmp,$thumbname,100);
			
			if (!$copied){  
				print "<script> alert('Copy unsuccessfull!'); </script>"; 
				$errors=1; 
				
				$this->index();
				exit();
			}					
			
			$datanya 	= Array('nama_file'=>$big, 'thumb_file'=>$small, 'lokasi'=>$newname,'lokasi_thumb'=>$thumbname, 'barang_id'=>$id, 'jenis'=>$jenis);
			$mmaster->replace_foto($datanya);
		}
	}
	
	function getExtension($str) { 
		$i = strrpos($str,"."); 
		if (!$i) { return ""; } 
		$l = strlen($str) - $i; 
		$ext = substr($str,$i+1,$l); 
		return $ext; 
	}  
	
}
?>