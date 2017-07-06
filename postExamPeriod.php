<?php
include_once 'examPeriodClass.php';
if(!isset($_SESSION))
{
    session_start();
}

if(isset($_POST['name']) && isset($_POST['dateFrom']) && isset($_POST['dateTo'])){
    if(isset($_SESSION['logedin'])){
        $pieces = explode("|", $_SESSION['logedin']);
//        $professorId = $pieces[1];
        $examPeriod = new ExamPeriod($_POST['name'], $_POST['dateFrom'], $_POST['dateTo']);
        $success = $examPeriod->insertInDb();
        if($success == 1) {
            $_SESSION['addExamPeriod'] = "You have successfully added a new exam";
            header("Location: addExamPeriod.php ");
        } else {
//	        $_SESSION['addGrade'] = "Something went wrong, please try again";
            $_SESSION['addExamPeriod'] = $success;
            header("Location: addExamPeriod.php ");
        }
    } else {
        echo "djes poso";
    }

}