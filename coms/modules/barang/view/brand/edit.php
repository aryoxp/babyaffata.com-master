<?php
$this->head();

if($posts!=""){
	$header		= "Edit brand ";
	
	foreach ($posts as $dt):
		$keterangan	= $dt->keterangan;
		$id			= $dt->brand_id;
	endforeach;
	
	$frmact 	= $this->location('module/barang/brand/save');		
	
}else{
	$header		= "Write brand ";
	$id			= "";
	$bobot		= "";
	$parentid  	= "";
	$keterangan	= "";
	$urut		= "";
	$isaktif	= 0;
	
	$frmact 	= $this->location('module/barang/brand/save');		
}


?>

<div class="container-fluid">  
	
	<legend>
		<a href="<?php echo $this->location('module/barang/brand'); ?>" class="btn btn-info pull-right"><i class="icon-list"></i> Brand  List</a> 
		<?php if($posts !=""){	?>
		<a href="<?php echo $this->location('module/barang/brand/write'); ?>" class="btn pull-right" style="margin:0px 5px"><i class="icon-pencil"></i> Write Brand </a>
		<?php } ?>
		<?php echo $header; ?>
    </legend> 
    <div class="row-fluid">    
        <div class="span12">
		
			<form method=post  action="<?php echo $this->location('module/barang/brand/save'); ?>" class="form-horizontal" enctype='multipart/form-data'>				
				 <div class="control-group">	
					<label class="control-label">Brand</label>
					<div class="controls">
						<textarea name='brand' class="span9" rows="4"><?php echo $keterangan; ?></textarea>
					</div>
				</div>
				
				<div class="control-group">	
					<label class="control-label">Logo</label>
					<div class="controls">
						<input type="file" name="file" id="file">
					</div>
				</div>
				
				 <div class="control-group">					
					<div class="controls">						
						<input type="hidden" name="hidId" value="<?php echo $id;?>">
						<input type="submit" name="b_brand" value="Submit" class="btn btn-primary">
					</div>
				</div>				
			</form>
		</div>
	</div>
</div>
<?php
$this->foot();

?>