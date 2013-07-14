<?php $this->head();

if($posts!=""){
	$header		= "Edit Brand Name";
	
	foreach ($posts as $dt):
		$keterangan	= $dt->keterangan;
		$id			= $dt->brand_id;
	endforeach;
	
	$frmact 	= $this->location('module/barang/brand/save');		
	
}else{
	$header		= "New Brand Name";
	$id			= "";
	$bobot		= "";
	$parentid  	= "";
	$keterangan	= "";
	$urut		= "";
	$isaktif	= 0;
	
	$frmact 	= $this->location('module/barang/brand/save');		
}


?>
<style type="text/css">
    input[type=file]{
        position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;
    }
</style>
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
					<label class="control-label">Brand Name</label>
					<div class="controls">
						<input type="text" name="brand" class="span9" rows="4" value="<?php echo $keterangan; ?>">
					</div>
				</div>
				
				<div class="control-group">	
					<label class="control-label">Logo</label>
					<div class="controls" style="position: relative">
                        <a href="#" class="btn">
                            Upload Brand Logo
                            <input type="file" name="file" id="file" onchange="$('#upload-file-info').html($(this).val());">
                        </a>
                        <span class='label label-info' id="upload-file-info"></span>
					</div>
				</div>
				
				 <div class="control-group">					
					<div class="controls">						
						<input type="hidden" name="hidId" value="<?php echo $id;?>">
						<input type="submit" name="b_brand" value="Save" class="btn btn-primary">
					</div>
				</div>				
			</form>
		</div>
	</div>
</div>
<?php $this->foot(); ?>