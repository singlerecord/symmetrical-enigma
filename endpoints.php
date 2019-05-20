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
		return "toolbox/php/toolbox.php";
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
	function key_create_result(){
		return "key.new.result.php";
	}
	function key_create_form(){
		return "key.new.form.php";
	}
	function key_create(){
		return "key.new.php";
	}
	function record_manage(){
		return "record.access.php";
	}
	function record_create_form(){
		return "record.new.form.php";
	}
	function datum_create_form(){
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
	function contact_add(){
		return "contact.add.php";
	}
	function non_user_contact_delete(){
		return "non_user_contact.delete.php";	
	}
	function non_user_contact_notifications(){
		return "non_user_contact.notifications.php";	
	}
	function non_user_contact_notifications_set(){
		return "non_user_contact.notifications.set.php";	
	}
	function non_user_contact_notifications_create(){
		return "non_user_contact.notifications.php";
	}

?>
