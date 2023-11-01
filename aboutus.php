<?php
session_start();
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
    <script src="scripts/form.js"></script>
    <style>        
        .errormessage{
            color:red;
            font-size:70%;
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
                        echo '<a href="profile.php"><h3>Hi, <u>' . $_SESSION['valid_user'] . ' </u></h3></a>';
                        echo '<a href="logout.php">Logout</a>';
                    } else {
                        echo "<a href='registration.php'><input class='btn_reg' type='button' value='Login/Sign Up'></a>";
                    }
                ?>
            </div>
        </nav>
    </header>

    <div class="about-us">
        <div class="about-text">
            <h2>About Us</h2>
            <p>
                Welcome to Seenima Cineplex, where the magic of cinema comes to life. 
                We are more than just a movie theater; we are a destination for entertainment, 
                relaxation, and unforgettable experiences.
            </p>
            <p>
                At Seenima, we are committed to providing you with a luxurious yet 
                affordable cinematic journey. Our state-of-the-art facilities, comfortable 
                seating, and cutting-edge technology set the stage for an immersive movie-watching 
                experience.
            </p>
            <p>
                Whether you're a film enthusiast, a couple on a romantic date night, or a 
                family looking for a fun outing, we cater to all tastes and preferences with our 
                diverse selection of movies. Seenima Cineplex is where luxury meets affordability, 
                and every visit is a memorable adventure.
            </p>
        </div>
        <div class="about-image">
            <img src="images/aboutus.webp" alt="Seenima Cineplex">
        </div>
    </div>

    <div class="about-us">
        <div class="about-image">
            <img src="images/mbs.jpeg" alt="mbs">
        </div>
        <div class="about-text">
            <h2>Our Locations</h2>
            <p>
                Seenima at Marina Bay Sands, Singapore, stands as the pinnacle of luxury cinema experiences. 
                Nestled within the iconic Marina Bay Sands complex, our theater offers an ideal escape for 
                movie enthusiasts and discerning viewers. With state-of-the-art facilities, sumptuous seating, 
                and world-class hospitality, we redefine the standards of cinematic indulgence. 
                Whether you're here for a romantic evening, a family outing, or a private event, 
                Seenima at Marina Bay Sands guarantees a lavish and immersive film journey. 
                With our strategic location, breathtaking views, and unmatched comfort, you'll discover the true 
                essence of premium entertainment that transcends the ordinary 
            </p>
            <p>
                <b>Address:</b> <i>10 Bayfront Ave, L3-88, Singapore 018956</i>
            </p>
        </div>
    </div>

    <div class="about-us">
        <div class="about-text" style="margin-left: 100px;">
            <h2>Contact Us</h2>
            <form action="scripts/send_email.php" method="post">
                <!-- Reservation form fields -->
                <input type="text" id="CustName" name="CustName" required placeholder="Enter your name" oninput="nameValidation()" >
                <div id="nameError" class="errormessage"></div><br><br>

                <input type="email" id="CustEmail" name="CustEmail" required placeholder="Enter your email" oninput="emailValidation()">
                <div id="emailError" class="errormessage"></div><br><br>

                <input type="text" id="phoneno" name="phoneno" placeholder="Enter your phone number"><br><br>

                <select id="type" name="type" required class="type">
                    <option value="" disabled selected>Type of enquiry</option>
                    <option value="General Enquiry">General Enquiry</option>
                    <option value="Compliment">Compliment</option>
                    <option value="Feedback">Feedback</option>
                    <option value="Complaint">Complaint</option>
                    <!-- Add more options as needed -->
                </select><br><br>
                
                <textarea type="textarea" id="comment" name="comment" rows="3" cols="20" required placeholder="Enter your comments" oninput="commentValidation()"></textarea> <br><br>
                <div id="commentError" class="errormessage"></div>
                <input type="submit" value="Enquire Now" id="submit" onsubmit="handleSubmit(event)">
            </form>
        </div>
        <div class="about-image">
            <img src="images/cinema1.jpg" alt="Seenima Cineplex">
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

    <script type="text/javascript" src="scripts/form.js"></script>
    <script src="scripts/script.js"></script>
</body>
</html>

