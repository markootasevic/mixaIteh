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
            include_once 'conn.php';
            // global $mysqli;
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
	}

 ?>