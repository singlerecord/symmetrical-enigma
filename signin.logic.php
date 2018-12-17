<?php
	function login_user($userid,$username){
		if(!isset($_SESSION)){
			session_start();
		}	
		$_SESSION["loggedin"] = TRUE;
		$_SESSION["userid"] = $userid;
		$_SESSION["username"] = $username;	
		echo msg_num("user",1); 
	}
	function logout(){
		if(!isset($_SESSION)){
			session_start();
		}	
		$_SESSION["loggedin"] = NULL;
		$_SESSION["username"] = NULL;
		$_SESSION["userid"] = NULL;
		echo msg_num("user",2);
	}
	$db = new singlerecord_sql();
	if(isset($_POST["register"])){
		$user = $_POST["user"];
		$username = $user["username"];
		$hashed_password = sha1($user["password"]);
	        if(!$db->user_exists($username)){
	                if($db->user_create($username,$hashed_password)){
	                        echo msg_num("user",0);
	                }else{
	                        echo err_num("user",1);
	                }   
	        }else{
	                echo err_num("user",0);
	        }   
	}   
	if(isset($_POST["login"])){
		$user = $_POST["user"];
		$username = $user["username"];
		$hashed_password = sha1($user["password"]);
	        if($db->user_exists($username)){
	                if(($user_array = $db->user_password_matches($username,$hashed_password))){
				login_user($user_array["id"],$user_array["username"]);
	                }else{
				echo err_num("user",2);
			}    
	        }else{
	                echo err_num("user",2); 
	        }    
	}
	if(isset($_POST["logout"])){
		logout();
	}   
		
	if(!isset($_SESSION)){
		session_start();
	}	
	if(isset($_SESSION["loggedin"])){
		include "loggedin.nav.php";	
	}else{
		include "login.form.php";
	}
?>	
