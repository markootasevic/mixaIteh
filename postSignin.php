<?php
include_once ('conn.php');
include_once ('studentClass.php');
include_once 'professorClass.php';
if(!isset($_SESSION))
{
	session_start();
}
//echo "aaa";
	if(isset($_POST['user']) && isset($_POST['pass'])) {
		$name = $_POST['user'];
//		echo "ccc";
       $success = Student::logIn($_POST['user'], $_POST['pass']);
       if($success != 1) {
       	$success = Professor::logIn($_POST['user'], $_POST['pass']);
       } else {
       		$_SESSION['logedin'] = 'student';
				header( "Location: index.php" );
                die();
       }
//		$sql ="SELECT pass FROM user WHERE  name = '".$name."'";
		if ( $success[0] != '1' && $success[0] != '0' ) {	
			header( "refresh:5 ;url=signin.php" );
            exit();
		}
		// if ( $result->num_rows == 1 ) {
			if ( $success[0] == '1' ) {
				$_SESSION['logedin'] = 'professor|'. substr($success, 1);
				header( "Location: index.php" );
                exit();
			} else {
				$_SESSION['logedin'] = 0;
				header( "Location: signin.php" );
			}
		// }
	}
