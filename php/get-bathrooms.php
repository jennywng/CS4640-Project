<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flushd";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
	die("Unable to connect to DB: " . $conn -> connect_error);
}



$get_all_bathrooms = "SELECT ID, bTitle, bLoc, bDesc, AvgRating, GenderNeutral, FemProducts, PaperTowel, AirDryer, BreastFeed, Diaper
 from bathrooms";


$result = $conn->query($get_all_bathrooms);

if ($result -> num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        extract($row);

        $AvgRating = round($AvgRating, 2);

        $export[] = array('bID'=>$ID, 'title'=>$bTitle, 'location'=>$bLoc, 
        'description'=>$bDesc, 'avgRating'=>$AvgRating, 
        'genderN'=>$GenderNeutral, 'femP'=>$FemProducts, 'paper'=>$PaperTowel, 'air'=>$AirDryer,
        'breast'=>$BreastFeed, 'diaper'=>$Diaper);
    }

    $encode_export = array('all_bathrooms_data'=>$export);
	echo json_encode($encode_export);

    

} else {
    echo 'No results';
}


$conn->close();

?>



