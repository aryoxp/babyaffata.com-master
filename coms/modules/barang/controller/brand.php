<?php
class barang_brand extends comsmodule {

	private $coms;

	function __construct($coms) {
		parent::__construct($coms);
		$this->coms = $coms;
		
		$coms->require_auth('auth'); 
	}
	
	function index($by = 'all', $keyword = NULL, $page = 1, $perpage = 500){
		$mbrand = new model_brand();		
		
		$data['posts'] = $mbrand->read('');	
		
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
		
		$this->view( 'brand/index.php', $data );
	}
	
	function write(){
		$mconf = new model_conf();
		$mbrand = new model_brand();		
	
		$data['posts'] = "";
		
		$this->add_script('js/barang.js');
		
		$this->view('brand/edit.php', $data);
		
	}	
	
	function edit($id){
		if( !$id ) {
			$this->redirect('module/barang/brand');
			exit;
		}
		
		$mconf = new model_conf();
		$mbrand = new model_brand();	
		
		$data['posts'] = $mbrand->read($id);	
	
		$this->add_script('js/barang.js');
		
		$this->view('brand/edit.php', $data);
	}
	
	function save(){
	
		if(isset($_POST['b_brand'])!=""){
			$this->saveToDB();
			exit();
		}else{
			$this->index();
			exit;
		}
	
	}
	
	function saveToDB(){
		ob_start();
		
		$mbrand	 = new model_brand();	
						
		$lastupdate	= date("Y-m-d H:i:s");
		$user		= $this->coms->authenticatedUser->username;
		
		$brand		= $_POST['brand'];
		
		
		if($brand){
			$sfile	= $_FILES['file']['name'];
			
			if($sfile){
				$filename = stripslashes(@$_FILES['file']['name']); 
				$extension = $this->getExtension($filename); 
				$extension = strtolower($extension); 
				
				$big		= trim(preg_replace('/[ \/]/', '-', (preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 \/]/', '', strtolower($brand)))))).".".$extension;
				$small		= "thumb-".$big;
				
				
				
				if (($extension != "png") && ($extension != "jpg")
                    && ($extension != "jpeg") && ($extension != "gif")){
					$result['error'] = "Unknown extension! Please upload image only";
					print "<script> alert('Unknown extension! Please upload image only'); </script>"; 
					$errors=1; 

					$this->index();
					exit();
					
				}
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
				$uploadedfile = $_FILES['file']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
				
				}
				else if($extension=="png")
				{
				$uploadedfile = $_FILES['file']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
				
				}
				else 
				{
				$src = imagecreatefromgif($uploadedfile);
				}
				
				$dirbig 	= "assets/uploads/file/brand";
				$dirsmall 	= "assets/uploads/file/brand/thumb";
				$base = getcwd();
				//mkdir($base."/".$dirbig);
                @chmod($base."/assets", 0777);
                @mkdir($base."/assets/uploads");
                @mkdir($base."/assets/uploads/file");
                @mkdir($base."/assets/uploads/file/brand");
                @mkdir($base."/assets/uploads/file/brand/thumb");
                //mkdir($base."/".$dirsmall);

				if(!file_exists($dirbig) OR !is_dir($dirbig)){
					mkdir($dirbig, 0777, true);         
				} 
				
				if(!file_exists($dirsmall) OR !is_dir($dirsmall)){
					mkdir($dirsmall, 0777, true);         
				} 
				
				list($width,$height)=getimagesize($uploadedfile);

				//$newwidth=60;
				//$newheight=($height/$width)*$newwidth;
                $newheight = 64;
                $newwidth = ($width/$height)*$newheight;
				$tmp=imagecreatetruecolor($newwidth,$newheight);
                imagealphablending($tmp,false);
                imagesavealpha($tmp,true);
                $transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
                imagefilledrectangle($tmp, 0, 0, $newwidth, $newheight, $transparent);
                imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				
				$newname = "assets/uploads/file/brand/". $big;
				$copied = move_uploaded_file($_FILES['file']['tmp_name'], $newname); 
				
				$thumbname = "assets/uploads/file/brand/thumb/". $small;
				imagepng($tmp,$thumbname);
				
				if (!$copied){  
					print "<script> alert('Copy unsuccessfull!'); </script>"; 
					$errors=1; 
					
					$this->redirect('module/barang/brand'); // $this->index();
					exit();
				}					
				
				$datanya 	= array('keterangan'=>$brand, 'logo'=>$newname,'logo_thumb'=>$thumbname, 'user_id'=>$user, 'last_update'=>$lastupdate);
			}else{
				$datanya 	= array('keterangan'=>$brand, 'user_id'=>$user, 'last_update'=>$lastupdate);
			}
								
			if($_POST['hidId']){
				$idnya	= array('brand_id'=>$_POST['hidId']);
				$mbrand->update_brand($datanya, $idnya);
				
			}else{
				$mbrand->replace_brand($datanya);
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
		
		$mbrand = new model_brand();	
		
		ob_start();
		
		$result = array();
		
		$datanya=array('brand_id'=>$id);
				
		if($mbrand->delete_brand($datanya))
			$result['status'] = "OK";
		else {
			$result['status'] = "NOK";
			$result['error'] = $mbrand->error;
		}
		echo json_encode($result);
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