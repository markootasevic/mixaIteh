<?php
include_once ('header.php');
?>

    <div class="container">
        <?php
        if(!isset($_SESSION))
        {
            session_start();
        }
            if(isset($_SESSION['signup'])) {
                echo '<h2 class="form-signin-heading loginError">'.$_SESSION['signup'].'</h2>';

                unset($_SESSION['signup']);
            }
        ?>
      <form class="form-signin" action="postSignup.php" method="POST">
        <h2 class="form-signin-heading">Please sign up</h2>
        <label for="name" class="sr-only">Name</label>
        <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Your name" required autofocus>

        <label for="pass" class="sr-only">Password</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>

        <label for="inputPassword" class="sr-only">Retype password</label>
        <input type="password" name="passAgain" id="inputPassword" class="form-control" placeholder="Retype password" required>

        <select class="form-control" name="type">
          <option value="student">Student</option>
          <option value="professor">Professor</option>
        </select>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
