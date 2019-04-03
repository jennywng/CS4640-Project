<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'flushd';

$dsn = "mysql:host=$host;dbname=$dbname";

try {
    $db = new PDO($dsn, $username, $password);
    echo "connected";
    /*
    PDO obj
    */
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p>An error occurred while connecting to the database: $error_message </p>";
} catch (Exception $e) {
    $error_message = $e->getMessage();
    echo "<p>Error message: $error_message </p>";
}


?>