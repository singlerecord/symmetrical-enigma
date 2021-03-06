<?php
	function login_user($userid,$username){
		$_SESSION["loggedin"] = TRUE;
		$_SESSION["userid"] = $userid;
		$_SESSION["username"] = $username;	
		echo msg_num("user","loggedin"); 
	}
	function logout(){
		$_SESSION["loggedin"] = NULL;
		$_SESSION["username"] = NULL;
		$_SESSION["userid"] = NULL;
		echo msg_num("user","loggedout");
	}
	$db = new singlerecord_sql();
	if(isset($_POST["register"])){
		$user = $_POST["user"];
		$username = $user["username"];
		$hashed_password = password_hash($user["password"],PASSWORD_BCRYPT);
	        if(!$db->user_exists($username)){
	                if($db->user_create($username,$hashed_password)){
	                        echo msg_num("user","created");
	                }else{
	                        echo err_num("user","unknown");
	                }   
	        }else{
	                echo err_num("user","duplicate-username");
	        }   
	}   
	if(isset($_POST["login"])){
		$user = $_POST["user"];
		$username = $user["username"];
		$cleartext_password = $user["password"];
	        if($db->user_exists($username)){
			if($db->user_password_matches($username,$cleartext_password)){
				$user_array = $db->user_get($username);
				if(!isset($_SESSION)){
					session_start();
				}
				login_user($user_array["id"],$user_array["username"]);
	                }else{
				echo err_num("user","incorrect-credentials");
			}    
	        }else{
	                echo err_num("user","incorrect-credentials"); 
	        }    
	}
	if(isset($_POST["logout"])){
		logout();
	}   
		
	if(isset($_SESSION["loggedin"])){
		include "loggedin.nav.php";	
	}else{
		include "login.form.php";
	}
?>	
