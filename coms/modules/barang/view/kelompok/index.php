<?php $this->head(); ?>
<fieldset>
	<legend><a href="<?php echo $this->location('module/barang/kelompok/write'); ?>" class="btn btn-primary pull-right">
    <i class="icon-pencil icon-white"></i> New Product Category</a> Product Categories
	</legend>
	
	 <?php
	 
	 if(isset($status) and $status) : ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $statusmsg; ?>
		</div>
	<?php 
	endif; 
	
	 if( isset($posts) ) :	
		$str="<table class='table table-hover' id='example' data-id='module/barang/kelompok'>
				<thead>
					<tr>						
						<th>Product Categories</th>
						<th>Act</th>
					</tr>
				</thead>
				<tbody>";
		
			$i = 1;
			if($posts > 0){
				foreach ($posts as $dt): 
					$str.=	"<tr id='post-".$dt->kelompok_id."' data-id='".$dt->kelompok_id."' valign=top>
								<td>By <b>".$dt->kategori."</b> : ";
					if($dt->ptahap){
						$str.= "<small>".$dt->ptahap." > ".$dt->keterangan."</small><br>";
					}else{
						$str.="<small>".$dt->keterangan."</small><br>";
					}
					
					if($dt->ispublish){
						$str.= "<code>".$dt->ispublish."</code>&nbsp;";
					}
					
					$str.= "<span class='label label-success'>".$dt->isaktif."</span></td>";
					$str.= "<td style='min-width: 80px;'>            
							<ul class='nav nav-pills' style='margin:0;'>
								<li class='dropdown'>
								  <a class='dropdown-toggle' id='drop4' role='button' data-toggle='dropdown' href='#'>Action <b class='caret'></b></a>
								  <ul id='menu1' class='dropdown-menu' role='menu' aria-labelledby='drop4'>
									<li>
										<a class='btn-edit-post' href=".$this->location('module/barang/kelompok/edit/'.$dt->id)."><i class='icon-pencil'></i> Edit</a>	
									</li>
									<li>
										<a class='btn-delete-post'><i class='icon-remove'></i> Delete</a>
									</li>
								  </ul>
								</li>
							</ul>
						</td></tr>";
				 endforeach; 
			 }
		$str.= "</tbody></table>";
		
		echo $str;
	
	 else: 
	 ?>
    <div class="span3" align="center" style="margin-top:20px;">
	    <div class="well">Sorry, no content to show</div>
    </div>
    <?php endif; ?>
</fieldset>
<?php $this->foot(); ?>