<?php

include_once 'header.php';
include_once 'gradeClass.php';
include_once 'examClass.php';

if (!isset($_SESSION)) {
    session_start();
}
?>

<div class="container">

    <div style="display: inline">
        <span><h3>SORT TABLE BY GRADES</h3></span>
        <h3><a href="allGrades.php?sort=asc">ascending</a></h3>
        <h3><a href="allGrades.php?sort=desc">descending</a></h3>
        <span><h3>Filter table by exam</h3></span>
        <?php
        $exams = Exam::getAllExmas();
        echo '  <select name="exam" class="form-control" id="myselect">';
        foreach ($exams as $exam) {
            ?>
            <option value="<?php echo $exam->name ?>"> <?php echo $exam->name ?> </option>
        <?php } ?>
        </select>
        <button onclick="filterExams()">Filter</button>
        <button onclick="removeInlineStyle()">Remove filter</button>
        <br>
        <br>
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
            <tr class="myClass">

                <td class="exam"><?php echo $grade->examId?></td>
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
</div>
<script>
    function removeInlineStyle() {
        $("tr.myClass").each(function(i , b) {
            b.style.display = "";
        });
    }

    function filterExams() {
        name =  $( "#myselect" ).val();
        filterExamsByName(name);
    }

    function filterExamsByName(examName) {
        removeInlineStyle();
        $("tr.myClass").each(function(i , b) {
            $this = $(this);
            a = $this.find("td.exam");
            var value = a.html();
            if(value != examName) {
                b.style.display = "none";

            }
        });


    }
</script>
</body>
</html>


