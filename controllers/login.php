<?php
	//var_dump($_SESSION);
	
	include "models/viewModel.php";
	$view = new viewModel();
	
	// Header
	$view->getView("views/header.php");
	
	if (!empty( $_GET["action"])){
	
	    if ( $_GET["action"] == "loginerror" ) {
	    	$ran = "Please Correct Login Information";
	    	//echo "<p class=\"errors\">Please Correct Login Information</p>";
	    	$view->getView("views/login.php", $ran);
	    }	
	}else{
		$view->getView("views/login.php");	
	}
	
	// Footer
	$view->getView("views/footer.php");
?>