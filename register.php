<?php 

    require_once "php/config.php";

    $first_name = $last_name = $email = $pwd = $confirm_pwd = '';
    $err = '';
    $pwd_err = '';
    $confirm_pwd_err = '';

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
            $_SESSION['firstname'] = trim($_POST['first_name']);
            $_SESSION['lastname'] = trim($_POST['last_name']);
            
        }


        // validate unique email
        $sql = "SELECT ID FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["r_email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $err = "This email is already associated with an account.";
                } else{
                    $email = trim($_POST["r_email"]);
                    $_SESSION['email'] = trim($_POST['r_email']);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
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
                    $_SESSION['loggedin'] = true;
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

        <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
        <!-- <link rel="manifest" href="favicons/site.webmanifest"> -->
        <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#603cba">
        <meta name="theme-color" content="#ffffff">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/register.js"></script>

    </head>

    <body class="login-body">
        <div class="login-page">
            <div class="form">
                <form class="login-form" id="registerform" name="registerform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <input class="first" id="fname" name ="first_name" type="text" onblur="validateFname()" placeholder="First Name" autofocus/>
                    <p style="color:red; font-size:12px" class="register-note" id="fname-note"></p>

                    <input class="first" id="lname" name ="last_name" type="text" onblur="validateLname()" placeholder="Last Name"/>
                    <p style="color:red; font-size:12px" class="register-note" id="lname-note"></p>

                    <input type="text" id="email" name ="r_email" onblur="validateEmail()" placeholder="Email"/>
                    <p style="color:red; font-size:12px" class="register-note" id="email-note"></p>

                    <input type="password" id="pwd" name ="r_pwd" onblur="validatePwd()" placeholder="Password"/>
                    <p style="color:red; font-size:12px" class="register-note" id="pwd-note"></p>

                    <input type="password" id="pwd_confirm" name ="r_pwd_confirm" onblur="validateConfirmPwd()" placeholder="Retype Password"/>
                    <p style="color:red; font-size:12px" class="register-note" id="pwd-confirm-note"></p>

                    <input type="submit" id="register-btn" value=Register>
                    <p class="message">Already Registered? <a href="login.php">Sign In</a></p>

                    <p style="color:red; font-size:12px" class="register-note"><?php echo $err;?></p>
                </form>
            </div>
        </div>
<!-- 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/login.js"></script> -->
    </body>
</html>



