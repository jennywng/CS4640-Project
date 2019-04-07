<?php

$bID;

if (isset($_COOKIE['currentBathroomID'])) {
    // echo $_COOKIE['currentBathroomID'];
    $bID = $_COOKIE['currentBathroomID'];   
}

// $bID = (int) $_GET['bathroomID'];

// $bID = 2;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flushd";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
	die("Unable to connect to DB: " . $conn -> connect_error);
}


$get_bath_detail = "SELECT R.ID, B.bTitle, B.bLoc, B.bDesc, R.title, R.uID, R.rDesc, R.rating 
FROM bathrooms B
INNER JOIN reviews R ON R.bID = B.ID
WHERE R.bID=$bID";


$result = $conn->query($get_bath_detail);

if ($result -> num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        extract($row);

        $export[] = array('rID'=>$ID, 'bTitle'=>$bTitle, 'bLocation'=>$bLoc, 
        'bDesc'=>$bDesc, 'rTitle'=>$title, 'rDesc'=>$rDesc, 'rating'=>$rating, 'uID'=>$uID);

    }

    $encode_export = array('bathroom-detail'=>$export);
	echo json_encode($encode_export);

} else {
    echo 'No results';
}


$conn->close();

?>






