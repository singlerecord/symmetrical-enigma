<?php
	class singlerecord_sql extends sql{
		public function user_get_data($userid){
		        $query = 'SELECT id,name,value FROM datum WHERE user_id = :userid;';
                        return $this->run_query($query,Array(':userid' => $userid),"fetchAll");
		}
		public function user_insert_datum($userid,$name,$value){
                        $query = 'INSERT INTO datum (user_id,name,value) VALUES (:userid,:name,:value);';
			return $this->run_query($query,
				Array(
					':userid'=>$userid,
					':name' => $name,
					':value'=> $value
				)
			);
		}
		public function datum_get_accessors($datumid){
			$query = 'SELECT * FROM access ';
			$query .= 'WHERE access.datum_id = :datumid;'; 
			return $this->run_query($query,
				Array(
					':datumid' => $datumid	
				),
				"fetchAll"
			);
		}
		public function datum_update($userid,$id,$name,$value){
			$query = 'UPDATE datum SET name = :name, value = :value WHERE user_id = :userid AND id = :id;';
			return $this->run_query($query,
				Array(
					":name"=>$name,
					":value"=>$value,
					":userid"=>$userid,
					":id"=>$id
				)
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
