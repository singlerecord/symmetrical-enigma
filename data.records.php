<?php 
	$data = $db->user_get_data();
	$records = $db->user_get_records();
	$data_records = array_merge($data,$records);
?>
