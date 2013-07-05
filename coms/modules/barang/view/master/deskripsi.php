
<?php
foreach ($deskripsi as $dt){
?>		 			
 <div class="control-group">	
	<label class="control-label"><?php echo ucWords($dt->value); ?></label>
	<div class="controls">
		<textarea name='deskripsi[]' class="span9" id="keterangan"></textarea>	
		<input type=hidden 	name="hidDesc[]" value="<?php echo $dt->id; ?>">
	</div>
</div>
<?php
}
?>


		
				