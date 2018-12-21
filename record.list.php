<?php
	$records = $db->user_get_records($user_id);
	if(count($records) == 0){
?>
		<p>No records created yet.</p>		
<?php

	}else{
		foreach($records as $record){
?>
<pre>
<?php
			print_r($record);
?>
</pre>
<?php
		}
	}
?>
