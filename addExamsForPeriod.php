<?php

include_once 'header.php';
include_once 'examClass.php';
include_once 'examPeriodClass.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['addExamsForPeriod'])) {
    ?>
    <h2 class="form-signin-heading loginError"><?php echo  $_SESSION['addExamsForPeriod']?></h2>
<?php } unset($_SESSION['addExamsForPeriod']); ?>


<div class="container" xmlns="http://www.w3.org/1999/html">

    <form class="form-signin" action="postAddExamToPeriod.php" method="POST">
        <h2 class="form-signin-heading">Add a new exam for exam period</h2>



        <?php
        $exams = ExamPeriod::getAllExamPeriods();
        global $exams;
        echo '  <select name="examPeriod" class="form-control">';
        foreach ($exams as $exam) {
            ?>

            <option value="<?php echo $exam->id ?>"> <?php echo $exam->name ?> </option>

        <?php } ?>
        </select>


        <?php
        $exams = Exam::getAllExmas();
        global $exams;
        echo '  <select name="exam" class="form-control">';
        foreach ($exams as $exam) {
            ?>
            <option value="<?php echo $exam->id ?>"> <?php echo $exam->name ?> </option>

        <?php } ?>
        </select>

        <br>
        <label for="DateID">Date</label>
        <input type="date" name="date" id="DateID" class="form-control" placeholder="Date" required autofocus>


        <br>

        <button type="submit" class="btn btn-primary">Add exams for exams period</button>

        </form>

</div> <!-- /container -->

    </body>
    </html>
