<div class="section">
<h2>data list</h2>
<?php
	include datum_new_form();
?>
<form action="<?php echo datum_group_actions();?>" method="post">
                <input type="submit" id="new_record" value="New Record"/>
</form>
<table class="data">
		<?php
	$data = $db->user_get_data($user_id);
	$records = $db->user_get_records($user_id);
	if(count($data) + count($records) == 0 ){?>
		<tr><td>No data yet.</td></tr>	
	<?php
	}else{
	?>
		<tr><th>Name</th><th>Actions</th></tr>
	<?php
		include "foreach_datum.php";
		include "foreach_record.php";
	}
	?>
</table>
</div>
