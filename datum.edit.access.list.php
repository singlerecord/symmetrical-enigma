<?php
foreach($db->datum_get_accessors($id) as $accessor){
	if(count($accessors) == 0 ){
		echo "No accessors yet<br/>";
	}else{	
		print_r($accessor);
	}
}
foreach($db->datum_get_access_request($id) as $access_request){
        if(count($access_request) == 0 ){
                echo "No access requests for this datum yet<br/>";
        }else{  
		print_r($access_request);
	}   
}
?>
