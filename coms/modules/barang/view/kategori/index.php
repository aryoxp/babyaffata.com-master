<?php $this->head(); ?>
<fieldset>
	<legend>Product Categories
	</legend>
    <?php

    if(isset($status) and $status) : ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo $statusmsg; ?>
    </div>
    <?php
    endif;

    ?>
    <form class="form-search well" action="<?php echo $this->location('module/barang/kategori/index/search'); ?>">
        <div class="input-append">
            <input type="text" name="q" class="span2 search-query">
            <button type="submit" class="btn">Search</button>
        </div>
        <a href="<?php echo $this->location('module/barang/kategori/write'); ?>" class="btn btn-primary pull-right">
            <i class="icon-pencil icon-white"></i> New Category</a>
    </form>
    <?php

    if( isset($posts) ) :
        ?>
        <table class="table table-hover" id="example" data-id="module/barang/kategori">
        <thead>
        <tr>
            <th>Product Categories</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        if($posts > 0){
        foreach ($posts as $dt):
            ?>
            <tr id="post-<?php echo $dt->kategori_id; ?>"
                data-id="<?php echo $dt->kategori_id; ?>"
                valign="top">
                <td>
                <?php
                if($dt->ptahap)
                    echo $dt->ptahap . " &raquo; " . $dt->keterangan;
                else echo $dt->keterangan;

                echo " &nbsp;";

                if($dt->ispublish){
                    echo '<span class="label label-success">Active</span>';
                } else echo '<span class="label label-warning">Inactive</span>';

                    echo "</td>";
                ?>
                <td style="min-width: 80px; max-width:80px;">
                    <a href="<?php echo $this->location('module/barang/kategori/edit/'.$dt->id); ?>" class="btn btn-small">
                        Edit</a>
                    <a class='btn btn-danger btn-small btn-delete-post'><i class='icon-remove icon-white'></i> Delete</a>
                </td>
            </tr>
            <?php
        endforeach;
        }
    ?>
		</tbody></table>
        <div class="well">
        <a href="<?php echo $this->location('module/barang/kategori/write'); ?>" class="btn btn-primary">
            <i class="icon-pencil icon-white"></i> New Category</a>
        </div>
        <?php
	 else:
	 ?>
    <div class="span3" align="center" style="margin-top:20px;">
	    <div class="well">Sorry, no content to show</div>
    </div>
    <?php endif; ?>
</fieldset>
<?php $this->foot(); ?>