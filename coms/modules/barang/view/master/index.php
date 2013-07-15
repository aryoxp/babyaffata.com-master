<?php $this->head(); ?>
<fieldset>
	<legend><a href="<?php echo $this->location('module/barang/master/write'); ?>" class="btn btn-primary pull-right">
    <i class="icon-pencil icon-white"></i> New Product</a> Products List
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
        ?>
		<table class="table table-hover" id="example" data-id="module/barang/master">
            <thead>
                <tr>
                    <th>Products</th>
                    <th>Act</th>
                </tr>
            </thead>
				<tbody>
		<?php
			$i = 1;
			if($posts > 0){
				foreach ($posts as $dt):
                ?>
                <tr id="post-<?php echo $dt->barang_id; ?>" data-id="<?php $dt->barang_id; ?>" valign="top">
				<td><?php echo $dt->nama_barang . "&nbsp;";
					if($dt->kode_barang){
						echo '<br><code>'.$dt->kode_barang.'</code>';
					}
					
					if($dt->brand){
						echo '&nbsp;<em>'.$dt->brand."</em>";
					}
					?>
                </td>
                <td style="min-width: 80px;">
                    <ul class='nav nav-pills' style='margin:0;'>
                        <li class='dropdown'>
                          <a class='dropdown-toggle' id='drop4' role='button' data-toggle='dropdown' href='#'>Action <b class='caret'></b></a>
                          <ul id='menu1' class='dropdown-menu' role='menu' aria-labelledby='drop4'>
                            <li>
                                <a class='btn-edit-post' href=".$this->location('module/barang/master/edit/'.$dt->id)."><i class='icon-pencil'></i> Edit</a>
                            </li>
                            <li>
                                <a class='btn-delete-post'><i class='icon-remove'></i> Delete</a>
                            </li>
                          </ul>
                        </li>
                    </ul>
                </td></tr>
                <?php endforeach;
			 }
		?>
                </tbody></table>
		<?php else: ?>
    <div class="span3" align="center" style="margin-top:20px;">
	    <div class="well">Sorry, no content to show</div>
    </div>
    <?php endif; ?>
</fieldset>
<?php $this->foot(); ?>