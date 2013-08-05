<?php

 	include "models/controllerModel.php";
 	$controller = new controllerModel();
 	
 	if(!empty($_GET["controller"])){

 		if($_GET["controller"] == "login"){

	 		$controller->getFile("controllers/login.php");
	 		
 		}else if($_GET["controller"] == "courses"){

	 		$controller->getFile("controllers/courses.php");
	 		
 		}else if($_GET["controller"] == "course"){

	 		$controller->getFile("controllers/course.php");
	 		
 		}else if($_GET["controller"] == "logout"){

	 		$controller->getFile("controllers/logout.php");
	 		
 		}else if($_GET["controller"] == "register"){

 			$controller->getFile("controllers/register.php");

 		}else if($_GET["controller"] == "grades"){

 			$controller->getFile("controllers/grades.php");

 		}
 	}else{
 		$controller->getFile("controllers/login.php");
 	}
 	
?>