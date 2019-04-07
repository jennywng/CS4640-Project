<?php 
function setCookieForReview() {
    // get user id from current session
    echo 'test';
    header('submit-review.php');
}

?>


<!DOCTYPE html>
<html lang="en">

    <head>
            <!-- Jenny Wang jrw3mx and Amber Liu al7bf -->

        <meta charset="utf-8">
    
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- required to handle IE -->
            
            <!-- make browser window responsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/bathroom-profile.css">
        <link rel="stylesheet" href="styles/user-home-style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

        <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
        <!-- <link rel="manifest" href="favicons/site.webmanifest"> -->
        <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#603cba">
        <meta name="theme-color" content="#ffffff">
    </head>


<?php


$bID = (int) $_GET['bID'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flushd";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
	die("Unable to connect to DB: " . $conn -> connect_error);
}


$get_bath_detail = "SELECT bTitle, AvgRating, bLoc, bDesc 
FROM bathrooms B
WHERE ID=$bID";


$result = $conn->query($get_bath_detail);

if ($result -> num_rows > 0) {
    $row = $result->fetch_assoc();
    extract($row);
} else {
    echo 'No results';
}

$get_reviews = "SELECT R.ID, R.title, R.uID, R.rDesc, R.rating, U.firstname, U.lastname, U.profilepic 
FROM bathrooms B
INNER JOIN reviews R ON R.bID = B.ID
INNER JOIN users U ON R.uID = U.ID
WHERE R.bID=$bID";


$result = $conn->query($get_reviews);

if ($result -> num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        extract($row);
        $reviews[] = array('rID'=>$ID,'rTitle'=>$title, 'rDesc'=>$rDesc, 'rating'=>$rating, 'uID'=>$uID,
         'fname'=>$firstname, 'lname'=>$lastname, 'profilepic'=>$profilepic);
    }

} else {
    echo 'No results';
}


$conn->close();

?>




    <body>
        <nav class="navbar sticky-top navbar-expand-lg" id="mainNav">
            <a class="navbar-brand" href="user-home.html">
              <img src="images/FLUSHD_logo.PNG" width="50" height="50" class="d-inline-block align-top" alt="logo">
            </a>
        
                <!-- make a hamburger menu when window is narrow -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars"></i>
                </span>
            </button>
                
                <!-- collapse class available in Bootstrap, hide upon collapse -->
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">   
                <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link" id="profile-link" href="user-profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="bathroom-link" href="bathroom-index.html">Bathrooms</a>
                    </li>   
                    <li class="nav-item">
                      <a class="nav-link" id="reviews-link" href="#">My Reviews</a>
                    </li>         
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>  
        </nav>

        <hr class="my-4">

        <div class="container" id="bathroomInfo">
            <h2 id="bathroom-title"><?php echo $bTitle;?></h2>
            <hr class="my-4">

            <div class="row">
                <div class="col left-col">
                        <span class="fas fa-poo checked" id="poo-rating1"></span>
                        <span id="avg-rating"><?php echo round($AvgRating, 2); ?></span>
                        <p id="bath-address"><?php echo $bLoc;?></p>
                        <p id="bath-desc"><?php echo $bDesc?></p>
                </div>
                <div class="col right-col">
                    <i class="fas fa-times" id="gender-icon"></i><span> Gender Neutral</span><br>
                    <i class="fas fa-times" id="fem-icon"></i><span> Feminine Products Available</span><br>
                    <i class="fas fa-times" id="paper-icon"></i><span> Paper Towel</span><br>
                    <i class="fas fa-times" id="air-icon"></i><span> Air Dryer</span><br>
                    <i class="fas fa-times" id="breast-icon"></i><span> Breast Feeding Area</span><br>
                    <i class="fas fa-times" id="diaper-icon"></i><span> Baby Diaper Change</span><br>
                </div>
            </div>

        
            <br> 
            <div id="bathroomPics" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#bathroomPics" data-slide-to="0" class="active"></li>
                    <li data-target="#bathroomPics" data-slide-to="1"></li>
                    <li data-target="#bathroomPics" data-slide-to="2"></li>
              </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="http://placehold.it/150x150" class="d-block w-100" alt="pic1">
                    </div>
                    <div class="carousel-item">
                        <img src="http://placehold.it/150x150" class="d-block w-100" alt="pic2">
                    </div>
                    <div class="carousel-item">
                        <img src="http://placehold.it/150x150" class="d-block w-100" alt="pic3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#bathroomPics" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#bathroomPics" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <hr class="my-4">
        </div>

        <div class="container" id='reviews'>
            <h3>Reviews</h3>
            
            <div class="review-container">
            <hr class="my-4">

            <?php foreach ($reviews as $review) { ?>
            
            <div class="review">
            <div class="media">
                <img src="<?php if ($review['profilepic'] != null) {echo $review['profilepic'];} else {echo 'images/defaulticon.png';}?>" 
                style="width: 10rem; height: 10rem;" class="align-self-start mr-3 image-fluid" alt="...">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $review['fname'] . ' ' . $review['lname'];?></h5>
                    <span class="fas fa-poo checked"></span><span class="usr-rating"> <?php echo $review['rating'] ?> </span>
                    <p><?php echo $review['rDesc'] ?></p>
                </div>
            </div>
            <hr class="my-4">
            </div>

            <?php } ?> <!-- end for loop  -->
            </div>
        </div> 
    
        <div class="container">
            <!-- <h3>Write a Review</h3> -->
            <button onclick="<?php echo setCookieForReview();?>" class="btn btn-primary" id="reviewFormSubmitBtn">Write a Review</button>   
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="js/submitReview.js"></script>
        <script src="js/carousel.js"></script>

    </body>

    
</html>


