<?php
	class datum implements data_item{
		private $name,$value;
		public function __construct($row){
			$this->name = $row['name'];
			$this->value = $row['value'];	
		}
		public function getValue($db){
			return $this->value;
		}
		public function getName($db){
			return $this->name;
		}
	}
?>
