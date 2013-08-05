<?php
	// Send user to application login form, they will not be allowed to see any pages except login if they are not currently logged in
	if(isset($_SESSION["loggedin"])){
		
		if($_SESSION["loggedin"] == 1){
			
		}else{
			header("location: /gradeApplication/index.php?controller=login");
		}
		
	}else{
		header("location: /gradeApplication/index.php?controller=login");
	}
?>