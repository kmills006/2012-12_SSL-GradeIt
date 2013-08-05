<?php
	class db{
		public function __construct(){
			$this->dbcon = new PDO("mysql:hostname=localhost;port=8889;dbname=gradeit1", "root", "root");
			$this->dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}
?>