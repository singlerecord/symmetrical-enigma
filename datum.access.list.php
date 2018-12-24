<div class="section">
<?php
	$datum_id = $_POST["datum"]["id"];
	$requests = $db->datum_get_requests($datum_id);
	if(count($requests) == 0){
		echo "<br/>No requests for this datum yet.<br/>";
	}else{
		foreach($db->datum_get_requests($datum_id) as $request){
			print_r($request);
		}
	}	
?>
</div>
