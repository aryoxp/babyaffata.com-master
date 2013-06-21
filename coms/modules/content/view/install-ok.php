<?php $this->head(); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8">
		<h4>Great! Module Installation Succeded</h4>
		<p>Congratulations! You have installed custom content database. This module is now ready to use. You may start <a href="<?php echo $this->location('module/content/home/write'); ?>">creating your first content</a> or <a href="<?php echo $this->location('module/content'); ?>">show currently available contents</a>.</p>
		
		<a href="<?php echo $this->location('module/content/home/write'); ?>" class="btn btn-info">Create Content</a>
		or <a class="btn" href="<?php echo $this->location('module/content'); ?>">List Contents</a>
		</div>
	</div>
</div>
<?php $this->foot(); ?>