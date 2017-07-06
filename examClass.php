<?php 

	
	class Exam
	{
		public $name;
		public $professorId;
		public $id;

		
		function __construct($n,$pid)
		{
			$this->name = $n;
			$this->professorId = $pid;
		}

		public function insertInDb()
    {
        require_once('conn.php');
        // global $mysqli;

        $query = sprintf('INSERT INTO exam (name,professor_id) VALUES ("%s","%s")', $this->name, $this->professorId);

        if ($mysqli->query($query)) {
	        return 1;

        } else {
//            $mysqli->close();
            return "error";
        }
    }

             public static function getAllExmas()
            {
                if (!isset($mysqli)) {
                    include_once 'conn.php';
                    global $mysqli;
                } else {
                    global $mysqli;
                }


            $sql = "SELECT * FROM exam";
            if(!$result = $mysqli->query($sql)) {
                echo "ERROR".$mysqli->errno;
                exit();
               }
            $arrayResult = array();
            while($row = $result->fetch_object()) {
                $exam = new Exam($row->name, $row->professor_id);
                $exam->id = $row->ID;
                array_push($arrayResult, $exam);
                }
    //        $mysqli->close();
            return $arrayResult;
            }

        public static function getNameById($id)
        {
            include_once 'conn.php';
            global $mysqli;
            $sql = sprintf("SELECT name FROM exam WHERE ID=%s",$id);
            $result = $mysqli->query($sql);
            if(!$result) {
                echo "ERROR".$mysqli->errno;
                exit();
            }
            $ret = $result->fetch_assoc();
            return $ret['name'];
        }


        public static function deleteExam($id)
        {
            include_once ('conn.php');
//        global $mysqli;
            $query = sprintf('DELETE FROM exam WHERE id=%s', $id);
            if(!$result = $mysqli->query($query)) {
                echo "Error deleting exam".$result->error;
                exit();
            } else {
                Grade::deleteGrades($id);
            }

        }

        public static function getOneExam ($id) {
            include_once ('conn.php');
            global $mysqli;
            $query = sprintf('SELECT * FROM exam WHERE id=%s', $id);
            if(!$result = $mysqli->query($query)) {
                echo "Error getting 1 exam".$result->error;
                exit();
            } if($result == null) {
                echo $mysqli->error;
            }
            $exam = $result->fetch_object();
            $res = new Exam($exam->name, $exam->professor_id);
            $res->id = $exam->ID;
            return $res;


        }

        public static function getExamsICanApplyFor($examPeriodId)
        {
            if (!isset($mysqli)) {
                include_once 'conn.php';
                global $mysqli;

            } else {
                global $mysqli;
            }
            $sql = sprintf('SELECT e.name, e.professor_id, e.ID FROM exam e JOIN exam_period_exam ep ON (e.ID = ep.exam_id) WHERE ep.exam_period_id = %s', $examPeriodId);
            if(!$result = $mysqli->query($sql)) {
                echo "ERROR".$mysqli->errno;
                exit();
            }
            $arrayResult = array();
            while($row = $result->fetch_object()) {
                $exam = new Exam($row->name, $row->professor_id);
                $exam->id = $row->ID;
                array_push($arrayResult, $exam);
            }
//                $mysqli->close();
//        unset($mysqli);
            return $arrayResult;
        }


	}

