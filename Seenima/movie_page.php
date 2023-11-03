<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seenima";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection and handle errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get movie ID from the URL
$movieId = $_GET['id'];

// Query your database to retrieve movie information based on $movieId
// Modify this query based on your database schema
$query = "SELECT * FROM movies WHERE id = $movieId";
$result = mysqli_query($conn, $query);

// Check if a movie with the given ID exists
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    // Extract movie details
    $movieTitle = $row['title'];
    $movieImage = $row['pict'];
    $movieSynopsis = $row['sypnosis'];
    $moviecast = $row['cast'];
    $moviedirector = $row['director'];
    $moviegenre = $row['genre'];
    $movierelease = $row['release'];
    $moviert = $row['runtime'];
    $movielang = $row['language'];
    $movietrailer = $row['trailer_url'];
} else {
    // Handle the case where the movie doesn't exist
    $movieTitle = "Movie Not Found";
    $movieImage = "placeholder.jpg";
    $movieSynopsis = "This movie does not exist in our database.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seenima Cineplex</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        p {
            font-size: 15px;

        }

        .container-movie-detail {
            display: flex;

            margin: 0 auto;
            width: 90%;
        }




        .btn {
            background-color: peachpuff;
            padding: 1%;
            width: auto;
            height: auto;
            color: black;
            text-align: center;
            text-decoration: none;
            border-radius: 15%;
            cursor: pointer;
            transition: color 0.4s;
            position: relative;

        }

        .btn:hover {
            color: peachpuff;
            background-color: black;

        }

        #symbol-icon {
            width: 2%;
            height: auto;

        }

        .col-image {
            flex: 1;
            /* padding-left: 6%; */
            max-width: 40%;
            padding-top: 1%;
        }

        #movie-image {
            width: 80%;
            height: auto;
            margin: 0;
            padding: 0;
        }

        .subtitle {
            color: grey;
            float: left;
            margin-right: 10px;
        }

        .col-right {
            flex: 1;
            padding: 10px;
            padding-top: 7%;

            /* border: 1px solid #ccc; */
        }


        .col {
            flex: 1;
        }

        .cinema-container {
            display: flex;
            /* border: 1px solid #ccc; */

        }

        li,
        a {
            list-style-type: none;
            padding: 5px;
            text-decoration: none;
        }
    </style>
</head>
</head>
<body>
<header>
        <nav>
            <div class="left">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="movie_selection.php">Movies</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="jobs.php">Careers</a></li>
                </ul>
            </div>
            <div class="center">
                <div class="navbar-logo">
                    <img src="images/Seenima.png" alt="Seenima Logo">
                </div>
            </div>
            <div class="right">
                <?php
                    if (isset($_SESSION['valid_user'])) {
                        echo '<a href="profile.php"><h3>Hi, <u>' . $_SESSION['valid_user'] . ' </u></h3></a>';
                        echo '<a href="logout.php">Logout</a>';
                    } else {
                        echo "<a href='registration.php'><input class='btn_reg' type='button' value='Login/Sign Up'></a>";
                    }
                ?>
            </div>
        </nav>
    </header>
    <div>
        <h2 style="text-align: left; padding-left: 5%;">
            <?php echo $movieTitle; ?></strong>

        </h2>
        <hr class="solid" style="max-width: 90%;">
    </div>                
    <div class="container-movie-detail">
        <div class="col-image">
            <img src="./images/<?php echo $movieImage; ?>" id="movie-image">
        </div>
        <div class="col"> <!--Main right column container-->
            <div class="container">
                <div class="col">
                    <h3><strong>Details</strong></h3>
                    <p>
                        <span class="subtitle">Cast:</span>
                    <div class="text-container" style="overflow: hidden; padding-left:35px;">
                        <span style="text-align:left">
                            <?php echo $moviecast; ?>
                        </span>
                    </div>
                    </p>
                    <p>
                        <span class="subtitle">Director:</span>
                    <div class="text-container" style="overflow: hidden; padding-left:14px;">
                        <span style="text-align:left">
                            <?php echo $moviedirector; ?>
                        </span>
                    </div>
                    </p>
                    <p>
                        <span class="subtitle">Genre:</span>
                    <div class="text-container" style="overflow: hidden; padding-left:25px;">
                        <span style="text-align:left">
                            <?php echo $moviegenre; ?>
                        </span>
                    </div>
                    </p>
                </div>
                <div class="col-right">
                    <p>
                        <span class="subtitle">Release:</span>
                    <div class="text-container" style="overflow: hidden; padding-left:45px;">
                        <span style="text-align:left">
                            <?php echo $movierelease; ?>
                        </span>
                    </div>
                    </p>
                    <p>
                        <span class="subtitle">Running Time:</span>
                    <div class="text-container" style="overflow: hidden; padding-left:8px;">
                        <span style="text-align:left">
                            <?php echo $moviert; ?>
                        </span>
                    </div>
                    </p>
                    <p>
                        <span class="subtitle">Language:</span>
                    <div class="text-container" style="overflow: hidden; padding-left:35px;">
                        <span style="text-align:left">
                            <?php echo $movielang; ?>
                        </span>
                    </div>
                    </p>
                </div>
            </div>

            <h3 style="padding-left: 1.5%;"><Strong>Synopsis</Strong></h3>
            <p style="padding-left:1.5%; text-align: justify;">
                <?php echo $movieSynopsis; ?>
            </p>
            <br>
            <video width="100%" height="auto" controls poster="./images/Ex-file-4-thumbnail.png">
                <source src="./images/<?php echo $movietrailer; ?>" type="video/mp4">
            </video>
        </div>
    </div>

    <div class="footer">
        <div class="column">
            <!-- 1st Column - Navigation Bar -->
            <ul id="footer-nav">
                <li><a href="index.php">Home</a></li><br>
                <li><a href="movie_selection.php">Movies</a></li><br>
                <li><a href="aboutus.php">About Us</a></li><br>
                <li><a href="jobs.php">Careers</a></li>
            </ul>
        </div>
        <div class="column">
            <!-- 2nd Column - Logo and Socials -->
            <div class="logo">
                <img src="images/seenima.png" alt="Logo">
            </div>
            <div class="social-icons" style="color: #ffffff;">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>
        <div class="column">
            <!-- 3rd Column - Any additional content you want -->
            <p>Contact Us:</p>
            <address>
                10 Bayfront Ave, L3-88,<br>
                Singapore 018956<br><br>
                Phone: +65 62353535<br>
                Email: enquiry@seenima.com.sg
            </address>
        </div>
    </div>

    <script src="scripts/script.js"></script>
</body>
</html>
