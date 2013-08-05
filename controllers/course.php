<?  session_start();  include "models/viewModel.php";  include "models/protector.php";  include "helpers/db.php";  include "models/coursesModel.php";  include "models/studentModel.php";  include "models/validate.php";      $view = new viewModel();  $course = new coursesModel();  $students = new studentModel();  $validate = new validate();  $view->getView('views/header.php');  if (!empty( $_GET["action"])){    if ( $_GET["action"] == "" ) {	    $view->getView("views/course.php");	    	    $c = $course->getCourse();	           } else if ( $_GET["action"] == "addnew" ) {    		    // Add New Student Form	    $view->getView("views/addstudent.php", $_GET["cid"]);	        } else if ( $_GET["action"] == "newaction" ) {	    // Save User Inputs	    $student_id = $_POST["studentID"];	    $f_name = $_POST["firstName"];	    $l_name = $_POST["lastName"];	 	    $a = $course->getAssignments($_GET["cid"]);	    $students->newStudent($_GET["cid"], $student_id, $f_name, $l_name, $a);	    	    // Once new student is added, get course and student list	    $c = $course->getCourse($_GET["cid"]);	    $s = $students->getStudents($_GET["cid"]);	    $view->getView("views/course.php", $c, $s);    } else if ( $_GET["action"] == "delete" ) {	   	$students->deleteStudent($_GET["sid"]);	   		     // Once has been deleted, reload student list	    $c = $course->getCourse($_GET["cid"]);	    $s = $students->getStudents($_GET["cid"]);	    $view->getView("views/course.php", $c, $s);	        } else if ( $_GET["action"] == "edit" ) {    		    $s = $students->getStudent($_GET["sid"]);	    	    $view->getView("views/editStudent.php", $s);	        } else if ( $_GET["action"] == "editaction" ) {	    // Save User Inputs	    $student_id = $_GET["sid"];	    $school_id = $_POST["schoolID"];	    $f_name = $_POST["firstName"];	    $l_name = $_POST["lastName"];	    	    $students->editStudent($student_id, $school_id, $f_name, $l_name);	    	    // Once student has been updated, reload student list	    $c = $course->getCourse($_GET["cid"]);	    $s = $students->getStudents($_GET["cid"]);	    $view->getView("views/course.php", $c, $s);    }    } else{  	$c = $course->getCourse($_GET["cid"]);  	$s = $students->getStudents($_GET["cid"]);		$view->getView("views/course.php", $c, $s);  }	$view->getView("views/footer.php");?>