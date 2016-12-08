<?php 

	class Grade 
	{
		public $professorId;
		public $studentId;
		public $examId;
		// public $date;
		public $grade;
		public $id;
		
		function __construct($pid,$sid,$eid,$g)
		{
			$this->professorId = $pid;
			$this->studentId = $sid;
			$this->examId = $eid;
			// $this->date = $d;
			$this->grade = $g;
		}


		      public function insertInDb()
		    {
		        require_once('conn.php');
		         global $mysqli;

		        $query = sprintf("INSERT INTO grade (professor_id,student_id,exam_id,grade) VALUES (%s, %s, %s, %s)", $this->professorId, $this->studentId, $this->examId, $this->grade);

		        if ($mysqli->query($query)) {
			        return 1;

		        } else {
		//            $mysqli->close();
		            return $mysqli->error;
		        }
		    }

        public static function getAllGrades($sort = "")
        {
            include_once 'conn.php';
            include_once 'studentClass.php';
            include_once 'examClass.php';
            global $mysqli;
            if($sort != "") {
                $sql = sprintf("SELECT * FROM grade ORDER BY grade %s", $sort);
            } else {
                $sql = "SELECT * FROM grade";
            }
            if(!$result = $mysqli->query($sql)) {
                echo "ERROR".$mysqli->errno;
                exit();
            }
            $arrayResult = array();
            while($row = $result->fetch_object()) {
                $studentName = Student::getNameById($row->student_id);
                $examName = Exam::getNameById($row->exam_id);
                $grade = new Grade(1,$studentName,$examName, $row->grade);
                array_push($arrayResult, $grade);
            }
//        $mysqli->close();
            return $arrayResult;
        }
		
	}

