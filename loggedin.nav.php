<?php
?>
<a href="<?php echo home();?>">Home</a>
<div class="section" id="user_nav">
	<a href="<?php echo profile();?>">Profile</a>
	
	<table class="info">
		<tr><td>username: <?php echo $_SESSION["username"];?></td></tr>
		<tr><td>id: <?php echo $_SESSION["userid"];?></td></tr>
	</table>
	<form action="index.php" method="POST">
		<input type="submit" value="Log Out" id="logout" name="logout"/>
	</form>
</div>
