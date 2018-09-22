<?php
	$datumid = $_POST["datum"]["id"];
	$userid = $_SESSION["userid"];
	$datum = $db->datum_get($userid,$datumid);
	
?>
	<form action="" method="post">
		<label for="">
			<input type="text" name="datum[name]" id="datum[name]" value="<?php echo $datum["name"];?>"/>
			<input type="text" name="datum[value]" id="datum[value]" value="<?php echo $datum["value"];?>"/>
			<input type="submit" name="update" id="update" value="Update"/>
		</label>	
	</form>
	

