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
	$ispublish	= 1;
	$frmact 	= $this->location('module/barang/kategori/save');		
}


?>

<div class="container-fluid">  
	
	<legend>
		<a href="<?php echo $this->location('module/barang/kategori'); ?>" class="btn btn-info pull-right"><i class="icon-list icon-white"></i> Product Categories</a>
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
							<option value="0">Select Parent Category...</option>
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
                        <span class="help-block">Select a parent category of this category if this category is not a main category, otherwise leave it blank.</span>
					</div>
				</div>
				
				<div class="control-group">	
					<label class="control-label">Category Name</label>
					<div class="controls">
						<input type="text" name='keterangan' class="span9" rows="4" value="<?php echo $keterangan; ?>">
                        <span class="help-block">The displayed name of the category.</span>
					</div>
				</div>
				
								
				 <div class="control-group">
					<label class="control-label">Is Category Active?</label>
					<div class="controls">
						<label class="checkbox inline"><input type="checkbox" name="ispublish" value="1" <?php if ($ispublish==1) { echo "checked"; } ?>>Active</label>
                        <span class="help-block"><em>Active categeories will be shown and accessible publicly.</em></span>
                        <br />
						<input type="hidden" name="hidId" value="<?php echo $id;?>">
                        <hr>
						<input type="submit" name="b_kategori" value="Save" class="btn btn-primary">
					</div>
				</div>				
			</form>
		</div>
	</div>
</div>
<?php
$this->foot();

?>