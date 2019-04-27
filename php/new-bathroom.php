<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

foreach ($request as $k => $v) {
  $data[$k] = $v;
}

// echo json_encode($data);
function returnBool($val) {
    if ($val) {return 1;}
    else {return 0;}
}

$bTit = $data["bathTitle"];
$bDesc = $data['bathDesc'];
$bLoc = $data['bathLoc'];
$gender = returnBool($data['genderCheck']);
$fem = returnBool($data['femCheck']);
$paper = returnBool($data['paperCheck']);
$air = returnBool($data['airCheck']);
$breast = returnBool($data['breastCheck']);
$diaper = returnBool($data['diaperCheck']);

// echo json_encode(gettype($paper));



// echo json_encode(gettype($bTit));

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flushd";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
    die("Unable to connect to DB: " . $conn -> connect_error);
}

$q = "INSERT INTO bathrooms (bTitle, bDesc, bLoc, GenderNeutral, FemProducts, PaperTowel, AirDryer, BreastFeed, Diaper) 
VALUES ('$bTit', '$bDesc', '$bLoc', $gender, $fem, $paper, $air, $breast, $diaper)";

if ($conn->query($q) === TRUE) {
    $message =  "Bathroom submitted.";
} else {
    $message =  "Error updating record: " . $conn->error;
}

echo json_encode($message);


?>

