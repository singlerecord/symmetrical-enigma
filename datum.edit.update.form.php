	<div class="section"><h2>Name & Value</h2>
		<form action="" method="post">
                        <label for="datum[name]">Name
                                <input type="text" name="datum[name]" id="datum[name]" value="<?php echo $datum["name"];?>"/></label>
                        <label for="datum[value]">Value
                                <input type="text" name="datum[value]" id="datum[value]" value="<?php echo $datum["value"];?>"/>
                        </label>            
                        <input type="submit" name="update" id="update" value="Update"/>
                        <input type="hidden" name="datum[id]" id="datum[id]" value="<?php echo $datum_id; ?>"/>
		</form>
	</div>
