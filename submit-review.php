<?php 
require_once("php/checkfile.php");

$message = "";

$bathID = (int) $_COOKIE['bID'];
$userID = (int) $_COOKIE['uID'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flushd";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $title = (string) $_POST['review-title'];
    $text = (string) $_POST['review-text'];
    $rating = (int) $_POST['poo'];

    if (strlen($_FILES['upload']['name']) > 0 ) {
        $file_name = $userID . $_FILES['upload']['name'];
        $file_type = $_FILES['upload']['type'];
        $file_tmp_name = $_FILES['upload']['tmp_name'];

        $file_size = $_FILES['upload']['size'];
        $target_dir = "uploads/";

        echo "file_tmp_name: $file_tmp_name";
        // echo var_dump($_FILES);
        // echo $_FILES['upload']['error'];

        $x = $target_dir . $file_name;
        if(rename($file_tmp_name, $target_dir.$file_name)) {
			// connect to database
			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "flushd";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn -> connect_error) {
	            die("Unable to connect to DB: " . $conn -> connect_error);
            }

            $q = "INSERT INTO reviews (uID, bID, title, rDesc, rating, imgURL) VALUES 
            ($userID, $bathID, '$title', '$text', $rating, 'uploads/$file_name')";
            if ($conn->query($q) === TRUE) {
                $message =  "Review submitted.";
                require_once("php/average.php");
            } else {
                $message =  "Error updating record: " . $conn->error;
            }
            
            $conn->close();
		} else {
			$message =  "File cannot be uploaded";
		}
    } else {
        // submit review without picture
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flushd";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn -> connect_error) {
            die("Unable to connect to DB: " . $conn -> connect_error);
        }

        $q = "INSERT INTO reviews (uID, bID, title, rDesc, rating, imgURL) VALUES 
        ($userID, $bathID, '$title', '$text', $rating, null)";
        if ($conn->query($q) === TRUE) {
            $message =  "Review submitted.";
            require_once("php/average.php");
        } else {
            $message =  "Error updating record: " . $conn->error;
        }

    }
}


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $title =  (string) $_POST['review-title'];
//     $text =  (string) $_POST['review-text'];
//     $rating = (int) $_POST['poo'];

//     $servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "flushd";

//     $conn = new mysqli($servername, $username, $password, $dbname);
//     if ($conn -> connect_error) {
//         die("Unable to connect to DB: " . $conn -> connect_error);
//     }


//     if (isset($_FILES['upload'])) {
//         $target_dir = "uploads/";
//         $target_file = $target_dir . basename($_FILES["upload"]["name"]);
//         $uploadOk = 1;
//         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
//         // Check if image file is a actual image or fake image
//         // if(isset($_POST["submit"])) {
//         //     $check = getimagesize($_FILES["upload"]["tmp_name"]);
//         //     if($check !== false) {
//         //         $message = "File is an image - " . $check["mime"] . ".";
//         //         $uploadOk = 1;
//         //     } else {
//         //         $message = "File is not an image.";
//         //         $uploadOk = 0;
//         //     }
//         // }
//         // Check if file already exists
//         if (file_exists($target_file)) {
//             $message = "Sorry, file already exists.";
//             $uploadOk = 0;
//         }
//         // Check file size
//         if ($_FILES["upload"]["size"] > 30000) {
//             $message = "Sorry, your file is too large.";
//             $uploadOk = 0;
//         }
//         // Allow certain file formats
//         if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//         && $imageFileType != "gif" ) {
//             $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//             $uploadOk = 0;
//         }
//         // Check if $uploadOk is set to 0 by an error
//         if ($uploadOk == 0) {
//             $message = "Sorry, your file was not uploaded.";
//         // if everything is ok, try to upload file
//         } else {
//             if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
//                 $insert_review = "INSERT INTO reviews (uID, bID, title, rDesc, rating, imgURL) 
//                 VALUES ($userID, $bathID, '$title', '$text', $rating, $target_file)";
//                 if ($conn->query($insert_review) === TRUE) {
//                     $message = "Review submitted successfully";
//                     require_once('php/average.php');
//                 } else {
//                     $message = "Error: " . $insert_review . "<br>" . $conn->error;
//                 }
//             } else {
//                 $message = "Sorry, there was an error uploading your file.";
//             }
//         }
        
    
//         // $file_name = $userID . $_FILES['upload']['name'];
//         // $file_type = $_FILES['upload']['type'];
// 		// $file_tmp_name = $_FILES['upload']['tmp_name'];
//         // $file_size = $_FILES['upload']['size'];
//         // $target_dir = "uploads/";

//         // echo $file_tmp_name;
//         // echo $target_dir.$file_name;

//         // if(move_uploaded_file($file_tmp_name, $target_dir.$file_name)) {
//         //     // query
//         //     $insert_review = "INSERT INTO reviews (uID, bID, title, rDesc, rating, imgURL) 
//         //     VALUES ($userID, $bathID, '$title', '$text', $rating, $target_dir.$file_name)";

//         //     if ($conn->query($insert_review) === TRUE) {
//         //         $message = "Review submitted successfully";
//         //         require_once('php/average.php');
//         //     } else {
//         //         $message = "Error: " . $insert_review . "<br>" . $conn->error;
//         //     }			
//     } else {
//         // if user doesn't upload a picture
//         $insert_review = "INSERT INTO reviews (uID, bID, title, rDesc, rating, imgURL) 
//         VALUES ($userID, $bathID, '$title', '$text', $rating, null)";

//         if ($conn->query($insert_review) === TRUE) {
//             $message = "Review submitted successfully";
//             require_once('php/average.php');
//         } else {
//             $message = "Error: " . $insert_review . "<br>" . $conn->error;
//         }
//     }


    // $conn->close();
// }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
            <!-- Jenny Wang jrw3mx and Amber Liu al7bf -->

        <meta charset="utf-8">
    

        <title>Flushd</title>

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
                      <a class="nav-link" id="reviews-link" href="http://localhost:4200">My Reviews</a>
                    </li>         
                </ul>
            </div>  
        </nav>

        <hr class="my-4">


        <div class="container">
            <h3>Write a Review</h3>
            <div class="container">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><i class="fas fa-upload"></i> Upload Bathroom Picture</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="20000000"/>
                        <input type="file" name="upload" class="form-control-file" id="exampleFormControlFile1">
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
                        <textarea name="review-text" class="form-control" id="review-text" rows="5" placeholder="Review" maxlength="300" required></textarea>
                    </div>

                    <input type="submit" id="reviewFormSubmitBtn" name="submit" class="btn btn-primary" value="Submit">
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




