<?php
$this->head();

if($posts!=""){
	$header		= "Edit Manufacture ";
	
	foreach ($posts as $dt):
		$keterangan	= $dt->manufacture_by;
		$id			= $dt->manufacture_id;
	endforeach;
	
	$frmact 	= $this->location('module/barang/manufacture/save');		
	
}else{
	$header		= "Write Manufacture ";
	$id			= "";
	$bobot		= "";
	$parentid  	= "";
	$keterangan	= "";
	$urut		= "";
	$isaktif	= 0;
	
	$frmact 	= $this->location('module/barang/manufacture/save');		
}


?>

<div class="container-fluid">  
	
	<legend>
		<a href="<?php echo $this->location('module/barang/manufacture'); ?>" class="btn btn-info pull-right"><i class="icon-list"></i> Manufacture  List</a> 
		<?php if($posts !=""){	?>
		<a href="<?php echo $this->location('module/barang/manufacture/write'); ?>" class="btn pull-right" style="margin:0px 5px"><i class="icon-pencil"></i> Write Manufacture </a>
		<?php } ?>
		<?php echo $header; ?>
    </legend> 
    <div class="row-fluid">    
        <div class="span12">
		
			<form method=post  action="<?php echo $this->location('module/barang/manufacture/save'); ?>" class="form-horizontal">				
				 <div class="control-group">	
					<label class="control-label">Manufacture By</label>
					<div class="controls">
						<textarea name='manufacture' class="span9" rows="4"><?php echo $keterangan; ?></textarea>
					</div>
				</div>
				
				 <div class="control-group">
					
					<div class="controls">						
						<input type="hidden" name="hidId" value="<?php echo $id;?>">
						<input type="submit" name="b_manufacture" value="Submit" class="btn btn-primary">
					</div>
				</div>				
			</form>
		</div>
	</div>
</div>
<?php
$this->foot();

?>