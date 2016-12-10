<?php
	include_once 'header.php';
    if (!isset($_SESSION)) {
        session_start();
    }
if(isset($_SESSION['logedin']) &&  strpos($_SESSION['logedin'], 'professor') !== false) {
  ?>

    <a href="allGrades.php">See all grades</a>
    <br>
    <a href="allExams.php">See all exams</a>

<?php }
if(isset($_SESSION['logedin']) && strpos($_SESSION['logedin'], 'student') !== false) { ?>

    <a href="allStudentGrades.php">See all grades</a>
<?php } if(!isset($_SESSION['logedin'])  ||  (strpos($_SESSION['logedin'], 'professor') === false && strpos($_SESSION['logedin'], 'student') === false )) { ?>
    <p>You must log in or sign up to access this site</p>
<?php }