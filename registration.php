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
				<form action="register.php" method="POST" id="reg_form">
					<br>
					<table style="color:white;" id="login_content_table">
						<tr><td>
						<fieldset id="login_content_fieldset"><legend>Account information</legend>
						<table>
							<tr>
								<td>*E-mail:</td>
								<td><input type="email" name="email" id="email" size="50" oninput="emailsValidation()">
                                    <div id="emailError" class="errormessage"></div></td>
							</tr>
							<tr>
								<td>*Password:</td>
								<td><input type="password" name="password" id="password" size="30"></td>
							</tr>
							<tr>
								<td>*Password confirmation:</td>
								<td><input type="password" name="password2" id="password2" size="30" oninput="pwValidation()">
                                    <div id="pwError" class="errormessage"></div></td>
							</tr>
						</table>
						</fieldset>
						<br><br>
						
						<fieldset id="login_content_fieldset"><legend>Personal Information</legend>
						<table>
							<tr>
								<td>*Name:</td>
								<td><input type="text" name="name" id="name" size="50" oninput="namesValidation()">
                                    <div id="nameError" class="errormessage"></div></td>
							</tr>
							<tr>
								<td>Salutation:</td>
								<td>
									<select name="salutation">
										<option value="Mr.">Mr.</option>
										<option value="Mrs.">Mrs.</option>
										<option value="Ms.">Ms.</option>
										<option value="Mdm.">Mdm.</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Mobile Number:</td>
								<td><input type="text" name="phonenumber"></td>
							</tr>
                            <tr>
								<td>*Date Of Birth:</td>
								<td><input type="date" name="date" id ="date" 
                                    oninput="dateValidation()">
                                    <div id="dateError" class="errormessage"></div>
                                    <br>
                                </td>
							</tr>
						

						</td></tr>
						</table>
						</fieldset>
						<br>
						<input style="float:left; width: 150px;" class='btn_reg' type="submit" value="Register Now" onsubmit="registerSubmit(event)">
                        <a href="login.php"><input style="width: 150px;" class="btn_login" type="submit" value="Login"></a>
						<br>
					</table>
					
				</form>
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

