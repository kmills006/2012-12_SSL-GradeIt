<?php

	class gradesModel extends db{


		public function insertGrade( $cid, $sid, $assignments=array()) {


			foreach($assignments as $a){
				
				$aid = array_keys($a)[0];
				$gv = array_values($a);
				
				var_dump($gv[0]);
				
				/* $sql = "INSERT INTO grades ( student_id, course_id, assignment_id, grade_value )
							VALUES ( :sid, :cid, :aid, :gv )";

				$st = $this -> dbcon -> prepare($sql);

				$st -> execute( array(":sid" => $sid, 
									  ":cid" => $cid, 
									  ":aid" => $aid, 
									  ":gv"  => $gv[0]));*/
			}
			
			/* $sql = "INSERT INTO students ( course_id, student_id, assignment_id, grade_value )
							VALUES ( :cid, :sid, :aid, :gv )";

			$st = $this -> dbcon -> prepare($sql);

			$st -> execute( array( 
											":cid" => $cid, 
											":sid" => $sid, 
											":aid" => $aid, 
											":gv"  => $gv 
										));
			
			$r = $st -> fetchAll();
			
			return $r;*/

		}

		public function getGrade( $cid, $sid, $aid ) {

			$sql = "SELECT * FROM grades
							WHERE course_id = :cid,
										student_id = :sid,
										assignment_id = :aid";
				    
			$st = $this -> dbcon -> prepare($sql);

			$st -> execute( array(
											":id" => $cid,
											":sid" => $sid,
											":sid" => $aid
											));
			
			$r = $st -> fetchAll();
			
			return $r;

		}
		
		public function getGrades( $cid, $sid ){

			$sql = "SELECT * FROM grades
							WHERE course_id = :cid,
										student_id = :sid";
				    
			$st = $this -> dbcon -> prepare($sql);

			$st -> execute( array(
											":cid" => $cid,
											":sid" => $sid 
											));
			
			$r = $st->fetchAll();
			
			return $r;

		}

		public function updateGrade( $cid='', $sid='', $assignments=array()) {
			
			foreach($assignments as $a){
				
				$aid = array_keys($a)[0];
				$gv = array_values($a);
				
				var_dump($gv[0]);
				
				
				$sql = "UPDATE grades
								SET grade_value = :gv
								WHERE course_id = :cid
								and student_id = :sid
								and assignment_id = :aid";
										
				$st = $this -> dbcon -> prepare($sql);

				$st -> execute( array(
											":cid" => $cid,
											":sid" => $sid,
											":aid" => $aid,
											":gv"  => $gv[0]
											));


			
			}
			
			
			/* $sql = "UPDATE grades
							SET grade_value = :gv
							WHERE course_id = :cid
										student_id = :sid
										assignment_id = :aid";
				    
			$st = $this->dbcon->prepare($sql);

			$st -> execute( array(
											":cid" => $cid,
											":sid" => $sid,
											":aid" => $aid,
											":gv"  => $gv
											));
			
			$r = $st->fetchAll();
			
			return $r; */

		}		

		public function deleteGrade( $cid, $sid, $aid ) {

			$sql = "DELETE FROM grades
							WHERE course_id = :cid,
										student_id = :sid,
										assignment_id = :aid";
				    
			$st = $this -> dbcon -> prepare($sql);

			$st -> execute( array(
											":cid" => $cid,
											":sid" => $sid,
											":aid" => $aid
											));
			
			$r = $st->fetchAll();
			
			return $r;

		}
			
	}

?>