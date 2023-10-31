<?php
// Establish a database connection (update with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seenima";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Session start (if not already started)
session_start();

// Check if the user is logged in and get their user ID (adjust as per your authentication logic)
if (isset($_SESSION['valid_user'])) {
    $email = $_SESSION['valid_user'];

    // Retrieve user data from the database
    $sql = "SELECT name, salutation, email, date, phonenumber FROM customers WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $salutation = $row['salutation'];
        $email = $row['email'];
        $date_of_birth = $row['date'];
        $mobile_number = $row['phonenumber'];
    } else {
        echo "User not found";
    }
} else {
    echo "User is not logged in. Redirect to login page.";
    // You can add a redirect to your login page here.
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seenima Cineplex</title>
    <!-- Include CSS and JavaScript libraries here -->
    <link rel="stylesheet" href="style.css">
    <style>        
        body{
            color: #ffffff;
            text-align: center;
        }
        form,table{
            margin: auto;
        }
    </style>
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
    <h1>Welcome, <?php echo $salutation . " " . $name; ?></h1>
    <table border= "1">
        <tr>
            <td><strong>Email:</strong></td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td><strong>Date of Birth:</strong></td>
            <td><?php echo $date_of_birth; ?></td>
        </tr>
        <tr>
            <td><strong>Mobile Number:</strong></td>
            <td><?php echo $mobile_number; ?></td>
        </tr>
    </table>

    <a href="logout.php"><input type="submit" value="Logout" name="logout"></input></a> <!-- Link to logout page -->
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
</body>
</html>

