<?php
    require_once "php/config.php";

    $$email = $pwd = '';
    $login_err = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        if (isset($_POST['email']) && isset($_POST['pwd'])) {
            echo "logged in"
        }
    }

?>