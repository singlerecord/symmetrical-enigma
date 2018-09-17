<?php
	function err_num($context,$num){
		$errors = Array(
			"user" => Array(
				0 => "Registration failed. Username exists.",
				1 => "Unspecified user creation failure.",
				2 => "Login failed. Username or password incorrect."
			)
		);
		return "<div class='error'>".$errors[$context][$num]."</div>";
	}
	function msg_num($context,$num){
		$messages = Array(
			"user" => Array(
				0 => "User created successfully.",
				1 => "User logged in successfully.",
				2 => "User logged out successfully."
			)
		);
		return "<div class='message'>".$messages[$context][$num]."</div>";
	}
?>
