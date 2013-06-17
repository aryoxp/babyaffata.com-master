<?php
$this->head();

if($posts!=""){
	$header		= "Edit Product";
	
	foreach ($posts as $dt):
		$parentid  	= $dt->parent_id;
		$keterangan	= $dt->keterangan;
		$isaktif	= $dt->is_aktif;
		$id			= $dt->komponen_id;
	endforeach;
	
	$frmact 	= $this->location('module/barang/master/save');		
	
}else{
	$header		= "Add Product";
	$id			= "";
	$bobot		= "";
	$parentid  	= "";
	$keterangan	= "";
	$urut		= "";
	$isaktif	= 0;
	
	$frmact 	= $this->location('module/barang/master/save');		
}


?>

<div class="container-fluid">  	
	<legend>
		<a href="<?php echo $this->location('module/barang/master'); ?>" class="btn btn-info pull-right"><i class="icon-list"></i> Products List</a> 
		<?php if($posts !=""){	?>
		<a href="<?php echo $this->location('module/barang/master/write'); ?>" class="btn pull-right" style="margin:0px 5px"><i class="icon-pencil"></i> Add Product</a>
		<?php } ?>
		<?php echo $header; ?>
    </legend> 
    <div class="row-fluid">    
        <div class="span12">
		
			<form method=post  action="<?php echo $this->location('module/barang/master/save'); ?>" class="form-horizontal">			
				
			<div class="control-group">
					<ul class="nav nav-tabs" id="writeTab">
						<li class="active"><a href="#info">General Info</a></li>
						<li><a href="#deskripsi">Description</a></li>
						<li><a href="#harga">Pricing</a></li>
						<li><a href="#status">Status</a></li>
						<li><a href="#dimensi">Dimension</a></li>						
						<li><a href="#gmb">Images</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="info">	
							 <div class="control-group">	
								<label class="control-label">Product Categories</label>
								<div class="controls">
									<!--<input type="text" name='kategori' class="span9" id="katbarang">
									<input type="hidden" name="kategoriid" id="katbarang">			-->
									<input type="text" name="kategori" id="dkategori" class="span9">						
								</div>
							</div>
							
							<div class="control-group">	
								<label class="control-label">Manufacture By</label>
								<div class="controls">
									<input type="text" name='manufacture' class="span9" id="manufacture">
									<input type="hidden" name="manufactureid" id="manufacture">									
								</div>
							</div>
							
							 <div class="control-group">	
								<label class="control-label">Product Code</label>
								<div class="controls">
									<input type="text" name='kode_barang' class="span6" id="kodebarang">	
									<label class="checkbox"><input type="checkbox" name="chkgenerate" value="1" id="chkgenerate">Generate By System</label>						
								</div>
							</div>
							
							 <div class="control-group">	
								<label class="control-label">Product Name</label>
								<div class="controls">
									<input type="text" name='nama_barang' class="span9">						
								</div>
							</div>
							<div class="control-group">	
								<label class="control-label">Tags</label>
								<div class="controls">
									<input type='text' name='tags' placeholder='Tag..' class='tagBarang span6'/>
								</div>
							</div>
							
							<div class="control-group">	
								<div class="controls">									
									<label class="checkbox inline"><input type="checkbox" name="ispublish" value="1" 
									<?php if ($isaktif==1) { echo "checked"; } ?>>Publish</label>
									<label class="checkbox inline"><input type="checkbox" name="isaktif" value="1" 
									<?php if ($isaktif==1) { echo "checked"; } ?>>Aktif</label>		
                                    <label class="checkbox inline"><input type="checkbox" name="ispromo" value="1" 
									<?php if ($isaktif==1) { echo "checked"; } ?>>Promo</label>	
                                    <label class="checkbox inline"><input type="checkbox" name="ispreorder" value="1" 
									<?php if ($isaktif==1) { echo "checked"; } ?>>PreOrder</label>		
                                    <label class="checkbox inline"><input type="checkbox" name="isbaru" value="1" 
									<?php if ($isaktif==1) { echo "checked"; } ?>>New Product</label>										
								</div>
							</div>						
						</div>
						<div class="tab-pane" id="deskripsi">
							<?php 
							$this->view('master/deskripsi.php', $data);										
							?>
						</div>
						
						<div class="tab-pane" id="status">
							<?php 
							$this->view('master/status.php', $data);										
							?>
						</div>
						
						<div class="tab-pane" id="harga">
							<?php 
							$this->view('master/harga.php', $data);										
							?>
						</div>
						
						<div class="tab-pane" id="dimensi">	
							<?php 
							$this->view('master/dimensi.php', $data);										
							?>
						</div>
						<div class="tab-pane" id="gmb">	
							<?php 
							//$this->view('master/harga.php', $data);										
							?>
						</div>
					</div>
				</div>
				
				 <div class="control-group">
                    <div class="controls">
                    <input type="hidden" name="hidId" value="<?php echo $id;?>">
                    <input type="submit" name="b_master" value="Submit" class="btn btn-primary">
                    </div>
                </div>	
    
				
			</form>
		</div>
	</div>
</div>
<?php
$this->foot();

?>