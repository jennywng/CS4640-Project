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
                    <input type="password" name ="r_pwd_retype" placeholder="Retype Password"/>
                    <input type="submit" id="register-btn" value=Register>
                    <p class="message">Already Registered? <a href="login.php">Sign In</a></p>
                    <p id="register-note"></p>
                </form>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/login.js"></script>
    
    </body>
</html>

<?php
    require_once "php/config.php";

    $first_name = $last_name = $email = $pwd = $confirm_pwd = '';
    $pwd_err = $confirm_pwd_err = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        if (isset)
    }

?>


