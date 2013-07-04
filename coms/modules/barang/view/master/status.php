<?php
$available 	= 0;
$rejected	= 0;
$reserved	= 0;
$preorder	= 0;
$min_order	= 0;
$max_order	= 0;
$tglavail	= date("Y-m-d");
?>				 			
 <div class="control-group">	
	<label class="control-label">Available Stock</label>
	<div class="controls">
		<input type="number" name='qty' class="span3" value="<?php echo $available; ?>">						
	</div>
</div>

<div class="control-group">	
	<label class="control-label">Rejected Stock</label>
	<div class="controls">
		<input type="number" name='rejected' class="span3" value="<?php echo $rejected; ?>">						
	</div>
</div>


<div class="control-group">	
	<label class="control-label">Booked Stock</label>
	<div class="controls">
		<input type="number" name='reserved' class="span3" value="<?php echo $reserved; ?>">						
	</div>
</div>

<!--<div class="control-group">	
	<label class="control-label">Minimum Purchased</label>
	<div class="controls">
		<input type="number" name='min_order' class="span3" value="<?php echo $min_order; ?>">						
	</div>
</div>

<div class="control-group">	
	<label class="control-label">Maximum Purchased</label>
	<div class="controls">
		<input type="number" name='max_order' class="span3" value="<?php echo $max_order; ?>">						
	</div>
</div>-->


<div class="control-group">	
	<label class="control-label">Pre Order Stock</label>
	<div class="controls">
		<input type="number" name='preorder' class="span3" value="<?php echo $preorder; ?>">						
	</div>
</div>
<!--
<div class="control-group">	
	<label class="control-label">Available Date</label>
	<div class="controls">
		<input type="date" name='tgl_preorder' class="tgl" value="<?php echo $tglavail; ?>">						
	</div>
</div>-->