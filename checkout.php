<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seenima";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$movie = $_POST['selectedmovie'];
// var_dump($movie); for checking purpose
$_SESSION['movie'] = $movie; //store the movie id in session variable

//retrieve the movie details from database

$query = "SELECT * FROM movies WHERE title='$movie'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$movie_title = $row['title'];
$movie_picture = $row['pict'];
$movie_sypnosis = $row['sypnosis'];
$movie_cast = $row['cast'];
$movie_director = $row['director'];
$movie_genre = $row['genre'];
$movie_release = $row['release'];
$movie_runtime = $row['runtime'];
$movie_language = $row['language'];
$movie_trailer = $row['trailer_url'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Seenima</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts/script-showtime.js"></script>
    <meta charset="utf-8">
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

        #showtimes-content {
            display: flex;
            /* Change the display property to flex */
            flex-wrap: wrap;
            /* Allow flex items to wrap onto multiple lines if needed */

            margin: 0;
        }

        .showtime-box {
            border: 1px solid #333;
            margin: 0 10px 10px 0;
            padding: 10px;
            cursor: pointer;
            text-align: center;
            background-color: peachpuff;
            max-width: 20%;
            height: auto;
            border-radius: 8px;
        }

        .showtime-box:hover {
            color: peachpuff;
            background-color: black;
        }
    </style>
</head>

<body>
    <!-- header div -->
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
                    echo '<h3>Hi, ' . $_SESSION['valid_user'] . ' </h3>';
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
            <?php echo $movie_title; ?></strong>

        </h2>
        <hr class="solid" style="max-width: 90%;">
    </div>
    <div class="container-movie-detail">
        <div class="col-image">
            <img src="./images/<?php echo $movie_picture; ?>" id="movie-image">
        </div>
        <div class="col"> <!--Main right column container-->
            <div class="container">
                <div class="col">
                    <h3><strong>Details</strong></h3>
                    <p>
                        <span class="subtitle">Cast:</span>
                    <div class="text-container" style="overflow: hidden; padding-left:35px;">
                        <span style="text-align:left">
                            <?php echo $movie_cast; ?>
                        </span>
                    </div>
                    </p>
                    <p>
                        <span class="subtitle">Director:</span>
                    <div class="text-container" style="overflow: hidden; padding-left:14px;">
                        <span style="text-align:left">
                            <?php echo $movie_director; ?>
                        </span>
                    </div>
                    </p>
                    <p>
                        <span class="subtitle">Genre:</span>
                    <div class="text-container" style="overflow: hidden; padding-left:25px;">
                        <span style="text-align:left">
                            <?php echo $movie_genre; ?>
                        </span>
                    </div>
                    </p>
                </div>
                <div class="col-right">
                    <p>
                        <span class="subtitle">Release:</span>
                    <div class="text-container" style="overflow: hidden; padding-left:45px;">
                        <span style="text-align:left">
                            <?php echo $movie_release; ?>
                        </span>
                    </div>
                    </p>
                    <p>
                        <span class="subtitle">Running Time:</span>
                    <div class="text-container" style="overflow: hidden; padding-left:8px;">
                        <span style="text-align:left">
                            <?php echo $movie_runtime; ?>
                        </span>
                    </div>
                    </p>
                    <p>
                        <span class="subtitle">Language:</span>
                    <div class="text-container" style="overflow: hidden; padding-left:35px;">
                        <span style="text-align:left">
                            <?php echo $movie_language; ?>
                        </span>
                    </div>
                    </p>
                </div>
            </div>

            <h3 style="padding-left: 1.5%;"><Strong>Synopsis</Strong></h3>
            <p style="padding-left:1.5%; text-align: justify;">
                <?php echo $movie_sypnosis; ?>
            </p>
            <br>
            <video width="100%" height="auto" controls poster="./images/Ex-file-4-thumbnail.png">
                <source src="./images/<?php echo $movie_trailer; ?>" type="video/mp4">
            </video>
        </div>
    </div>
    <h2 style="padding-left: 5%;">Buy Tickets</h2>
    <hr class="solid" style="max-width: 90%;">
    <div class="cinema-container">
        <div class="col" style="max-width: 30%;">
            <h3 style="padding-left: 20%;">Select a date</h3>
            <ul style="padding-left:17%;">
                <form action="seat.php" method="post" id="booking-form">
                    <li><a onclick="showShowtimes('05-Nov-2023', event)">05-Nov-2023</a>
                    </li>
                    <li><a onclick="showShowtimes('06-Nov-2023', event)">06-Nov-2023</a>
                    </li>
                    <li><a onclick="showShowtimes('07-Nov-2023', event)">07-Nov-2023</a>
                    </li>
                    <!-- Add hidden input fields for date and time -->
                    <input type="hidden" name="date" id="selected-date" value="">
                    <input type="hidden" name="time" id="selected-time" value="">
                </form>
            </ul>
        </div>
        <div class="col">
            <div class="showtimes">
                <h3>Showtimes</h3>
                <div id="showtimes-content"></div>
            </div>
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
</body>

</html>