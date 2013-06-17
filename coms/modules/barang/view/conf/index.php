<?php
$this->head();

if($posts !=""){
	$header		= "Edit Konfigurasi";	
	
	foreach ($posts as $row):				
		$tahun		= $row->tahun;
		$semester	= $row->is_ganjil;
		$pendek		= $row->is_pendek;
		$skripsi	= $row->kode_skripsi;	
		$aktif		= $row->is_aktif;
	endforeach;		
	
}else{
	$header		= "Konfigurasi";
	$tahun		= date("Y");
	$semester	= '';
	$pendek		= '';
	$skripsi	= '-';	
	$aktif		= 1;
}
?>

<div class="container-fluid">  
	<fieldset>
	<legend>
		<?php echo $header; ?>
    </legend> 
    <div class="row-fluid">    
        <div class="span12">
<?php		
			$str = "<form method=post  action=".$this->location('module/barang/conf/save').">";								
						$str.= "<label>Tahun Aktif</label>";
					$str.= "<input type=number name='tahun' value='".$tahun."' class='input-mini' pattern='\d{4}' required><br>";
					$str.= "<label>Semester</label>";
					$str.= "<select name=semester><option value='-'>Please Select..</option>
								<option value='genap' ";
							if($semester=='genap'){
								$str.= "selected";
							}
					$str.= ">GENAP</option>
								<option value='ganjil' ";
							if($semester=='ganjil'){
								$str.= "selected";
							}							
					$str.= ">GANJIL</option>
							</select><br>
								";
					$str.= "<label>Semester Pendek?</label>";
					$str.= "<label class='radio inline'><input type=radio name='pendek' value='pendek' ";
							if($pendek=='pendek'){
								$str.= "checked";
							}
					$str.= ">Ya</label>&nbsp;
							<label class='radio inline'><input type=radio name='pendek' value=''  ";
							if($pendek!='pendek'){
								$str.= "checked";
							}
					$str.= ">Tidak</label><br><br>"; 
					$str.= "<label>Kode Skripsi</label>";
					$str.= "<input type=text name='skripsi' value='".$skripsi."' required><br>"; 
						
						$str.= "<input type=submit name='b_conf' id='b_conf' value='  Save  ' class='btn btn-primary'>";
					$str.= "</form>";
					
					echo $str;
		echo "</div></div></fieldset></div>";
$this->foot();

?>