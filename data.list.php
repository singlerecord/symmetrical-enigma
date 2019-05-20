<div class="section">
<h2>data list</h2>
<?php
	include datum_create_form();
	include record_create_form();
?>
<table>
		<?php
	$data = $db->user_get_data($user_id);
	$records = $db->user_get_records($user_id);
	if(count($data) == 0 ){?>
		<tr><td>No data yet.</td></tr>	
	<?php
	}else{
	?>
		<tr><th>Type</th><th>Name</th><th>Actions</th></tr>
	<?php
		include "foreach_datum.php";
		include "foreach_record.php";
	}
	?>
</table>
</div>
