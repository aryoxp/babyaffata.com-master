<?php $this->head(); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8">
		<h3>Module Content Database Installation</h3>
		<p>This step will guide you through content module database installation process.</p>
		<p class="alert alert-error">By clicking the following button you will install (or re-install) contents table on database. Any existing contents data on contents table will be erased completely.</p>
		<a class="btn btn-large btn-danger" href="<?php echo $this->location('module/content/install/execute'); ?>">Yes, Continue Install</a>
		</div>
	</div>
</div>
<?php $this->foot(); ?>