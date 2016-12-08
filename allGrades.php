<?php

include_once ('header.php');
include ('gradeClass.php');
if (!isset($_SESSION)) {
    session_start();
}
?>

<div class="container">

    <div style="display: inline">
        <span><h3>SORT TABLE BY GRADES</h3></span>
        <h3><a href="allGrades.php?sort=asc">ascending</a></h3>
        <h3><a href="allGrades.php?sort=desc">descending</a></h3>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Exam name</th>
            <th>Student name</th>
            <th>Grade</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_GET['sort'])) {
            $gradeArray = Grade::getAllGrades($_GET['sort']);
        }else {
            $gradeArray = Grade::getAllGrades();
        }
        foreach ($gradeArray as $grade) {
            ?>
            <tr>

                <td><?php echo $grade->examId?></td>
                <td><?php echo $grade->studentId?></td>
                <td><?php echo $grade->grade?></td>
                <td class="minimal_cell">
                    <a href="<?php echo 'deleteGrade.php?id=' .$grade->id?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<!--    <script type="text/javascript">-->
<!--        jQuery(document).ready(function($) {-->
<!--            $(".clickable-row").click(function() {-->
<!--                window.document.location = $(this).data("href");-->
<!--            });-->
<!--        });-->
<!--    </script>-->
</div>

</body>
</html>


