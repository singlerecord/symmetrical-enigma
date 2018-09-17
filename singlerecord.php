<?php
	class singlerecord_sql extends sql{
		public function user_create($username,$hashed_password){
			$query = 'INSERT INTO users (username,password) VALUES (:username,:hashed_password);';
			$statement = $this->pdo->prepare($query);
			$result = $statement->execute(Array(
				':username'=>$username,
				':hashed_password'=>$hashed_password)
			);
			if($result){
				return TRUE;
			}
			return FALSE;
		}
		public function user_exists($username){
			// get list_id from hash
			$query = 'SELECT * FROM users WHERE username = :username;';
			$statement = $this->pdo->prepare($query);
			$result = $statement->execute(Array(':username'=>$username));
			if($result){
			        $fetch = $statement->fetchAll();
				if(count($fetch) == 0){
					return FALSE;
				}else{
					return TRUE;
				}
			}
			return FALSE;
		}
		public function user_password_matches($username,$hashed_password){
			$query = 'SELECT hashed_password FROM users WHERE username = :username;';
			$statement = $this->pdo->prepare($query);
			$result = $statement->execute(Array(':username' => $username));
			if($result){
				$fetch = $statement->fetch();
				if($fetch["hashed_password"] == $hashed_password){
					return TRUE;
				}else{
					return FALSE;
				}
			}
			return FALSE;
		}
	}
?>
