	<div class="section">
		<form action=<?php echo datum_destroy();?> method="post">
                        <input type="submit" name="delete" id="delete" value="Delete"/>
                        <input type="hidden" name="datum[id]" id="datum[id]" value="<?php echo $datum_id; ?>"/>
		</form>
	</div>
