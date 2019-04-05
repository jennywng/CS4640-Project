
<?php


session_start();

if($_SESSION['loggedin']!== true || !isset($_SESSION['loggedin'])) {
    header('login.php');
}

$uID = $_SESSION['uid'];

$message = '';

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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label>Upload Profile Picture</label>
                    <input type="file" name="upload" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="jrw3mx@virginia.edu">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="jennywang">
                </div>
            </div>
            <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div> -->

            <input type="submit" class="btn" value="Submit">   

            <p><?php echo $message ?></p>

        </form>
    </div>
    

</body>
</html>



<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_FILES['upload'])) {
        $file_name = $uID . $_FILES['upload']['name'];
        $file_type = $_FILES['upload']['type'];
		$file_tmp_name = $_FILES['upload']['tmp_name'];
        $file_size = $_FILES['upload']['size'];
        $target_dir = "uploads/";
        if(move_uploaded_file($file_tmp_name, $target_dir.$file_name)) {
			// connect to database
			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "flushd";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn -> connect_error) {
	            die("Unable to connect to DB: " . $conn -> connect_error);
            }
			
			// query
			$q = "UPDATE users SET profilepic='$target_dir$file_name' WHERE ID=$uID";
            
            if ($conn->query($q) === TRUE) {
                $message =  "Profile picture successfully uploaded. Click on Profile to view.";
            } else {
                $message =  "Error updating record: " . $conn->error;
            }			
		} else {
			$message =  "File can not be uploaded";
		}
    }
}

?>

