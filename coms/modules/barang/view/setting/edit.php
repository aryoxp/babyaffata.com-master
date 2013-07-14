<?php
$this->head();

if($posts!=""){

	$header		= "Edit Information Detail Category of Product ";
	
	foreach ($posts as $dt):
		$nama_detail	= $dt->nama_detail;
		$id			    = $dt->nama_detail_id;
	endforeach;
	
	$frmact 	= $this->location('module/barang/setting/save');		
	
}else{
	$header		    = "Write Detail Product ";
	$id			    = "";
	$nama_detail	= "";

	$frmact 	= $this->location('module/barang/setting/save');		
}


?>

<div class="container-fluid">  
	
	<legend><?php echo $header; ?></legend>

    <div class="well well-small">
        <a href="<?php echo $this->location('module/barang/setting'); ?>"
           class="btn btn-small btn-info">
            <i class="icon-list icon-white"></i> Detail Category List</a>
        <?php if($posts !=""){	?>
        <a href="<?php echo $this->location('module/barang/setting/write'); ?>"
           class="btn btn-small btn-primary">
            <i class="icon-plus-sign icon-white"></i> New Detail Category</a>
        <?php } ?>
    </div>

    <div class="row-fluid">    
        <div class="span12">
		
			<form method=post  action="<?php echo $this->location('module/barang/setting/save'); ?>" class="form-horizontal" enctype='multipart/form-data'>				
				 <div class="control-group">	
					<label class="control-label">Detail Product</label>
					<div class="controls">
						<input type="text" name='nama_detail' class="span9" rows="4" value="<?php echo $nama_detail; ?>">
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

    <div class="well well-small">
        <a href="<?php echo $this->location('module/barang/setting'); ?>"
           class="btn btn-small btn-info">
            <i class="icon-list icon-white"></i> Detail Category List</a>
        <?php if($posts !=""){	?>
            <a href="<?php echo $this->location('module/barang/setting/write'); ?>"
               class="btn btn-small btn-primary">
                <i class="icon-plus-sign icon-white"></i> New Detail Category</a>
        <?php } ?>
    </div>

</div>
<?php
$this->foot();

?>