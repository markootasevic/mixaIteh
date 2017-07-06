<?php

class ExamPeriod
{

    public $id;
    public $name;
    public $dateFrom;
    public $dateTo;

    function __construct($n, $dFrom, $dTo)
    {
        $this->name = $n;
        $this->dateFrom = $dFrom;
        $this->dateTo = $dTo;
    }


    public function insertInDb()
    {
        require_once('conn.php');
         global $mysqli;

        $query = sprintf('INSERT INTO exam_period (date_from,date_to, name) VALUES ("%s","%s", "%s")', $this->dateFrom, $this->dateTo, $this->name);

        if ($mysqli->query($query)) {
            return 1;

        } else {
//            $mysqli->close();
            return "error";
        }
    }

    public static function getAllExamPeriods()
    {
        if (!isset($mysqli)) {
            include_once 'conn.php';
            global $mysqli;

        } else {
            global $mysqli;
        }
        $sql = "SELECT * FROM exam_period";
        if(!$result = $mysqli->query($sql)) {
            echo "ERROR".$mysqli->errno;
            exit();
        }
        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $examPeriod = new ExamPeriod($row->name, $row->date_from, $row->date_to);
            $examPeriod->id = $row->ID;
            array_push($arrayResult, $examPeriod);
        }
//                $mysqli->close();
//        unset($mysqli);
        return $arrayResult;
    }

    public static function getCurrentExamPeriod()
    {
        if (!isset($mysqli)) {
            include_once 'conn.php';
            global $mysqli;

        } else {
            global $mysqli;
        }
        $now = date('Y-m-d');
        $sql = sprintf('SELECT * FROM exam_period WHERE date_from < "%s" AND date_to > "%s"', $now,$now);
        if(!$result = $mysqli->query($sql)) {
            echo "ERROR".$mysqli->errno;
            exit();
        }
        $row = $result->fetch_object();
        $res = new ExamPeriod($row->name, $row->date_from , $row->date_to);
        $res->id = $row->ID;
//                $mysqli->close();
//        unset($mysqli);
        return $res;


    }


}