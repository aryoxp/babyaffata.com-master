<?php $this->view( 'absen/header.php'); ?>

	<section class="container-fluid">
		<div class="wrap-fluid" id="content">
			<div class="span6">
				<?php
					foreach($absen_pimpinan as $dta){
						if($dta->nama !=""){
							if($dta->foto==""){
								$foto= "no_foto.png";
							} else {
								$foto = $dta->foto;
							}						
						?>
							<div class="media">
								<?php
								if($dta->tgl_absen==date('Y-m-d')){
									if($dta->is_absen=='ada'){
										$strclass = "absen";
										$strisi = "Hadir";
										$class = "";
									} else {
										$class = "gray";
										$strclass = "nabsen";
										$strisi = "Tidak Hadir";
									}
								}else{
									$class = "gray";
									$strclass = "nabsen";
									$strisi = "Tidak Hadir";
								}
								?>
								<div class="pull-left img-rounded <?php echo $class; ?>">
									<img src='http://apps.ptiik.ub.ac.id/assets/uploads/foto/<?php echo $foto;?>' class="img-large" />
								</div>
								<div class="media-body thumbnail">
									<div class="<?php echo $strclass; ?> pull-right"><?php echo $strisi; ?></div>
									<div class="media-heading">
										<?php echo $dta->nama; if($dta->gelar_awal!=""){ echo ", ".$dta->gelar_awal; } if($dta->gelar_akhir!=""){ echo ", ".$dta->gelar_akhir; } ?>
									</div>	
									<div class="jabatan"><?php echo $dta->jabatan; ?></div>											
								</div>
							</div>
						<?php
						}
					}		
				?>
			</div>
			<div class="span6">
				<div id="scroll">
				<?php
					foreach($absen as $dt){
						if($dt->nama !=""){
							if($dt->foto==""){
								$foto= "no_foto.png";
							} else {
								$foto = $dt->foto;
							}						
						?>
							<div class="media">
								<?php
									if($dt->tgl_absen==date('Y-m-d')){
										if($dt->is_absen=='ada'){
											$strclass = "absen";
											$strisi = "Hadir";
											$class = "";
										} else {
											$class = "gray";
											$strclass = "nabsen";
											$strisi = "Tidak Hadir";
										}
									}else{
										$class = "gray";
										$strclass = "nabsen";
										$strisi = "Tidak Hadir";
									}
								?>
								<div class="pull-left img-rounded <?php echo $class; ?>">
									<img src='http://apps.ptiik.ub.ac.id/assets/uploads/foto/<?php echo $foto;?>' class="img-small" />
								</div>
								<div class="media-body mini-thumb">
									<div class="<?php echo $strclass; ?> pull-right"><?php echo $strisi; ?></div>
									<div class="media-heading">
										<?php echo $dt->nama; if($dt->gelar_awal!=""){ echo ", ".$dt->gelar_awal; } if($dt->gelar_akhir!=""){ echo ", ".$dt->gelar_akhir; } ?>
									</div>	
									<div class="jabatan"><?php echo $dt->jabatan; ?></div>											
								</div>
							</div>
						<?php
						}
					}		
				?>
				</div>
				<div id="clearfix"></div>
			</div>
		</div>
	</section>
	
<?php $this->view( 'absen/footer.php'); ?>