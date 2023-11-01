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
                    <li><a href="#">Menu</a></li>
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

    <div class="movie-filter">
        <input type="text" id="searchInput" oninput="filterMovies()" placeholder="Search by movie title...">
        <select id="genreFilter" onchange="filterMovies()">
            <option value="">Filter by Genre</option>
            <option value="Action">Action</option>
            <option value="Comedy">Comedy</option>
            <option value="Drama">Drama</option>
            <option value="romance">Romance</option>
            <!-- Add more genre options as needed -->
        </select>
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

    <script src="scripts/script.js"></script>
</body>
</html>


