<?

	class studentModel extends db{
		
		
		// Get All Students
		public function getStudents($cid=''){

			$sql = "SELECT *
					FROM students
					WHERE course_id = :cid";

			$st = $this->dbcon->prepare($sql);

			$st -> execute(array(":cid"=>$cid));
			
			$r = $st->fetchAll();

			return $r;
		}
		

		// Create New Student
		public function newStudent($cid='', $school_id='', $fn='', $ln='', $a=array()){
			
			// Giving each student a unique identification since you can edit their student(school) id in case you typed it wrong
			$student_id = uniqid();
		
			
			$sql = "INSERT INTO students(course_id, student_id, school_id, first_name, last_name)
					VALUES(:cid, :sid, :school_id, :fn, :ln)";
			
			$st = $this->dbcon->prepare($sql);
			$st -> execute(array(":cid"=>$cid,
								 ":sid"=>$student_id,
								 ":school_id"=>$school_id,
								 ":fn"=>$fn,
								 ":ln"=>$ln));
								 
			//Inserting all assignments to be graded for this student
			foreach($a as $field => $value){
	
				$a_sql = "INSERT INTO grades(student_id, course_id, assignment_id)
					  VALUES(:sid, :cid, :aid)";	
				
				$at = $this->dbcon->prepare($a_sql);
				
				$at->execute(array(":sid"=>$student_id,
								   ":cid"=>$cid,
								   ":aid"=>$value["assignment_id"]));
			}
		}
		
		
		// Edit Student
		public function editStudent($sid='', $school_id='', $fn='', $ln=''){
			$sql = "UPDATE students 
					SET student_id = :sid, school_id = :school_id, first_name = :fn, last_name = :ln
					WHERE student_id = :sid";
			
			$st = $this->dbcon->prepare($sql);
			$st -> execute(array(":sid"=>$sid,
								 ":school_id"=>$school_id,
								 ":fn"=>$fn,
								 ":ln"=>$ln));
		}

		
		
		// Delete Student
		public function deleteStudent($sid=''){
			$sql = "DELETE FROM students
					WHERE student_id = :sid";
					
			$st = $this->dbcon->prepare($sql);
			$st -> execute(array(":sid"=>$sid));
		}



		// Get ONE Student
		public function getStudent($sid=''){
			$sql = "SELECT *
					FROM students
					WHERE student_id = :sid";
			$st = $this->dbcon->prepare($sql);
			$st -> execute(array(":sid"=>$sid));
			$r = $st->fetchAll();
			
			return $r;
		}
		
	}
?>