
<?php
$ispaktif=1;

for($i=0;$i<count($deskripsi);$i++){

?>		 			
 <div class="control-group">	
	<label class="control-label"><?php echo ucWords($deskripsi[$i]); ?></label>
	<div class="controls">
		<textarea name='deskripsi[]' class="ckeditor" id="keterangan"></textarea>	
		<input type=hidden 	name="hidDesc[]" value="<?php echo $deskripsi[$i]; ?>">
	</div>
</div>
<?php
}
?>
<div class="control-group">
<label class="checkbox inline"><input type="checkbox" name="isppublish" value="1" 
<?php if ($ispaktif==1) { echo "checked"; } ?>>Publish</label>
<label class="checkbox inline"><input type="checkbox" name="ispaktif" value="1" 
<?php if ($ispaktif==1) { echo "checked"; } ?>>Aktif</label>	
</div>	

		
				