<?php //login page

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seenima";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn){
        echo "Database in not online";
        exit;
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    //user tried to log in
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * from customers where email='$email' and password = '$password'";

    $result = $conn->query($query);
    if ($result-> num_rows > 0 )
    {
        // if they are in the database register the user id
        $_SESSION['valid_user'] = $email;
    }
}


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
    <script src="scripts/register.js"></script>
    <style>        
        .errormessage{
            color:red;
            font-size:70%;
        }
        form,table{
            margin: auto;
            color: #ffffff;
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

    <div id="content">
				<div id="login_content_section">				
				<br><br><br>
				<?php
				
				
				if (isset($_SESSION['valid_user']))
				{	
					echo '<table id="login_content_table"><tr><td>';
					echo '<h3>Welcome ' .$_SESSION['valid_user']. '</h3><br>';
					echo '<a href="profile.php">Go to your profile</a><br><br>';
                    echo '<a href="logout.php">Logout</a><br><br>';
					echo '</td></tr></table>';
				}
				else
				{
					if (isset($email))
					{
						// if they failed to log in
						echo '<p style="color:red; text-align:center; text-decoration: underline;">Invalid email or password.</p>';
					}
					
				// the form to log in
				
				echo '<form method="post" action="login.php">';
				echo '	<table id="login_content_table">';
				echo '	    <tr><td>';
				echo '		<fieldset id="login_content_fieldset">';
				echo '		<table><tr>';
				echo '      	<td>E-mail:</td>';
				echo ' 			<td><input type="email" name="email" size="50"></td></tr>';
				echo '		<tr>';
				echo '			<td>Password:</td>';
				echo '			<td><input type="password" name="password" size="30"></td></tr></table>';
				echo '		</fieldset><br>';
	
				echo '		<input style="float:left;width:150px;" class="btn_log" type="submit" value="login"><br><br>';
				echo '		<p>No Account? <a href="registration.php">sign up</a></p><br><br>';
					
				echo '		</td></tr>';
				echo '	</table>';
					
				echo '</form>';
				}
				?>
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

    <script src="scripts/register.js"></script>
</body>
</html>

