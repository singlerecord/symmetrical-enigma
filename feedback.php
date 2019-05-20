<?php
	function err_num($context,$num){
		$errors = Array(
			"user" => Array(
				"duplicate-username" => "Registration failed. Username exists.",
				"unknown" => "Unspecified user creation failure.",
				"incorrect-credentials" => "Login failed. Username or password incorrect."
			),
			"notification"=>Array(
				"failure"=>"Some notifications failed to be generated",
				"method"=>"Error in contact methods."
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
				"updated" => "Record updated successfully.",
				"renamed" => "Record name updated successfully."
			),
			"notification_set" => Array(
				"created" => "Notification Set created successfully.",
				"depopulated" => "Notification Set depopulated successfully.",
				"repopulated" => "Notification Set repopulated successfully.",
				"updated" => "Notification Set updated successfully."
				
			),
			"notification" => Array(
				"success" => "Notification process triggered."
			)
		);
		return "<div class='message'>".$messages[$context][$action]."</div>";
	}
?>
