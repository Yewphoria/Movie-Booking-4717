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

$genreFilter = $_GET['genre'];
$yearFilter = $_GET['year'];

$query = "SELECT * FROM movies WHERE 1"; // Start with a basic query

if ($genreFilter != 'all') {
    $query .= " AND genre = '$genreFilter'";
}

if (!empty($yearFilter)) {
    $query .= " AND release_year = '$yearFilter'";
}

$result = $conn->query($query);

// Display the filtered movies
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display movie details, e.g., title and image
        $movieTitle = $row['title'];
        $movieImage = $row['pict'];

        echo "<div class='movie-card'>";
        echo "<h3>$movieTitle</h3>";
        echo "<img src='$movieImage



// Close the database connection
$conn->close();
?>
