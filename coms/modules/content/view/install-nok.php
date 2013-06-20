<?php $this->head(); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8">
		<h3>Module Database Installation Failed</h3>
		<p class="alert alert-error">Sorry! Something wrong has happened and database installation has failed. You may want to try installing the database again.</p>
		<a class="btn" href="<?php echo $this->location('module/content/home/install'); ?>">Try Install Again</a>
		</div>
	</div>
</div>
<?php $this->foot(); ?>