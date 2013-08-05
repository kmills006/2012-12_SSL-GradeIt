<?php
	class checklogin{
		public function __construct($un,$pass){
			
			if($un == '' || $pass == ''){
				header("location: /gradeApplication/index.php?controller=login&action=loginerror");
				
			}else{
				$password = md5($pass);
			
				$db = new PDO("mysql:hostname=localhost;port=8889;dbname=gradeit1","root", "root");
				$sql = "SELECT * 
						FROM users 
						WHERE username = :un and pass = :pass";
				$st = $db->prepare($sql);
				$st -> execute(array(":un"=>$un, 
								     ":pass"=>$password));
								     
				$val = $st->fetchAll();
				
				if($val){
					$_SESSION["loggedin"] = 1;
					$_SESSION["user_id"] = $val[0]["user_id"];
					header("location: /gradeApplication/index.php?controller=courses");
				}else{
					$_SESSION["loggedin"] = 0;
					header("location: /gradeApplication/index.php?controller=login&action=loginerror");
				}

			}
		}
	}
	
	session_start();
	$check = new checklogin($_POST["uname"],$_POST["pass"]);
?>