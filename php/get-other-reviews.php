

<?php

header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flushd";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
	die("Unable to connect to DB: " . $conn -> connect_error);
}



// retrieve data from the request
$postdata = file_get_contents("php://input");

// process data 
// (this example simply extracts the data and restructures them back) 
$request = json_decode($postdata);

$data = [];
foreach ($request as $k => $v)
{
  $data[0][$k] = $v;
}

$get_user = "SELECT id FROM users WHERE first_name=$data[0][0]";
if ($result -> num_rows > 0) {
    $i = 0;

    while($row = $result->fetch_assoc()) {
        extract($row);
        $uID = $ID;

        $get_reviews = "SELECT ID, uID, bID, title, rDesc, rating, imgURL FROM reviews WHERE uid=$uID";
        $reviews = $conn->query($get_reviews);

        if ($reviews -> num_rows > 0) {

            while($row = $reviews->fetch_assoc()) {
                extract($row);
                $export[] = array('rID'=>$ID, 'uID'=>$uID, 'bID'=>$ID, 'title'=>$title, 'rDesc'=>$rDesc, 'rating' => $rating, 'img' => $imgURL);
            }
            $encode_export = array($uID . '_reviews'=>$export);
        } else {
            echo "No users with that name";
        }
        $arr[$i] = $encode_export;
        $i++;
    }
    echo json_encode($arr);

} else {
    echo 'No reviews found';
}




$get_reviews = "SELECT ID, uID, bID, title, rDesc, rating, imgURL FROM reviews WHERE uid=$uID";

$reviews = $conn->query($get_reviews);

if ($reviews -> num_rows > 0) {

    while($row = $reviews->fetch_assoc()) {
        extract($row);
        $export[] = array('rID'=>$ID, 'uID'=>$uID, 'bID'=>$ID, 'title'=>$title, 'rDesc'=>$rDesc, 'rating' => $rating, 'img' => $imgURL);
    }
    $encode_export = array('other_reviews'=>$export);
	echo json_encode($encode_export);

} else {
    echo 'No reviews found';
}


$conn->close();

?>



