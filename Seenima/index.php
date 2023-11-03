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

// Function to fetch and display movies
function fetchAndDisplayMovies($query, $conn) {
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<td>';
            // Add anchor tag with the movie page URL
            echo '<a href="movie_page.php?id=' . $row['id'] . '">';
            echo '<img src="images/' . $row['pict'] . '" alt="Movie Image">';
            echo '</a>';
            echo '<p>' . $row['title'] . '</p>';
            echo '</td>';
        }
    }
}

$queryNowShowing = "SELECT id, title, pict FROM movies WHERE id <= 3";
$queryComingSoon = "SELECT id, title, pict FROM movies WHERE id > 3";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seenima Cineplex</title>
    <!-- Include CSS and JavaScript libraries here -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="scripts/script.js"></script>
    <script>
      // JavaScript function to toggle the active tab
      function toggleTab(tab) {
        const tabs = document.querySelectorAll('.tab-button');
        tabs.forEach((button) => {
          button.classList.remove('active-tab');
        });

        tab.classList.add('active-tab');
      }
    </script>
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
                    <a href="index.php"><img src="images/Seenima.png" alt="Seenima Logo"></a> 
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

    <!-- The rest of your content -->

    <div class="image-carousel">
        <div class="carousel-container">
            <img class="carousel-slide" src="images/taylor.png" alt="Image 1" height="450px">
            <img class="carousel-slide" src="images/saw.jpg" alt="Image 2" height="450px">
            <img class="carousel-slide" src="images/halloweenextra.webp" alt="Image 3">
            <img class="carousel-slide" src="images/paylahwedsun.webp" alt="Image 4">
        </div>
    </div>



    <div class="movie-tabs">
      <button class="tab-button active-tab" onclick="showMovies('now-showing'); toggleTab(this);" style="margin-left: 50px;">Now Showing</button>
      <button class="tab-button" onclick="showMovies('coming-soon'); toggleTab(this);">Coming Soon</button>

      <div class="tab-content" id="now-showing">
          <table>
              <tr>
                  <?php fetchAndDisplayMovies($queryNowShowing, $conn); ?>
              </tr>
          </table>
      </div>

      <div class="tab-content" id="coming-soon" style="display: none;">
          <table>
              <tr>
                  <?php fetchAndDisplayMovies($queryComingSoon, $conn); ?>
              </tr>
          </table>
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


