<?php
include_once 'examPeriodExamClass.php';

if(!isset($_SESSION))
{
    session_start();
}

if(isset($_POST['exam']) && isset($_POST['examPeriod']) && isset($_POST['date'])){
    if(isset($_SESSION['logedin'])){
        $pieces = explode("|", $_SESSION['logedin']);
//        $professorId = $pieces[1];
            $examPeriod = new ExamPeriodExam($_POST['examPeriod'], $_POST['exam'], $_POST['date']);
            $success = $examPeriod->insertInDb();

        if($success == 1) {
            $_SESSION['addExamsForPeriod'] = "You have successfully added a new exam";
            header("Location: addExamsForPeriod.php ");
        } else {
//	        $_SESSION['addGrade'] = "Something went wrong, please try again";
            $_SESSION['addExamsForPeriod'] = $success;
            header("Location: addExamsForPeriod.php ");
        }

    } else {
        echo "djes poso";
    }

}