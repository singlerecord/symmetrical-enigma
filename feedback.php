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
	function msg_num($context,$action){
		$messages = Array(
			"user" => Array(
				"created" => "User created successfully.",
				"loggedin" => "User logged in successfully.",
				"loggedout" => "User logged out successfully.",
			),
			"datum" => Array(
				"created" => "Datum created successfully.",
				"edited" => "Datum updated successfully.",
				"deleted" => "Datum deleted successfully."
			),
			"record" => Array(
				"created" => "Record created succesfully.",
				"depopulated" => "Record depopulated successfully.",
				"repopulated" => "Record repopulated successfully.",
				"updated" => "Record updated successfully"
			)
		);
		return "<div class='message'>".$messages[$context][$action]."</div>";
	}
?>
