<?php

$servername = "localhost";
$username = "root";
$password = "";
// $password = "pwdpwd";
$dbname = "flushd";

// create connection to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
	die("Unable to connect to DB: " . $conn -> connect_error);
}



$get_all_bathrooms = "SELECT ID, title, location, description, AvgRating from bathrooms";


$result = $conn->query($get_all_bathrooms);

if ($result -> num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        extract($row);

        $AvgRating = round($AvgRating, 2);

        $export[] = array('bID'=>$ID, 'title'=>$title, 'location'=>$location, 'description'=>$description, 'avgRating'=>$AvgRating);
    }

    $encode_export = array('all_bathrooms_data'=>$export);
	echo json_encode($encode_export);

    

} else {
    echo 'No results';
}


$conn->close();

?>



