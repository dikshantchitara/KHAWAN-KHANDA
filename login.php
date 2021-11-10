<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
    require('db.php');
   // session_start();
    // When form submitted, check and create user session.
    if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: home.html");
        } else {
            echo "<div class='signup-content'>
                  <h3 class='loginhere' >Incorrect Username/password.</h3><br/>
                  <p class='loginhere'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" name="login">
                        <h2 class="form-title">Login</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" placeholder="Username" required="required" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" placeholder="Password" required="required"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-submit" value="Login" name="submit" class="login-button"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Don't have an account ? <a href="registration.php" class="loginhere-link">SignUp</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

    <?php
    }
?>
<section id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h3>KHAWAN KHANDA</h3>
				<p>Copyright © KHAWAN KHANDA Restaurant and Cafe 
                
</body>
</html>