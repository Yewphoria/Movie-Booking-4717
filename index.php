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

$query = "SELECT id, title, pict FROM movies LIMIT 3";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seenima Cineplex</title>
    <!-- Include CSS and JavaScript libraries here -->
    <link rel="stylesheet" href="style.css">
    <script src="scripts/script.js"></script>
</head>
<body>
    <header>
        <nav>
            <div class="left">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Movies</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="jobs.php">Careers</a></li>
                </ul>
            </div>
            <div class="center">
                <div class="navbar-logo">
                    <a href="index.php"><img src="images/Seenima.png" alt="Seenima Logo"></a> 
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

    <!-- The rest of your content -->

    <div class="image-carousel">
        <button id="carousel-prev" class="carousel-button" onclick="changeSlide(-1)">&#9664;</button>
        <div class="carousel-container">
            <img class="carousel-slide" src="images/taylor.png" alt="Image 1" height="450px">
            <img class="carousel-slide" src="images/saw.jpg" alt="Image 2" height="450px">
            <img class="carousel-slide" src="images/halloweenextra.webp" alt="Image 3">
            <img class="carousel-slide" src="images/paylahwedsun.webp" alt="Image 4">
        </div>
        <button id="carousel-next" class="carousel-button" onclick="changeSlide(1)">&#9654;</button>
    </div>



    <div class="movie-tabs">
        <?php
        $conn = mysqli_connect($servername, $username, $password, $dbname);
      
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
      
        // Query the database to fetch the first three movie records for "Now Showing"
        $queryNowShowing = "SELECT id, title, pict FROM movies WHERE id <= 3";
        $resultNowShowing = mysqli_query($conn, $queryNowShowing);
      
        // Query the database to fetch movies with an ID greater than 3 for "Coming Soon"
        $queryComingSoon = "SELECT id, title, pict FROM movies WHERE id > 3";
        $resultComingSoon = mysqli_query($conn, $queryComingSoon);
      
        mysqli_close($conn);
        ?>
      
        <button class="tab-button active" onclick="showMovies('now-showing')">Now Showing</button>
        <button class="tab-button" onclick="showMovies('coming-soon')">Coming Soon</button>
      
        <div class="tab-content" id="now-showing">
          <table>
            <tr>
              <?php
              if (mysqli_num_rows($resultNowShowing) > 0) {
                while ($row = mysqli_fetch_assoc($resultNowShowing)) {
                  echo '<td>';
                  echo '<img src="images/' . $row['pict'] . '" alt="Movie Image">';
                  echo '</td>';
                }
              }
              ?>
            </tr>
            <tr>
              <?php
              if (mysqli_num_rows($resultNowShowing) > 0) {
                mysqli_data_seek($resultNowShowing, 0); // Reset the result pointer
                while ($row = mysqli_fetch_assoc($resultNowShowing)) {
                  echo '<td>' . $row['title'] . '</td>';
                }
              }
              ?>
            </tr>
          </table>
        </div>
      
        <div class="tab-content" id="coming-soon" style="display: none;">
          <table>
            <tr>
              <?php
              if (mysqli_num_rows($resultComingSoon) > 0) {
                while ($row = mysqli_fetch_assoc($resultComingSoon)) {
                  echo '<td>';
                  echo '<img src="images/' . $row['pict'] . '" alt="Movie Image">';
                  echo '</td>';
                }
              }
              ?>
            </tr>
            <tr>
              <?php
              if (mysqli_num_rows($resultComingSoon) > 0) {
                mysqli_data_seek($resultComingSoon, 0); // Reset the result pointer
                while ($row = mysqli_fetch_assoc($resultComingSoon)) {
                  echo '<td>' . $row['title'] . '</td>';
                }
              }
              ?>
            </tr>
          </table>
        </div>
      </div>

      <div class="footer">
        <div class="column">
            <!-- 1st Column - Navigation Bar -->
            <ul id="footer-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Movies</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="jobs.php">Careers</a></li>
            </ul>
        </div>
        <div class="column">
            <!-- 2nd Column - Logo and Socials -->
            <div class="logo">
                <img src="images/seenima.png" alt="Logo">
            </div>
            <div class="social-icons">
                <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="images/twitter.png" alt="Twitter"></a>
                <a href="#"><img src="images/instagram.png" alt="Instagram"></a>
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


