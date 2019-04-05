<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flushd";

// create connection to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
	die("Unable to connect to DB: " . $conn -> connect_error);
}

$numBathrooms = 0;


$countBathrooms = "SELECT ID FROM bathrooms";
$result = $conn->query($countBathrooms);


if ($result -> num_rows > 0) {
    // $numBathrooms = $result->num_rows();
    while($row = $result->fetch_assoc()) {
        extract($row);
        $bathroomIDs[] = $ID;
    }
} else {
    echo 'No results';
}

foreach ($bathroomIDs as $bID) {
    $bID = (int)$bID;

    $reviews = "SELECT rating FROM reviews WHERE bID=$bID";

    $result2 = $conn->query($reviews);

    $ratings = array();

    if ($result2 -> num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            extract($row);
            $ratings[] = $rating;
        }
        $avg = array_sum($ratings)/count($ratings);
        echo $avg . '<br>';

        $insertAvg = "UPDATE bathrooms SET AvgRating=$avg WHERE ID=$bID";
        if ($conn->query($insertAvg) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo 0 . '<br>';
    }
}


$conn->close();
?>
