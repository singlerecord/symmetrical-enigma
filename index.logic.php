<?php
	function login_user($username){
		$_SESSION["singlerecord"]["loggedin"] = $username;	
		echo msg_num("user",1); 
	}
	function logout(){
		$_SESSION["singlerecord"]["loggedin"] = NULL;
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
	                if($db->user_password_matches($username,$hashed_password)){
				login_user($username);
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
	if(isset($_SESSION)){
		if(isset($_SESSION["singlerecord"])){
			if(isset($_SESSION["singlerecord"]["loggedin"])){
				include "loggedin.nav.php";	
			}else{
				include "login.form.php";
			}
		}else{
			include "login.form.php";
		}
	}else{
		include "login.form.php";
	}
?>	
