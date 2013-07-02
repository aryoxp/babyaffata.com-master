<?php
$this->head();

if($posts!=""){
	$header		= "Edit Detail Product ";
	
	foreach ($posts as $dt):
		$keterangan	= $dt->keterangan;
		$id			= $dt->nama_detail_id;
	endforeach;
	
	$frmact 	= $this->location('module/barang/setting/save');		
	
}else{
	$header		= "Write Detail Product ";
	$id			= "";
	$keterangan	= "";
	
	$frmact 	= $this->location('module/barang/setting/save');		
}


?>

<div class="container-fluid">  
	
	<legend>
		<a href="<?php echo $this->location('module/barang/setting'); ?>" class="btn btn-info pull-right"><i class="icon-list"></i> Detail Product List</a> 
		<?php if($posts !=""){	?>
		<a href="<?php echo $this->location('module/barang/setting/write'); ?>" class="btn pull-right" style="margin:0px 5px"><i class="icon-pencil"></i> Write Detail Product</a>
		<?php } ?>
		<?php echo $header; ?>
    </legend> 
    <div class="row-fluid">    
        <div class="span12">
		
			<form method=post  action="<?php echo $this->location('module/barang/setting/save'); ?>" class="form-horizontal" enctype='multipart/form-data'>				
				 <div class="control-group">	
					<label class="control-label">Detail Product</label>
					<div class="controls">
						<textarea name='nama_detail' class="span9" rows="4"><?php echo $keterangan; ?></textarea>
					</div>
				</div>
				
				
				 <div class="control-group">					
					<div class="controls">						
						<input type="hidden" name="hidId" value="<?php echo $id;?>">
						<input type="submit" name="b_nama_detail" value="Submit" class="btn btn-primary">
					</div>
				</div>				
			</form>
		</div>
	</div>
</div>
<?php
$this->foot();

?>