<?php 
$message = "";

$bathID = (int) $_COOKIE['bID'];
$userID = (int) $_COOKIE['uID'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flushd";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title =  (string) $_POST['review-title'];
    $text =  (string) $_POST['review-text'];
    $rating = (int) $_POST['poo'];

    $insert_review = "INSERT INTO reviews (uID, bID, title, rDesc, rating) VALUES ($userID, $bathID, '$title', '$text', $rating)";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error) {
	    die("Unable to connect to DB: " . $conn -> connect_error);
    }

    if ($conn->query($insert_review) === TRUE) {
        $message = "Review submitted successfully";
        require_once('php/average.php');
    } else {
        $message = "Error: " . $insert_review . "<br>" . $conn->error;
    }

    $conn->close();
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


        <div class="container">
            <h3>Write a Review</h3>
            <div class="container">
                <form action="" method="post">
                    <div class="form-group">
                        <label><i class="fas fa-upload"></i> Upload Bathroom Picture</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="rating form-group" name="rating">
                    <label>
                        <input type="radio" name="poo" value=1 required/>
                        <span class="fas fa-poo icon"></span>
                    </label>
                    <label>
                        <input type="radio" name="poo" value=3 />
                        <span class="fas fa-poo icon"></span>
                        <span class="fas fa-poo icon"></span>
                    </label>
                    <label>
                        <input type="radio" name="poo" value=3 />
                        <span class="fas fa-poo icon"></span>
                        <span class="fas fa-poo icon"></span>
                        <span class="fas fa-poo icon"></span>  
                    </label>
                    <label>
                        <input type="radio" name="poo" value=4 />
                        <span class="fas fa-poo icon"></span>
                        <span class="fas fa-poo icon"></span>
                        <span class="fas fa-poo icon"></span>
                        <span class="fas fa-poo icon"></span>
                    </label>
                    <label>
                        <input type="radio" name="poo" value=5/>
                        <span class="fas fa-poo icon"></span>
                        <span class="fas fa-poo icon"></span>
                        <span class="fas fa-poo icon"></span>
                        <span class="fas fa-poo icon"></span>
                        <span class="fas fa-poo icon"></span>
                    </label>
                    </div>
                    
                    <div class="form-group">
                        <textarea name="review-title" class="form-control" id="review-title" rows="1" placeholder="Title" required></textarea>
                    </div>
                    <div class="form-group">
                        <textarea name="review-text" class="form-control" id="review-text" rows="5" placeholder="Review" required></textarea>
                    </div>

                    <input type="submit" id="reviewFormSubmitBtn" class="btn btn-primary" value="Submit">
                </form>


                <p> <?php echo $message ?> </p>
                <!-- <button class="btn btn-primary" id="reviewFormSubmitBtn">Submit</button>    -->
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="js/submitReview.js"></script>
        <script src="js/carousel.js"></script>

    </body>

    
</html>




