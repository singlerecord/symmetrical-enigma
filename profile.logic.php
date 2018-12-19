<?php
	// account details
	$userid = $_SESSION["userid"];
		// edit
	// add data
?>
	<form action="<?php echo datum_create();?>" method="post">
		<label for="datum[name]">Name 
			<input type="text" name="datum[name]" id="datum[name]" required/>
		</label>	
		<label for="datum[value]">Value 
			<input type="text" name="datum[value]" id="datum[value]" required/>
		</label>	
		<input type="submit" value="New Data" name="new_datum" id="new_datum"/>	
	</form>
<?php
	// user data list
	include "profile.datalist.php";
?>
