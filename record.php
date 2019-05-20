<?php
	class record implements data_item{
		private $name,$id,$user_id;
		public function __construct($row){
			$this->name = $row['name'];
			$this->id = $row['id'];
			$this->user_id = $row['user_id'];
		}
		public function getValue($db){
			$s = "";
			$data_item_arr = Array();
			foreach($db->record_get_dataset($this->id) as $datum_id => $v ){
				$data_item_arr[] = (new datum($db->datum_get($datum_id)))->getValue($db);
			}
			return implode($data_item_arr,", ");
		}
		public function getName($db){
			return $this->name;
		}
	}
?>
