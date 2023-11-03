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


// Query the database to fetch the first three movie records for "Now Showing"
$query = "SELECT * FROM movies WHERE id <= 3";
$result = $conn->query($query);






// $query = "SELECT * FROM `movies` WHERE id='1'";
// $result = $conn->query($query);
// $row = $result->fetch_assoc();
// $movie_title1 = $row['title'];
// $movie_picture1 = $row['pict'];

// $query = "SELECT * FROM `movies` WHERE id='2'";
// $result = $conn->query($query);
// $row = $result->fetch_assoc();
// $movie_title2 = $row['title'];
// $movie_picture2 = $row['pict'];

// $query = "SELECT * FROM `movies` WHERE id='3'";
// $result = $conn->query($query);
// $row = $result->fetch_assoc();
// $movie_title3 = $row['title'];
// $movie_picture3 = $row['pict'];
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <title>Seenima</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <style>
        .row {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .col {
            padding: 10px;

            text-align: center;

        }

        #movie-image {
            padding: 10%;
            width: 80%;
            height: auto;
        }

        .button-image {
            background: transparent;

            border: none;
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

            background-color: white;

        }

        #symbol-icon {
            width: 5%;
            height: auto;

        }
    </style>
</head>

<body>
    <!-- header div -->
    <header>
        <nav>
            <div class="left">
                <ul>
                    <li><a href="index.php">Menu</a></li>
                    <li><a href="movie_selection.php">Movies</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">About Us</a></li>
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
    <h2 style="text-align: center; ">Now Showing</h2>

    <div class="container">
        <form method="post" action="checkout.php">
            <div class="row">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col">';
                        echo '<button type="submit" name="selectedmovie" value="' . $row['title'] . '" class="button-image">';
                        echo '<img src="images/' . $row['pict'] . '" alt="Submit">';
                        echo '</button>';
                        echo '<p style="text-align:center">';
                        echo $row['title'];
                        echo '<br>';
                        echo '<br>';
                        echo '<button type="submit" class="btn" style="text-align: center;" name="selectedmovie" value="' . $row['title'] . '">Book Now</button>';
                        echo '</p>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </form>
    </div>


    <footer>
        <h1 style="text-align: center;">Footer div</h1>
    </footer>
    </div>

</body>

</html>