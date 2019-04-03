<?php 

require_once "php/config.php";

$first_name = $last_name = $email = $pwd = $confirm_pwd = '';
$err = '';
$pwd_err = '';
$confirm_pwd_err = '';

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Jenny Wang jrw3mx and Amber Liu al7bf -->

        <meta charset="utf-8">
    
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- required to handle IE -->
            
        <!-- make browser window responsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/login-style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <!-- <link rel="manifest" href="/site.webmanifest"> -->
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#603cba">
        <meta name="theme-color" content="#ffffff">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/login.js"></script>

    </head>

    <body class="login-body">
        <div class="login-page">
            <div class="form">
                <form class="login-form" id="registerform" name="registerform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input class="first" id="fname" name ="first_name" type="text" placeholder="First Name"/>
                    <input class="first" id="lname" name ="last_name" type="text" placeholder="Last Name"/>
                    <input type="text" name ="r_email" placeholder="Email"/>
                    <input type="password" name ="r_pwd" placeholder="Password"/>
                    <input type="password" name ="r_pwd_confirm" placeholder="Retype Password"/>
                    <input type="submit" id="register-btn" value=Register>
                    <p class="message">Already Registered? <a href="login.php">Sign In</a></p>
                    <p id="register-note"><?php echo $err; ?></p>
                </form>
            </div>
        </div>
<!-- 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/login.js"></script> -->
    </body>
</html>

<?php

    session_start();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty(trim($_POST["first_name"]))) {
            $err = "Please enter your first name.";
        } else if (empty(trim($_POST["last_name"]))) {
            $err = "Please enter your last name.";
        }  else if (empty(trim($_POST["r_email"]))) {
            $err = "Please enter your email.";
        } else {
            $first_name = trim($_POST['first_name']);
            $last_name = trim($_POST['last_name']);
            $email = trim($_POST['r_email']);
            $_SESSION['firstname'] = trim($_POST['first_name']);
            $_SESSION['lastname'] = trim($_POST['last_name']);
            $_SESSION['email'] = trim($_POST['r_email']);
        }

        // validate password
        if(empty(trim($_POST["r_pwd"]))) {
            $pwd_err = "Please enter a password.";     
        } else if (strlen(trim($_POST["r_pwd"])) < 6) {
            $pwd_err = "Password must have at least 6 characters.";
        } else{
            $pwd = trim($_POST["r_pwd"]);
        }

        // validate confirm password
        if(empty(trim($_POST["r_pwd_confirm"]))){
            $confirm_pwd_err = "Please confirm password.";     
        } else{
            $confirm_pwd = trim($_POST["r_pwd_confirm"]);
            if(empty($pwd_err) && ($pwd != $confirm_pwd)){
                $confirm_pwd_err = "Password did not match.";
            }
        }

        if (empty($err) && empty($pwd_err) && empty($confirm_pwd_err)) {
            $sql = "INSERT INTO users (firstname, lastname, email, pwd) VALUES (?, ?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssss", $param_fname, $param_lname, $param_email, $param_pwd);
                
                // Set parameters
                $param_fname = $first_name;
                $param_lname = $last_name;
                $param_email = $email;
                $param_pwd = password_hash($pwd, PASSWORD_DEFAULT); // Creates a password hash
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: login.php");
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }
             
            // Close statement
            mysqli_stmt_close($stmt);
        }
        
        // Close connection
        // mysqli_close($link);

    }

?>


