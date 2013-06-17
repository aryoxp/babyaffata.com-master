
<?php
foreach($dimensi as $dt):
?>		 			
 <div class="control-group">	
	<label class="control-label"><?php echo ucWords($dt->value); ?></label>
	<div class="controls">
		<input type="text" name='dimensi[]' class="span3">		
		<input type=hidden 	name="hidDimensi[]" value="<?php echo $dt->value; ?>">	
		<input type="text" name='satuan[]' placeholder='Satuan..' class="span3">
	</div>
</div>
<?php
endforeach;
?>

		
				