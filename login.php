<?php

require_once "php/config.php";

$email = $pwd = '';
$login_err = $email_err = $pwd_err = '';



// if user is logged in redirect to home page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: user-home.html");
    exit;
}

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // Check if username is empty
    if(empty(trim($_POST["l_email"]))) {
        $email_err = "Please enter your username.";
    } else {
        $email = trim($_POST["l_email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["l_pwd"]))) {
        $pwd_err = "Please enter your password.";
    } else {
        $pwd = trim($_POST["l_pwd"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($pwd_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, firstname, lastname, pwd FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1) {                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $db_email, $fname, $lname, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)) {
                        if(password_verify($pwd, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["firstname"] = $fname;
                            $_SESSION["lastname"] = $lname;
                            $_SESSION['pwd'] = $hashed_password;                            
                            
                            // Redirect user to welcome page
                            header("location: user-home.html");
                        } else {
                            // Display an error message if password is not valid
                            $login_err = "Email or password incorrect";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $login_err = "Email or password incorrect";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}


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
        <script>
            function validateEmail() {
                if ($('#l_email').val() == '') {    
                    $('#email-note').text('Please enter your email');
                } else {
                    $('#email-note').text('');
                }
            }

            function validatePwd() {
                if ($('#l_pwd').val() == '') {    
                    $('#pwd-note').text('Please enter your password');
                } else {
                    $('#pwd-note').text('');
                }
            }
        </script>

    </head>

    <body class="login-body">
        <div class="login-page">
            <div class="form">
                <form class="login-form" id="loginform" name="loginform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    
                <input class="email" name="l_email" id="l_email" type="text" onblur="validateEmail()" placeholder="Email" autofocus/>
                    <p style="color:red; font-size:12px" class="register-note" id="email-note"></p>

                    <input type="password" name="l_pwd" id="l_pwd" onblur="validatePwd()" placeholder="Password"/>
                    <p style="color:red; font-size:12px" class="register-note" id="pwd-note"></p>

                    <input type="submit" id="login-btn" value=Login>

                    <p class="message">Not registered? <a href="register.php">Create an Account</a></p>

                    <p style="color:red; font-size:12px" class="register-note"><?php echo $login_err;?></p>
                </form>
            </div>
        </div>    
    </body>
</html>
