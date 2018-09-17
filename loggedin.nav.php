<?php
?>
<div id="user_nav">
	<form action="index.php" method="POST">
	<span>Logged in as: <?php echo $_SESSION["singlerecord"]["loggedin"];?></span>
		<input type="submit" value="Log Out" id="logout" name="logout"/>
	</form>
</div>
