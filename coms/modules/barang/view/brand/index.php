<?php $this->head(); ?>
<fieldset>
	<legend>Brands</legend>

    <div class="well well-small">
        <a href="<?php echo $this->location('module/barang/brand/write'); ?>" class="btn btn-mini btn-primary">
            <i class="icon-pencil icon-white"></i> New Brand</a></div>
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
    <table class='table table-hover' id='example' data-id='module/barang/brand'>
        <thead>
            <tr>
                <th>Brand Logo</th>
                <th>Brand Name</th>
                <th style="width: 150px; text-align: center">Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
        $i = 1;
        if($posts > 0){
            foreach ($posts as $dt):
            ?>
        <tr id="post-<?php echo $dt->brand_id; ?>" data-id="<?php echo $dt->brand_id; ?>" valign="top">
            <td><img src="<?php echo $this->location($dt->logo_thumb); ?>"
                     class="img-polaroid"></td>
            <td><?php echo $dt->keterangan; ?></td>
            <td style="text-align: center">
                <a class='btn btn-edit-post btn-small'
                   href="<?php echo $this->location('module/barang/brand/edit/'.$dt->id); ?>">
                    Edit</a>
                <a class='btn btn-delete-post btn-small btn-danger'><i class='icon-white icon-remove'></i> Delete</a>
            </td>
        </tr>
            <?php endforeach;
         }
    ?></tbody>
    </table>
    <?php else: ?>
    <div class="span3" align="center" style="margin-top:20px;">
	    <div class="well">Sorry, no content to show</div>
    </div>
    <?php endif; ?>
    <div class="well well-small">
        <a href="<?php echo $this->location('module/barang/brand/write'); ?>" class="btn btn-mini btn-primary">
            <i class="icon-pencil icon-white"></i> New Brand</a></div>
</fieldset>
<?php $this->foot(); ?>