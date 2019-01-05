<?php
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
		public function user_get_contacts($user_id){
			$query = 'SELECT * FROM user,contact WHERE friender_id = :friender_id OR friended_id = :friended_id;';
			return $this->run_query($query,
				Array(
					':friender_id' => $user_id,
					':friended_id' => $user_id
				),"fetchAll"
			);
			
		}
		public function user_get_keys($user_id){
		        $query = 'SELECT * FROM coin WHERE user_id = :userid;';
                        return $this->run_query($query,Array(':userid' => $user_id),"fetchAll");
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
		public function datum_get($userid,$id){
                        $query = 'SELECT name,value FROM datum WHERE user_id = :userid AND id = :id';
			return $this->run_query($query,
                                Array(
                                        ':userid'=>$userid,
                                        ':id'=> $id
                                ),
				"fetch"   
                        );  
		}
	}
?>
