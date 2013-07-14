<?php $this->head(); ?>
<fieldset>
	<legend>Detail Information Category of Product</legend>

    <div class="well well-small">
        <a href="<?php echo $this->location('module/barang/setting/write'); ?>" class="btn btn-small btn-primary">
            <i class="icon-plus-sign icon-white"></i> New Detail</a>
    </div>
	
    <?php if(isset($status) and $status) : ?>
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo $statusmsg; ?>
        </div>
    <?php endif;
	
    if( isset($posts) ) :
    ?>
    <table class='table table-hover' id='example' data-id='module/barang/brand'>
        <thead>
            <tr>
                <th>Detail</th>
                <th style="width: 150px">Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $i = 1;
    if($posts > 0){
        foreach ($posts as $dt):
        ?>
            <tr id="post-<?php echo $dt->nama_detail_id; ?>" data-id="<?php echo $dt->nama_detail_id; ?>"
                valign="top">
                <td><?php echo $dt->nama_detail; ?></td>
                <td style="min-width: 80px;">
                    <a class="btn btn-small btn-edit-post"
                       href="<?php echo $this->location('module/barang/setting/edit/'.$dt->id); ?>">
                        Edit</a>
                    <a class='btn btn-small btn-danger btn-delete-post'>
                        <i class='icon-remove'></i> Delete</a>
                </td>
            </tr>
        <?php endforeach;
    }
    ?>
    </tbody></table>
    <?php else: ?>
    <div class="span3" align="center" style="margin-top:20px;">
	    <div class="well">Sorry, no content to show</div>
    </div>
    <?php endif; ?>
    <div class="well well-small">
        <a href="<?php echo $this->location('module/barang/setting/write'); ?>" class="btn btn-small btn-primary">
            <i class="icon-plus-sign icon-white"></i> New Detail</a>
    </div>
</fieldset>
<?php $this->foot(); ?>