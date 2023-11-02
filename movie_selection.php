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

$query = "SELECT * FROM `movies` WHERE id='1'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$movie_title1 = $row['title'];
$movie_picture1 = $row['pict'];

$query = "SELECT * FROM `movies` WHERE id='2'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$movie_title2 = $row['title'];
$movie_picture2 = $row['pict'];

$query = "SELECT * FROM `movies` WHERE id='3'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$movie_title3 = $row['title'];
$movie_picture3 = $row['pict'];
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
    <h2 style="text-align: center; ">Now Showing</h2>

    <div class="container">
        <form method="post" action="checkout.php" style="margin:auto">
            <div class="row">
                <div class="col">
                    <button type="submit" name="selectedmovie" value="The Ex-Files 4: Marriage Plan 前任4：英年早婚"
                        class="button-image">
                        <img src="./images/<?php echo $movie_picture1; ?>" alt="Submit">
                    </button> <!-- Linking to movie deatils when user clicks the image-->
                    <p style="text-align:center">
                        <?php echo $movie_title1; ?>
                        <br>
                        <br>
                        <button type="submit" class="btn" style="text-align: center;" name="selectedmovie"
                            value="The Ex-Files 4: Marriage Plan 前任4：英年早婚">Book Now</button>
                    </p>
                </div>
                <div class="col">
                    <button type="submit" name="selectedmovie" value="Teenage Mutant Ninja Turtles: Mutant Mayhem"
                        class="button-image">
                        <img src="./images/<?php echo $movie_picture2; ?>" alt="Submit">
                    </button> <!-- Linking to movie deatils when user clicks the image-->
                    <p style="text-align:center">
                        <?php echo $movie_title2; ?>
                        <br>
                        <br>
                        <button type="submit" class="btn" style="text-align: center;" name="selectedmovie"
                            value="Teenage Mutant Ninja Turtles: Mutant Mayhem">Book Now</button>
                    </p>
                </div>
                <div class="col">
                    <button type="submit" name="selectedmovie" value="Saw X" class="button-image">
                        <img src="./images/<?php echo $movie_picture3; ?>" alt="Submit">
                    </button> <!-- Linking to movie deatils when user clicks the image-->
                    <p style="text-align:center">
                        <?php echo $movie_title3; ?>
                        <br>
                        <br>
                        <button type="submit" class="btn" style="text-align: center;" name="selectedmovie"
                            value="Saw X">Book Now</button>
                    </p>
                </div>
            </div>
        </form>
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