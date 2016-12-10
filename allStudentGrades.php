<?php

include_once 'header.php';
include_once 'gradeClass.php';

if (!isset($_SESSION)) {
    session_start();
}
?>

<div class="container">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Exam name</th>
            <th>Professor name</th>
            <th>Grade</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_SESSION['logedin'])) {
            $pieces = explode("|", $_SESSION['logedin']);
            $student = $pieces[1];
            $gradeArray = Grade::getAllGradesForStudent($student);
        } else {
            echo "djes poso";
            die();
        }
        foreach ($gradeArray as $grade) {
            ?>
            <tr class="myClass">

                <td class="exam"><?php echo $grade->examId?></td>
                <td><?php echo $grade->professorId?></td>
                <td><?php echo $grade->grade?></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>


