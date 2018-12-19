<?php
	if(!isset($_SESSION)){
		session_start();
	}
	function toolbox(){
		return "php_toolbox/toolbox.php";
	}
	function singlerecord(){
		return "singlerecord.php";
	}
	function feedback(){
		return "feedback.php";
	}
	function restricted(){
		return "restricted.php";
	}
	function datum_group_actions(){
		return "datum.group.actions.php";
	}
	function datum_create(){
                //return "datum.new.php";
		return "profile.php";
        }   
        function datum_edit(){
                return "datum.edit.php";
	}  
	function datum_destroy(){
		//return "datum.delete.php";
		return "profile.php";
	}
?>
