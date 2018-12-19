<?php
	class singlerecord_sql extends sql{
		public function user_get_data($user_id){
		        $query = 'SELECT id,name,value FROM datum WHERE user_id = :userid;';
                        return $this->run_query($query,Array(':userid' => $user_id),"fetchAll");
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
			$query = 'UPDATE datum SET name = :name, value = :value WHERE user_id = :userid AND id = :id;';
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
