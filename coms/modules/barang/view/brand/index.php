<?php $this->head(); ?>
<fieldset>
	<legend><a href="<?php echo $this->location('module/barang/brand/write'); ?>" class="btn btn-primary pull-right">
    <i class="icon-pencil icon-white"></i> New Brand</a> Brand List
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
		$str="<table class='table table-hover' id='example' data-id='module/barang/brand'>
				<thead>
					<tr>						
						<th colspan=2>Brand</th>
						<th>Act</th>
					</tr>
				</thead>
				<tbody>";
		
			$i = 1;
			if($posts > 0){
				foreach ($posts as $dt): 
					$str.=	"<tr id='post-".$dt->brand_id."' data-id='".$dt->brand_id."' valign=top>
								<td width='5%'><img src='".$this->location($dt->logo_thumb)."' class='img-polaroid' width=64 height=64></td>
								 <td>".$dt->keterangan."</td>";
					$str.= "<td style='min-width: 80px;'>            
							<ul class='nav nav-pills' style='margin:0;'>
								<li class='dropdown'>
								  <a class='dropdown-toggle' id='drop4' role='button' data-toggle='dropdown' href='#'>Action <b class='caret'></b></a>
								  <ul id='menu1' class='dropdown-menu' role='menu' aria-labelledby='drop4'>
									<li>
										<a class='btn-edit-post' href=".$this->location('module/barang/brand/edit/'.$dt->id)."><i class='icon-pencil'></i> Edit</a>	
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