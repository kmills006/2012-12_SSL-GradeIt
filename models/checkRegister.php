<?
	class checkRegister {
		
		public function __construct( $un, $pass ) {

			$password = md5( $pass );

			$db = new PDO("mysql:hostname=localhost;port=8889;dbname=gradeit1","root", "root");

			$sql = "INSERT into users ( username, pass )
							VALUES ( :un, :pass )";

			$st = $db -> prepare( $sql );

			$st -> execute( array( ":un" => $un, ":pass" => $password ));

			$rc = $st -> rowCount();
			
			
			// If adding new user was successful, call database to get the new users information for session
			if($rc == 1){
				$getuser = new PDO("mysql:hostname=localhost;port=8889;dbname=gradeit1","root", "root");
				$gu_sql = "SELECT *
						   FROM users
						   WHERE username = :un";
				$gu_st = $db->prepare($gu_sql);
				$gu_st->execute(array(":un"=>$un));
				$val = $gu_st->fetchAll();
				
				if ( $val ) {

					$_SESSION["loggedin"] = 1;
	
					$_SESSION["user_id"] = $val[0]["user_id"];
	
					header("location: /gradeApplication/index.php?controller=courses");

				} else {
	
					$_SESSION["loggedin"] = 0;
	
					header("location: /gradeApplication/index.php?controller=register");
	
				}

			}else{
				
				
			} // End of If Statement
		}		

	}

	session_start();

	$check = new checkRegister( $_POST["username"], $_POST["password"] );
?>