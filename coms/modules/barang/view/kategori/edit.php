<?php
$this->head();

if($posts!=""){
	$header		= "Edit Product Category";
	
	foreach ($posts as $dt):
		$parentid  	= $dt->parent_id;
		$keterangan	= $dt->keterangan;
		$ispublish	= $dt->is_publish;
		$kategoriid	= $dt->kategori_id;
		$id			= $dt->kategori_id;
	endforeach;
	
	$frmact 	= $this->location('module/barang/kategori/save');		
	
}else{
	$header		= "New Product Category";
	$id			= "";
	$parentid  	= "";
	$kategoriid	= "";
	$keterangan	= "";
	$isaktif	= 0;
	$ispublish	= 0;
	
	$frmact 	= $this->location('module/barang/kategori/save');		
}


?>

<div class="container-fluid">  
	
	<legend>
		<a href="<?php echo $this->location('module/barang/kategori'); ?>" class="btn btn-info pull-right"><i class="icon-list"></i> Product Categories</a> 
		<?php if($posts !=""){	?>
		<a href="<?php echo $this->location('module/barang/kategori/write'); ?>" class="btn pull-right" style="margin:0px 5px"><i class="icon-pencil"></i> Write Product Category</a>
		<?php } ?>
		<?php echo $header; ?>
    </legend> 
    <div class="row-fluid">    
        <div class="span12">
		
			<form method=post  action="<?php echo $this->location('module/barang/kategori/save'); ?>" class="form-horizontal">
				
				
				
				 <div class="control-group">	
					<label class="control-label">Parent Category</label>
					<div class="controls">
						<select name="cmbsub">
							<option value="0">Please Select..</option>						
							<?php							
																								
								foreach($kategori as $dt):
									echo "<option value='".$dt->kategori_id."' ";
									if($parentid==$dt->kategori_id){
										echo "selected";
									}
									
									if($dt->parent_id!=0){
										echo " >".$dt->kategori." > ".$dt->keterangan."</option>";									
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
						<label class="checkbox inline"><input type="checkbox" name="ispublish" value="1" <?php if ($ispublish==1) { echo "checked"; } ?>>Publish</label><br />
						<input type="hidden" name="hidId" value="<?php echo $id;?>">
						<input type="submit" name="b_kategori" value="Submit" class="btn btn-primary">
					</div>
				</div>				
			</form>
		</div>
	</div>
</div>
<?php
$this->foot();

?>