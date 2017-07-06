<?php


class ExamPeriodExam
{
    public $examPeriodId;
    public $examId;
    public $date;

    function __construct($epId, $eId, $d)
    {
        $this->examPeriodId = $epId;
        $this->examId = $eId;
        $this->date = $d;
    }


    public function insertInDb()
    {
        if (!isset($mysqli)) {
            include_once 'conn.php';
        } else {
            global $mysqli;
        }

        $query = sprintf('INSERT INTO exam_period_exam (exam_period_id,exam_id, time) VALUES ("%s","%s", "%s")', $this->examPeriodId, $this->examId, $this->date);

        if ($mysqli->query($query)) {
            return 1;

        } else {
//            $mysqli->close();
//            unset($mysqli);
            return "error";
        }
    }

    
}