<div class="section">
<h2>key list</h2>
	<?php include key_create_form(); ?>
<table>
<?php
	$keys = $db->user_get_keys($user_id);
	if(count($keys) == 0){
		?>
	<tr><td>No keys yet.</td></tr>
	<?php
	}else{
	?>
	<tr><th>Name</th><th>Value</th><tr>
	<?php
	foreach($keys as $key){
	?>
		<tr>
			<td><?php echo $key["name"]; ?></td>
			<td><?php echo $key["value"]; ?></td>
		</tr>
	<?php
	}
}
?>
</table>
</div>
