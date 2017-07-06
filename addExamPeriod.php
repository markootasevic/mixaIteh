<?php

include_once 'header.php';
include_once 'examClass.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['addExamPeriod'])) {
    ?>
    <h2 class="form-signin-heading loginError"><?php echo  $_SESSION['addExamPeriod']?></h2>
<?php } unset($_SESSION['addExamPeriod']); ?>


<div class="container" xmlns="http://www.w3.org/1999/html">

    <form class="form-signin" action="postExamPeriod.php" method="POST">
        <h2 class="form-signin-heading">Add a new exam period</h2>


        <br>

        <label for="inputEmail" class="sr-only">Name</label>
        <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Name" required autofocus>

        <br>

        <label for="inputEmail" class="sr-only">Date from</label>
        <input type="date" name="dateFrom" id="inputEmail" class="form-control" placeholder="Date from" required autofocus>

        <br>

        <label for="inputEmail" class="sr-only">Date to</label>
        <input type="date" name="dateTo" id="inputEmail" class="form-control" placeholder="Date to" required autofocus>

        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Add exam period</button>
    </form>

</div> <!-- /container -->

</body>
</html>

