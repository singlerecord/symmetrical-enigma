<div class="section">
<h2>Requests</h2>
<?php
	$record_id = $_POST["record"]["id"];
	$requests = $db->record_get_requests($record_id);
	if(count($requests) == 0){
		echo "<br/>No requests for this record yet.<br/>";
	}else{
		foreach($requests as $request){
			print_r($request);
		}
	}	
?>
</div>
