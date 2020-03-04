<?php
	include "data_item.php";
	include "datum.php";
	include "record.php";
	include "dataset.php";
	include "notification_set.php";
	include "notification_handlers.php";
	function hidden_input($name,$value){
		return "<input type=\"hidden\" id=\"$name\" name=\"$name\" value=\"$value\"/>";	
	}
	function is_phone_number($s){
		// begins with + and all other characters are digits
		return	preg_match('/\+[^\d]/',$s) == 0
			&& 
			strlen($s) == 12;
	}
	function is_email($s){
		return strpos($s,'@') > 0;
	}
	class singlerecord_sql extends sql{
		public function record_rename($record_id,$name){
			$query = 'UPDATE record SET name = :name WHERE id = :id;';
			return $this->run_query($query,
				Array(
					':id'=>$record_id,
					':name'=>$name
				)
			);
		}
		public function record_depopulate($record_id){
			$query = 'DELETE FROM dataset WHERE record_id = :id;';
			return $this->run_query($query,
				Array(
					':id'=>$record_id
				)
			);
		}
		public function record_repopulate($record_id,$datum_array){
			$results = Array();
			foreach($datum_array as $index => $datum){
				$query = 'INSERT INTO dataset (datum_id,record_id) VALUES ';
				$query .= '(:datum_id,:record_id);';
				$result[] = $this->run_query($query,
					Array(
						':datum_id'=>$datum,
						':record_id'=>$record_id
					)
				);
			}
			$yes = TRUE;
			foreach($results as $result){
				$yes = $yes && $result;
			}
			return $yes;
		}
		public function record_get($record_id){
			$query = 'SELECT * FROM record WHERE id = :id;';
			return $this->run_query($query,
				Array(
					':id'=>$record_id
				),
			"fetch");
		}
		public function record_get_dataset($record_id){
			$query = 'SELECT * FROM dataset WHERE record_id = :record_id';
			$result1 = $this->run_query($query,
				Array(
					':record_id'=>$record_id
				),"fetchAll");
			$id_array = Array();
			foreach($result1 as $row){
				$id_array[$row["datum_id"]] = 1;
			}	
			return $id_array;
		}
		public function record_get_requests($record_id){
			$query = 'SELECT * FROM record_request WHERE record_id = :record_id;';
			return $this->run_query($query,
				Array(":record_id"=>$record_id),
				"fetchAll"
			);	
		}
		public function record_create($name, $datum_array,$user_id){
			$query = 'INSERT INTO record (name,user_id) VALUES (:name,:user_id);';
			$result1 = $this->run_query($query,
				Array(
					':name' => $name,
					':user_id' => $user_id
				)
			);
			$query = 'SELECT id FROM record WHERE name = :name;';
			$record_id = $this->run_query($query,
				Array(
					':name' => $name
				),
				"fetch")["id"];
			foreach($datum_array as $index => $datum){
				$query = 'INSERT INTO dataset (datum_id,record_id) VALUES ';
				$query .= '(:datum_id,:record_id);';
				$this->run_query($query,
					Array(
						':datum_id'=>$datum,
						':record_id'=>$record_id
					)
				);
			}
			
		}
		public function user_add_contact($owner_id,$method,$contact_name){
			// 
			if(is_email($method)){
				return $this->non_user_contact_add_email($owner_id,$method,$contact_name);
		 	}elseif(is_phone_number($method)){		
				return $this->non_user_contact_add_phone($owner_id,$method,$contact_name);
			}else{
				// check SingleRecord username exists
			}
		}
		public function non_user_contact_add_email($owner_id,$email,$name){
			$query = "INSERT INTO non_user_contact (method,owner,name) VALUES (:method,:owner,:name);";
			return $this->run_query($query,
				Array(
					":method"=>$email,
					":owner"=>$owner_id,
					":name"=>$name
				)
			);
		}
		public function non_user_contact_add_phone($owner_id,$phone,$name){
			$query = "INSERT INTO non_user_contact (method,owner,name) VALUES (:method,:owner,:name);";
			return $this->run_query($query,
				Array(
					":method"=>$phone,
					":owner"=>$owner_id,
					":name"=>$name
				)
			);
		}
		public function notify($user_id,$datum_record_id,$datum_record_type){
			// obtain notification set for this data
			$user = $this->user_get_by_id($user_id);
			if($datum_record_type == "datum"){
				$data = new datum($this->datum_get($datum_record_id));	
			}
			if($datum_record_type == "record"){
				$data = new record($this->record_get($datum_record_id));
			}
			$notifications = $this->user_datum_record_notifications_get($user_id,$datum_record_id,$datum_record_type);
			$yes = TRUE;
			foreach($notifications as $notification){
				$method = $notification["method"];
				$to = $method;
				$username = $user["username"];
				$dataname = $data->getName($this);
				$datavalue = $data->getValue($this);
				$subject = "$username: I have updated some data and you are on my automatic update list. ";
				$message = "My new $dataname is $datavalue.\r\n";
				$message .= "Brought to you by https://www.singlerecord.org.";
				if(is_email($method)){
					//send email
					//$headers = 'From: no-reply@singlerecord.org';
					//$yes = $yes && mail($to,$subject,$message,$headers);
				}
				elseif(is_phone_number($method)){
					//send sms
					$message = $subject.$message;
					$sms_handler = new sms_handler();
					$yes = $yes && $sms_handler->send_notification($to,$message,Array());
					// save notification details

				}else{
					echo err_num("notification","method");
					return FALSE;	
				}
				
			}
			return $yes;
		}
		public function non_user_contact_delete($contact_id){
                        $query = 'DELETE FROM non_user_contact WHERE id = :contact_id';
			return $this->run_query($query,
				Array(
					':contact_id'=> $contact_id
				)
			);

		}
		public function notification_set_create($owner_id,$contact_id,$notification_set,$contact_type){
			$query = 'INSERT INTO notification_set (owner_id,contact_id,type,datum_record_id,contact_type) VALUE ';
			$query .= '(:owner_id,:contact_id,:type,:datum_record_id,:contact_type)';
			$statement = $this->pdo->prepare($query);
			$results = Array();
			foreach($notification_set as $notification_item){
				$results[] = $statement->execute(Array(
					":owner_id"=>$owner_id,
					":contact_id"=>$contact_id,
					":type"=>$notification_item["type"],
					":datum_record_id"=>$notification_item["datum_record_id"],
					":contact_type"=>$contact_type
					)
				);	
			}
			$yes = TRUE;
			foreach($results as $result){
				$yes = $yes && $result;
			}
			return $yes;
		}
		public function non_user_contact_notification_set_depopulate($owner_id,$contact_id){
			// i forgot why i am "depopulating"
			$query = "DELETE FROM notification_set ";
			$query.= "WHERE owner_id = :owner_id ";
			$query.= "AND contact_id = :contact_id ";
			$query.= "AND contact_type = 'non_user';";
			return $this->run_query($query,
				Array(
					':owner_id'=>$owner_id,
					':contact_id'=>$contact_id
				)
			);
		}
		public function non_user_contact_notification_set_repopulate($owner_id,$contact_id,$datum_record_array){
			// i forgot also why i am "repopulating"
			$results = Array();
			$query = 'INSERT INTO notification_set (owner_id,contact_id,contact_type,type,datum_record_id) VALUES ';
			$query .= "(:owner_id,:contact_id,'non_user',:type,:datum_record_id);";
			$statement = $this->pdo->prepare($query);
			foreach($datum_record_array as $index => $datum){
				$result[] = $statement->execute(
					Array(
						':owner_id'=>$owner_id,
						':contact_id'=>$contact_id,
						':type'=>$datum["type"],
						':datum_record_id'=>$datum["datum_record_id"]
					)
				);
			}
			$yes = TRUE;
			foreach($results as $result){
				$yes = $yes && $result;
			}
			return $yes;
		}
		public function user_datum_record_notifications_get($user_id,$datum_record_id,$datum_record_type){
			$query = "SELECT * FROM notification_set as ns,non_user_contact as nu ";
			$query .= "WHERE ns.owner_id = :owner_id ";
			$query .= "AND ns.type = :type ";
			$query .= "AND ns.datum_record_id = :datum_record_id ";
			$query .= "AND ns.contact_id = nu.id ";
			$query .= "AND ns.contact_type = 'non_user';";
			$non_users =  $this->run_query(
				$query
				,Array(
					":owner_id"=>$user_id
					,":type"=>$datum_record_type
					,":datum_record_id"=>$datum_record_id	
				)
				,"fetchAll"
			);	
			return $non_users;
		}
		public function user_non_user_contact_notification_set_get($owner_id,$contact_id){
			$query = "SELECT * FROM notification_set WHERE owner_id = :owner_id AND contact_id = :contact_id AND contact_type = 'non_user' ;";
			$result1 = $this->run_query($query,
				Array(
					":owner_id"=>$owner_id,
					":contact_id"=>$contact_id
				),
				"fetchAll"
			);
			$id_array = Array();
			$id_array["owner_id"] = $owner_id;
			$id_array["contact_id"] = $contact_id;
			foreach($result1 as $row){
				$id_array["notifications"][$row["type"]][$row["datum_record_id"]] = 1;
			}	
			return $id_array;
		}
		public function user_get_contacts($user_id){
			$query = 'SELECT * FROM user,contact WHERE friender_id = :friender_id OR friended_id = :friended_id;';
			return $this->run_query($query,
				Array(
					':friender_id' => $user_id,
					':friended_id' => $user_id
				),"fetchAll"
			);
			
		}
		public function user_get_single_non_user_contact($owner_id,$non_user_contact_id){
			$query = 'SELECT * FROM non_user_contact '; 
			$query.= 'WHERE owner = :owner ';
			$query.= 'AND id = :id;';
			return $this->run_query($query,
				Array(
					':owner'=>$owner_id,
					':id'=>$non_user_contact_id
				),"fetch"
			);

		}
		public function user_get_non_user_contacts($user_id){
			$query = 'SELECT * FROM non_user_contact WHERE owner = :owner;';
			return $this->run_query($query,
				Array(
					':owner' => $user_id
				),"fetchAll"
			);
			
		}
		public function user_get_keys($user_id){
		        $query = 'SELECT * FROM coin WHERE user_id = :userid;';
                        return $this->run_query($query,Array(':userid' => $user_id),"fetchAll");
		}
		public function user_get_data_records($user_id){
			$data = $this->user_get_data($user_id);
			$data = array_map(function($v){ $v["type"] = "datum";return $v;},$data);
			$records = $this->user_get_records($user_id);
			$records = array_map(function($v){ $v["type"] = "record";return $v;},$records);
			return array_merge($data,$records);
		}
		public function user_get_data($user_id){
		        $query = 'SELECT id,name,value FROM datum WHERE user_id = :userid;';
                        return $this->run_query($query,Array(':userid' => $user_id),"fetchAll");
		}
		public function user_get_records($user_id){
			$query = 'SELECT * from record ';
			$query .= 'WHERE record.user_id = :user_id;';
			return $this->run_query($query,
				Array(
					':user_id'=>$user_id
				),
				"fetchAll"
			);		
		}
		public function datum_delete($datum_id){
                        $query = 'DELETE FROM datum WHERE id = :datum_id';
			return $this->run_query($query,
				Array(
					':datum_id'=> $datum_id
				)
			);
		}
		public function datum_insert($user_id,$name,$value){
                        $query = 'INSERT INTO datum (user_id,name,value) VALUES (:userid,:name,:value);';
			return $this->run_query($query,
				Array(
					':userid'=>$user_id,
					':name' => $name,
					':value'=> $value
				)
			);
		}
		public function datum_update($user_id,$datum_id,$name,$value){
			$query = 'UPDATE datum SET name = :name, value = :value, timestamp = CURRENT_TIMESTAMP() WHERE user_id = :userid AND id = :id;';
			return $this->run_query($query,
				Array(
					":name"=>$name,
					":value"=>$value,
					":userid"=>$user_id,
					":id"=>$datum_id
				)
			);
		}
		public function datum_get_requests($datum_id){
			$query = 'SELECT * FROM datum_request WHERE datum_id = :datum_id;';
			return $this->run_query($query,
				Array(
					":datum_id"=>$datum_id
				),"fetchAll"
			);	
		}
		public function datum_get($id){
                        $query = 'SELECT name,value FROM datum WHERE id = :id';
			return $this->run_query($query,
                                Array(
                                        ':id'=> $id
                                ),
				"fetch"   
                        );  
		}
	}
?>
