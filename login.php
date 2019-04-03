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
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#603cba">
        <meta name="theme-color" content="#ffffff">
    </head>

    <body onload="setFocus('name')" class="login-body">
        <div class="login-page">
            <div class="form">
                <form class="register-form">
                    <input class="first" id="name" type="text" placeholder="First Name"/>
                    <input class="first" id="name" type="text" placeholder="Last Name"/>
                    <input type="text" placeholder="Email"/>
                    <input type="password" placeholder="Password"/>
                    <input type="password" placeholder="Retype Password"/>
                    <input type="submit" id="register-btn" value=Register>
                    <p class="message">Already Registered? <a onclick="setFocus('email')" href="#">Sign In</a></p>
                    <p id="register-note"></p>
                </form>

                <form class="login-form" name="loginform" onSubmit="return validateForm();" action="user-home.html" method="post">
                    <input class="first" name="email" id="email" type="text" placeholder="Email"/>
                    <input type="password" name="pword" placeholder="Password"/>
                    <input type="submit" id="login-btn" value=Login>
                    <p class="message">Not registered? <a href="#" onclick="setFocus('name')">Create an Account</a></p>
                    <p id="login-note"></p>
                </form>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/login.js"></script>
        <script src="js/autofocus.js"></script>

    </body>

    
</html>


<?php>
    require_once "php/config.php";

    $usrname = $pwd = $confirm_pwd = '';
<?>
