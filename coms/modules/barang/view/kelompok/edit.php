<?php
$this->head();

if($posts!=""){
	$header		= "Edit Product Category";
	
	foreach ($posts as $dt):
		$parentid  	= $dt->parent_id;
		$keterangan	= $dt->keterangan;
		$isaktif	= $dt->is_aktif;
		$ispublish	= $dt->is_publish;
		$kategoriid	= $dt->kategori_id;
		$id			= $dt->kelompok_id;
	endforeach;
	
	$frmact 	= $this->location('module/barang/kelompok/save');		
	
}else{
	$header		= "New Product Category";
	$id			= "";
	$parentid  	= "";
	$kategoriid	= "";
	$keterangan	= "";
	$isaktif	= 0;
	$ispublish	= 0;
	
	$frmact 	= $this->location('module/barang/kelompok/save');		
}


?>

<div class="container-fluid">  
	
	<legend>
		<a href="<?php echo $this->location('module/barang/kelompok'); ?>" class="btn btn-info pull-right"><i class="icon-list"></i> Product Categories</a> 
		<?php if($posts !=""){	?>
		<a href="<?php echo $this->location('module/barang/kelompok/write'); ?>" class="btn pull-right" style="margin:0px 5px"><i class="icon-pencil"></i> Write Product Category</a>
		<?php } ?>
		<?php echo $header; ?>
    </legend> 
    <div class="row-fluid">    
        <div class="span12">
		
			<form method=post  action="<?php echo $this->location('module/barang/kelompok/save'); ?>" class="form-horizontal">
				
				
				 <div class="control-group">	
					<label class="control-label">Group Category</label>
					<div class="controls">
					
						<select name ='cmbkategori'>
							<option value='-'>Please Select..</option>
							<?php
								foreach($kategori as $dt):
									echo "<option value='".$dt->kategori_id."' ";
									if($kategoriid==$dt->kategori_id){
										echo "selected";
									}
									echo " >".$dt->keterangan."</option>";
								endforeach;
							?>
						</select>
					</div>
				</div>
				
				 <div class="control-group">	
					<label class="control-label">Category is children of</label>
					<div class="controls">
						<select name="cmbsub">
							<option value="0">Please Select..</option>						
							<?php							
																								
								foreach($tahap as $dt):
									echo "<option value='".$dt->kelompok_id."' ";
									if($parentid==$dt->kelompok_id){
										echo "selected";
									}
									
									if($dt->parent_id!=0){
										echo " >".$dt->ptahap." > ".$dt->keterangan."</option>";									
									}else{
										echo " >".$dt->keterangan."</option>";	
									}
								endforeach;
							?>
						</select>
					</div>
				</div>
				
				<div class="control-group">	
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name='keterangan' class="span9" rows="4"><?php echo $keterangan; ?></textarea>
					</div>
				</div>
				
								
				 <div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<label class="checkbox inline"><input type="checkbox" name="ispublish" value="1" <?php if ($ispublish==1) { echo "checked"; } ?>>Aktif</label>
						<label class="checkbox inline"><input type="checkbox" name="isaktif" value="1" <?php if ($isaktif==1) { echo "checked"; } ?>>Publish</label><br><br>
						<input type="hidden" name="hidId" value="<?php echo $id;?>">
						<input type="submit" name="b_kelompok" value="Submit" class="btn btn-primary">
					</div>
				</div>				
			</form>
		</div>
	</div>
</div>
<?php
$this->foot();

?>