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
    <style>
        .jobs tr{
            font-size: 30px;
            color: darkkhaki;
        }

        .jobs td {
            font-size: 20px;
            color: #ffffff;
        }

        table{
            width: 70%;
            margin: auto;
            margin-top: 50px;
        }

        #jd{
            font-size: 15px;
        }

        #role{
            text-align: center;
        }
        .image-container {
            background: url('images/job.jpg'); /* Add your image URL */
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 400px; /* Adjust the height as needed */
            position: relative;
        }

        .image-container::before {
            content: "";
            background: rgba(0, 0, 0, 0.5); /* Adjust the opacity (0.5 in this example) */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        h1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff; /* Text color */
            font-size: 36px; /* Adjust font size as needed */
        }
        p{
            color: #fff;
            text-align: center;
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

    <!-- jobs -->
    <div class="image-container">
        <h1>Job Opportunities at Seenima</h1>
    </div>
    <div class="jobs">
        <table border="1">
            <tr>
                <th>Position Available</th>
                <th>Job Description</th>
            </tr>
            <tr>
                <td id="role">
                    Marketing Director
                </td>
                <td id="jd">
                    <ul>
                        <li>Develop and implement marketing strategies to promote our luxury cinema brand.</li>
                        <li>Lead the marketing team and oversee marketing campaigns, including digital marketing, 
                            social media, and traditional advertising.</li>
                        <li>Analyze market trends and customer feedback to refine marketing strategies.</li>
                        <li>Collaborate with partners and vendors to execute marketing initiatives.</li>
                        <li>Manage the marketing budget effectively.</li>
                        <li>Monitor and report on the success of marketing campaigns.</li>
                        <li>Stay updated on industry trends and competitive positioning.</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td id="role">
                    Data Analyst
                </td>
                <td id="jd">
                    <ul>
                        <li>Collect and analyze data related to customer preferences, sales, and operational efficiency.</li>
                        <li>Generate reports and insights to support decision-making across the organization.</li>
                        <li>Utilize data visualization tools and software to present findings.</li>
                        <li>Identify trends and opportunities for business growth.</li>
                        <li>Collaborate with cross-functional teams to implement data-driven strategies.</li>
                        <li>Maintain data integrity and accuracy.</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td id="role">
                    Box Office Attendant
                </td>
                <td id="jd">
                    <ul>
                        <li>Greet customers and provide them with information about ticket pricing, showtimes, and promotions.</li>
                        <li>Process ticket sales and concessions orders accurately.</li>
                        <li>Handle cash and credit card transactions.</li>
                        <li>Ensure that the cashier area is clean and well-organized.</li>
                        <li>Assist customers with any inquiries and resolve issues or complaints.</li>
                        <li>Maintain a friendly and helpful demeanor with all customers.</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td id="role">
                    Facility Maintenance Technician
                </td>
                <td id="jd">
                    <ul>
                        <li>Perform routine cleaning tasks throughout the cinema, including theaters, restrooms, and common areas.</li>
                        <li>Empty trash bins and replace liners.</li>
                        <li>Perform floor maintenance and upkeep</li>
                        <li>Ensure all areas are well-maintained and presentable.</li>
                        <li>Report any maintenance or cleanliness issues to the supervisor.</li>
                        <li>Adhere to safety and sanitation protocols regulated by MOH.</li>
                    </ul>
                </td>
            </tr>
        </table>
        <p>Interested candidate please email us at <a href="mailto:hr@seenima.com.sg">hr@seenima.com.sg</a> with the position as the subject title</p>

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


