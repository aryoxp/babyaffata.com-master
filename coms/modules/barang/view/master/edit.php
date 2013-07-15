<?php
$this->head();

if($posts){
	$header		= "Edit Product";
	
	foreach ($posts as $dt):
		$barangid  	= $dt->barang_id;
		$nama		= $dt->nama_barang;
		$kode		= $dt->kode_barang;
		$brandid	= $dt->brand_id;
		$brand		= $dt->brand;
		$ispublish	= $dt->is_publish;
		$id			= $dt->barang_id;
	endforeach;
	
	$frmact 	= $this->location('module/barang/master/save');		
	
}else{
	$header		= "Add Product";
	$id			= "";
	$ispublish	= 0;
	$kode       = "";
    $nama       = "";
    $brand      = "";
    $brandid      = "";
	$frmact 	= $this->location('module/barang/master/save');		
}


?>

<div class="container-fluid">  	
	<legend>
		<a href="<?php echo $this->location('module/barang/master'); ?>" class="btn btn-info pull-right"><i class="icon-list"></i> Products List</a> 
		<?php if($posts !=""){	?>
		<a href="<?php echo $this->location('module/barang/master/write'); ?>" class="btn pull-right" style="margin:0px 5px"><i class="icon-pencil"></i> New Product</a>
		<?php } ?>
		<?php echo $header; ?>
    </legend> 
    <div class="row-fluid">    
        <div class="span12">
		
			<form method=post  action="<?php echo $this->location('module/barang/master/save'); ?>" class="form-horizontal" enctype='multipart/form-data'>			
				
			<div class="control-group">
					<ul class="nav nav-tabs" id="writeTab">
						<li class="active"><a href="#info">General Info</a></li>
						<li><a href="#deskripsi">Detail Product</a></li>
						<li><a href="#harga">Price</a></li>
						<li><a href="#status">Stock</a></li>						
						<li><a href="#foto">Images</a></li>
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
								<label class="control-label">Brand</label>
								<div class="controls">
									<input type="text" name='brand' class="span9" id="brand" <?php echo $brand; ?>>
									<input type="hidden" name="brandid" id="brandid" <?php echo $brandid; ?>>									
								</div>
							</div>
							
							 <div class="control-group">	
								<label class="control-label">Product Code</label>
								<div class="controls">
									<input type="text" name='kode_barang' class="span6" id="kodebarang" value="<?php echo $kode; ?>">	
									<label class="checkbox"><input type="checkbox" name="chkgenerate" value="1" id="chkgenerate">Generate By System</label>						
								</div>
							</div>
							
							 <div class="control-group">	
								<label class="control-label">Product Name</label>
								<div class="controls">
									<input type="text" name='nama_barang' class="span9" value="<?php echo $nama; ?>">						
								</div>
							</div>
                            
                             <!--<div class="control-group">	
								<label class="control-label">Alias Name</label>
								<div class="controls">
									<input type="text" name='nama_alias' class="span9">						
								</div>
							</div>-->
                            
							<div class="control-group">	
								<label class="control-label">Tags</label>
								<div class="controls">
									<input type='text' name='tags' placeholder='Tag..' class='tagBarang span6'/>
								</div>
							</div>
							
							<div class="control-group">	
								<div class="controls">									
									<label class="checkbox inline"><input type="checkbox" name="ispublish" value="1" 
									<?php if ($ispublish==1) { echo "checked"; } ?>>Publish</label>							
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
						<div class="tab-pane" id="foto">	
							<?php 
							$this->view('master/foto.php', $data);										
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