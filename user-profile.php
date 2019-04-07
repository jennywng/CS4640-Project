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


<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flushd";

// create connection to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
	die("Unable to connect to DB: " . $conn -> connect_error);
}
$user_id = $_SESSION['uid'];

// echo $_SESSION['id'];
//     //$_session UID
//     if (isset($_SESSION['id'])) {
//         $user_id = $_SESSION['id'];
//     }

$sSQL = "SELECT ID, firstname, lastname, email, profilepic FROM users WHERE ID = $user_id";
$result = $conn->query($sSQL);

if ($result -> num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        extract($row);
    }
} else {
    echo 'No results';
}

// set cookie
setcookie('userprofile', $profilepic, (time() + (3600*2)));


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

    <div data-spy="scroll" data-target="#mainNav" data-offset="0">
        <div class="jumbotron text-left" id="jumbo">

            <div class="row">
                <div class="col-6 text-center" >
                    <p></p>
                    <h1 class = "display-4">
                        <?php echo $firstname . " " . $lastname;?>
                    </h1>
                </div>
                <div class="col-6 text-right">
                        <img class="rounded-circle" style="width:40%; margin-top:-5%; margin-right:30%" src=<?php if ($profilepic != null) {echo $profilepic;} else {echo 'images/defaulticon.png';} ?>>
                </div>
            </div>
        </div>
    <p></p>
    </div>

    <section class = "container">
        <!-- <div class="row"> -->
        <h3>User Information: </h3>
        <br>
        <h4><?php echo "Username: ". $firstname . $lastname . $ID ;?></h4>
        <br>
        <h4><?php echo "Email: ". $email ;?></h4>
        <br>
        <p></p>
        <!-- </div> -->
        <hr />
        <h3>Favorite Restrooms: </h3>

        <br>
        <p></p>
        </div>
        <hr />

        <a class="btn" href="edit-profile.php">Edit Profile</a><br>
        <a class="btn" href="logout.php" style="background-color: red">Logout</a>

    </section>
</div>
</body>

</html>


   

