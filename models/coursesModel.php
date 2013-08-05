<?php	class coursesModel extends db{				// Get All Courses		public function getCourses($uid=''){									$sql = "SELECT * 				    FROM courses				    WHERE user_id = :uid";				    			$st = $this->dbcon->prepare($sql);			$st -> execute(array(":uid"=>$uid));						$r = $st->fetchAll();						return $r;		}								// Get Single Courses		public function getCourse($course_id){				$sql = "SELECT * 				    FROM courses				    WHERE course_id = :cid";				    			$st = $this->dbcon->prepare($sql);			$st -> execute(array(":cid"=>$course_id));						$r = $st->fetchAll();						return $r;		}						// Get Assignments		public function getAssignments($course_id){				$sql = "SELECT * 				    FROM assignments				    WHERE course_id = :cid";				    			$st = $this->dbcon->prepare($sql);			$st -> execute(array(":cid"=>$course_id));						$r = $st->fetchAll();						return $r;		}						// Add New Course		public function addCourse($user_id='', $c_name='', $start_date='', $end_date='', $assignments=array()){				$c_id = uniqid(); // Creating a unique ID for each course being added					// Inserting a new COURSE into database			$c_sql = "INSERT INTO courses(user_id, course_id, course_name, start_date, end_date)					VALUES(:user_is, :c_id, :name, :start, :end)";						$ct = $this->dbcon->prepare($c_sql);			$ct -> execute(array(":user_is"=>$user_id,								 ":c_id"=>$c_id,								 ":name"=>$c_name,								 ":start"=>$start_date,								 ":end"=>$end_date));								 			// Adding Professionalism to database			$pa_id = uniqid();			$p_name = "Professionalism";			$p_weight = 10;						$p_sql = "INSERT INTO assignments(assignment_id, course_id, assignment_name, weight)					  VALUES(:pa_id, :c_id, :a_name, :weight)";						$pt = $this->dbcon->prepare($p_sql);			$pt->execute(array(":pa_id"=>$pa_id,							   ":c_id"=>$c_id,							   ":a_name"=>$p_name,							   ":weight"=>$p_weight));			//Inserting all new assignments into database			foreach($assignments as $field => $value){				$a_id = uniqid();				$a_name = $value[0];				$weight = $value[1];				$a_sql = "INSERT INTO assignments(assignment_id, course_id, assignment_name, weight)					  VALUES(:a_id, :c_id, :name, :weight)";									$at = $this->dbcon->prepare($a_sql);								$at->execute(array(":a_id"=>$a_id,								   ":c_id"=>$c_id,								   ":name"=>$a_name,								   ":weight"=>$weight));			}		}								// Delete Course		public function deleteCourse($course_id=''){			$sql = "DELETE FROM courses					WHERE course_id = :cid";								$st = $this->dbcon->prepare($sql);			$st -> execute(array(":cid"=>$course_id));		}				// Delete Assignments		public function deleteAssignments($course_id=''){			$sql = "DELETE FROM assignments					WHERE course_id = :cid";								$st = $this->dbcon->prepare($sql);			$st -> execute(array(":cid"=>$course_id));		}				// Delete Students		public function deleteStudents($course_id=''){			$sql = "DELETE FROM students					WHERE course_id = :cid";								$st = $this->dbcon->prepare($sql);			$st -> execute(array(":cid"=>$course_id));		}				// Delete Grades		public function deleteGrades($course_id=''){			$sql = "DELETE FROM grades					WHERE course_id = :cid";								$st = $this->dbcon->prepare($sql);			$st -> execute(array(":cid"=>$course_id));		}						// Edit Course		public function editCourse($user_id='', $cid='', $c_name='', $start_date='', $end_date='', $assignments=array()){			// Editing courses in database			$sql = "UPDATE courses					SET user_id = :user_id, course_id = :cid, course_name = :name, start_date = :start, end_date = :end					WHERE course_id = :cid";						$ct = $this->dbcon->prepare($sql);			$ct -> execute(array(":user_id"=>$user_id,								 ":cid"=>$cid,								 ":name"=>$c_name,								 ":start"=>$start_date,								 ":end"=>$end_date));						//Editing assignments in database			foreach($assignments as $field => $value){				$a_id = array_keys($value[0]);								$a_name = array_values($value[0]);				$weight = $value[1];								$a_sql = "UPDATE assignments					  	  SET assignment_name = :name, weight = :weight					  	  WHERE assignment_id = :aid and course_id = :c_id";									$at = $this->dbcon->prepare($a_sql);								$at -> execute(array(":aid"=>$a_id[0],								     ":c_id"=>$cid,								     ":name"=>$a_name[0],								     ":weight"=>$weight));			}		}					} // End of coursesModel?>