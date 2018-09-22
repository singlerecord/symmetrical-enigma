<?php
?>
<div id="user_nav">
	<a href="profile.php">Profile</a>
	<form action="index.php" method="POST">
	<span>Logged in as: <?php echo $_SESSION["username"];?></span>
		<input type="submit" value="Log Out" id="logout" name="logout"/>
	</form>
</div>
