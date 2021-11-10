<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username']) && isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
         // removes backslashes
         $username = stripslashes($_REQUEST['username']);
         //escapes special characters in a string
         $username = mysqli_real_escape_string($con, $username);
         $email    = stripslashes($_REQUEST['email']);
         $email    = mysqli_real_escape_string($con, $email);
         $password = stripslashes($_REQUEST['password']);
         $password = mysqli_real_escape_string($con, $password);
         $create_datetime = date("Y-m-d H:i:s");


        $sql_validate=mysqli_query($con,"SELECT * FROM users where email='$email' or username='$username'");
        
        if(mysqli_num_rows($sql_validate)>0)
        {
            echo "<div class='signup-content'>
                  <h3 class='loginhere'>User Already registered with same username or email</h3><br/>
                  <p class='loginhere'>Click here for <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }else{
            $query    = "INSERT into `users` (username, password, email, create_datetime) VALUES ('$username', '$password', '$email', '$create_datetime')";
            $result   = mysqli_query($con, $query);
            if ($result) {
            echo "<div class='signup-content'>
                    <h3 class='loginhere'>You are registered successfully.</h3><br/>
                    <p class='loginhere'>Click here to <a href='login.php'>Login</a></p>
                    </div>";
            } else {
                echo "<div class='signup-content'>
                <h3 class='loginhere'>User Something Went Wrong</h3><br/>
                <p class='loginhere'>Click here for <a href='registration.php'>registration</a> again.</p>
                </div>";
            }
        }
        
    } else {
?>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" placeholder="Username" required="required" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" placeholder="Email Adress" required="required"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" id="password" name="password" placeholder="Password" required="required"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
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