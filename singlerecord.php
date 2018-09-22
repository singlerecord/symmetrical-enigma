<?php
	class singlerecord_sql extends sql{
		public function user_create($username,$hashed_password){
			$query = 'INSERT INTO user (username,password) VALUES (:username,:hashed_password);';
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
			$query = 'SELECT * FROM user WHERE username = :username;';
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
			$query = 'SELECT id,username FROM user WHERE username = :username AND hashed_password = :hashed_password;';
			$statement = $this->pdo->prepare($query);
			$result = $statement->execute(Array(':username' => $username,':hashed_password' => $hashed_password));
			if($result){ $fetch = $statement->fetch(); return $fetch;
			}
			return FALSE;
		}
		public function user_get_data($userid){
		        $query = 'SELECT id,name,value FROM datum WHERE user_id = :userid;';
                        $statement = $this->pdo->prepare($query);
                        $result = $statement->execute(Array(':userid' => $userid));
                        if($result){
                                $fetch = $statement->fetchAll();
                                return $fetch;
                        }   
                        return FALSE;	
		}
		public function user_insert_datum($userid,$name,$value){
                        $query = 'INSERT INTO datum (user_id,name,value) VALUES (:userid,:name,:value);';
                        $statement = $this->pdo->prepare($query);
                        $result = $statement->execute(
				Array(
					':userid'=>$userid,
					':name' => $name,
					':value'=> $value
				)
			);
                        if($result){
                                return TRUE;
                        }   
                        return FALSE;
		}
		public function datum_get($userid,$id){
                        $query = 'SELECT name,value FROM datum WHERE user_id = :userid AND id = :id';
                        $statement = $this->pdo->prepare($query);
                        $result = $statement->execute(
                                Array(
                                        ':userid'=>$userid,
                                        ':id'=> $id
                                )   
                        );  
                        if($result){
                                return $statement->fetch();
                        }   
                        return FALSE;	
		}
	}
?>
