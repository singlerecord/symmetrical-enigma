<?php
	if(!isset($_SESSION)){
		session_start();
	}
	function authenticate(){
		return "signin.logic.php";
	}
	function profile(){
		return "profile.php";
	}
	function home(){
		return "index.php";
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
	function key_create_form(){
		return "key.new.form.php";
	}
	function key_create(){
		return "key.new.php";
	}
	function record_manage(){
		return "record.manage.php";
	}
	function datum_new_form(){
		return "datum.new.form.php";
	}
	function datum_create(){
                //return "datum.new.php";
		return "profile.php";
        }   
        function datum_access(){
                return "datum.access.php";
	}  
        function datum_edit(){
                return "datum.edit.php";
	}  
	function datum_destroy(){
		//return "datum.delete.php";
		return "profile.php";
	}
?>
