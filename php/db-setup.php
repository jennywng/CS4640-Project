<?php
$servername = "localhost";
// default username + password
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE flushd";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error . '<br>';
}

$conn->close();


$dbname = "flushd";
$dbconn = new mysqli($servername, $username, $password);
if ($dbconn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "conencted to flushd db" . '<br>';
}


$createBathroomTable = "CREATE TABLE Bathrooms (
    bID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    address 
)";

$createReviewsTable = "CREATE TABLE REVIEWS (
    rID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    desc VARCHAR(300) NOT NULL,
    rating INT(6) UNSIGNED NOT NULL,
    uID int,
    bID int,
    FOREIGN KEY (uID) REFERENCES Users(uID),
    FOREIGN KEY (bID) REFERENCES Bathrooms(bID),
)";

$createUserTable = "CREATE TABLE Users (
    uID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    pwd VARCHAR(100),
    admin_priv BOOLEAN, 
    reg_date TIMESTAMP, 
)";



?>