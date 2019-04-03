<?php

// $host = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'flushd';

// $dsn = "mysql:host=$host;dbname=$dbname";

// try {
//     $db = new PDO($dsn, $username, $password);
//     // echo "connected";
//     /*
//     PDO obj
//     */
// } catch (PDOException $e) {
//     $error_message = $e->getMessage();
//     echo "<p>An error occurred while connecting to the database: $error_message </p>";
// } catch (Exception $e) {
//     $error_message = $e->getMessage();
//     echo "<p>Error message: $error_message </p>";
// }

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'flushd');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
echo "connected";
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>
