<?php

header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flushd";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
	die("Unable to connect to DB: " . $conn -> connect_error);
}


// retreive data from the request
$uid = $_GET['uid'];

// process data
// (this example simply extracts the data and restructures them back)
// $request = json_decode($getdata);

// $data = [];
// foreach ($request as $k => $v)
// {
//    $data[0]['get'.$k] = $v;
// }



// $uID = $_SESSION['uid'];

$get_reviews = "SELECT ID, uID, bID, title, rDesc, rating, imgURL FROM reviews WHERE uID=$uid";


$result = $conn->query($get_reviews);

if ($result -> num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        extract($row);

        $export[] = array('rID'=>$ID, 'uID'=>$uID, 'bID'=>$ID, 'title'=>$title, 'rDesc'=>$rDesc, 'rating' => $rating, 'img' => $imgURL);
    }

    $encode_export = array('my_reviews'=>$export);
	echo json_encode($encode_export);

    
} else {
    echo 'No results';
}


$conn->close();

?>



