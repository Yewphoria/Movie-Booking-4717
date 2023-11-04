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




$movie = $_SESSION['movie'];

// fetch movie deatils
$query = "SELECT * FROM movies WHERE title='$movie'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$movie_picture = $row['pict'];


function resultToArray($result)
{
    $row = array();
    while ($row = $result->fetch_assoc()) { //fetch_assoc() - Fetch a result row as an associative array
        $rows[] = $row; //add the fetched row into the $rows[] array
    }
    return $rows;
}

// Retrieve the availablity of seats from the database

if (isset($_POST['date'])) { //if the date is selected
    $date = $_POST['date'];
    $_SESSION['date'] = $date;
    $time = $_POST['time'];
    $_SESSION['time'] = $time;
    $query = "SELECT * FROM `availability` WHERE title='$movie' AND date='$date' AND time='$time'";
    $result = $conn->query($query);
    $rowBoxes = resultToArray($result);

}

//When user click the checkout button which submit the form 
if (isset($_POST['checkoutBtn'])) {
    $query = "SELECT * FROM `availability` WHERE title='$movie' AND date='$date' AND time='$time'";
    $result = $conn->query($query);
    $rowBoxes = resultToArray($result);
    $date = $_SESSION['date'];
    $time = $_SESSION['time'];
    
    if (!empty($_POST['emailBox']) and !empty($_POST['nameBox'])) { //if the email and name is not empty
        $email = $_POST['emailBox'];
        $name = $_POST['nameBox'];
        $payment = $_POST['payment'];
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['payment'] = $payment;
        include 'email_confirmation.php'; #send email to user

        if (!empty($_POST['seat'])) { //if the seat is selected and submited through the form

            $selectedSeats = $_POST['seat'];
            $seat = implode(", ", $selectedSeats);
            
            foreach ($selectedSeats as $selected) { //for each selected seat which have value of the seat number which is set into $selected
                $querySeat = "UPDATE `availability` SET bookingstatus = '1' WHERE title = '$movie' AND date = '$date' AND time = '$time' AND seatcode = '$selected'";
                $result = $conn->query($querySeat);
                $queryOrder = "INSERT INTO `orders` (title, email,seat,date,time,customerName, payment) VALUES ('$movie', '$email', '$selected', '$date', '$time', '$name', '$payment')";
                $result = $conn->query($queryOrder);
            }
        }
        
        // code to display a confirmation dialog with only the "OK" button
        echo "<script>alert('Tickets successfully purchased! Please check your email. Thank you for your time');
    window.location.href = 'movie_selection.php';</script>";

    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seenima</title>
    <!-- Include CSS and JavaScript libraries here -->
    <link rel="stylesheet" href="style.css">
    <script src="scripts/script.js"></script>
</head>

<style>
    /* main container for seat page */
    .container-seat-page {
        display: flex;

        margin: 0 auto;
        width: 90%;
    }

    /* image column */
    .col-image {
        flex: 1;
        /* padding-left: 6%; */
        max-width: 30%;
        padding-top: 1%;

    }

    /* seat selection container */
    .seating-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin: 0 auto;
        width: 60vw;
    }


    /* seating styling */
    .empty {
        background-color: #32ade0;
        -webkit-appearance: none;
        cursor: pointer;
        height: 15px;
        width: 17px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;

    }

    .empty:hover {
        background-color: #879ba5;
    }

    .empty:checked {
        background-color: #ceedfb;
    }

    .booked {
        background-color: #005b88;
        -webkit-appearance: none;
        cursor: pointer;
        height: 15px;
        width: 17px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .transparent {
        background-color: transparent;
        -webkit-appearance: none;
        height: 15px;
        width: 17px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    #payment-container {
        text-align: center;
        max-width: 100%;

    }


    .cinema-screen {
        background-color: white;
        /* Set the background color to black to simulate a screen */
        color: black;
        /* Set the text color to white for contrast */
        padding: 20px;
        /* Add some padding for content inside the screen */
        text-align: center;
        /* Center text content */
        font-size: 24px;
        /* Adjust the font size as needed */
        border: 2px solid #fff;
        /* Add a border to represent the screen's frame */
        box-shadow: 0 0 10px whitesmoke;
        /* Add a subtle shadow for depth */
        width: 250px;

        /* Set the width of the screen */
        margin: 0 auto;
        /* Center the screen horizontally */
        border-radius: 5px;



    }

    #ticket-table {

        font-size: 18px;
        display: none;
        /* hide the table first */

        margin: 0;
        /* Set margin to 0 */
        padding: 0;
        /* Set padding to 0 */
        border-collapse: collapse;
        /* Collapse borders */

    }

    #ticket-table th,
    #ticket-table td {
        width: 25%;
        margin: 0;
        padding: 0;
    }

    .checkout-btn {
        background-color: #32ade0;
        border-radius: 12px;
        color: white;
        padding: 5px 20px;
        font-size: 15px;
        cursor: pointer;
        margin: 12px 50px 2px 20px;
    }

    /* email error message */
    .errormessage {
        padding-top: 5px;
        padding-right: 35px;
        color: red;
        font-size: 10px;
    }

    .checkout-btn.custom-button[disabled] {
        background-color: #999;
        /* Change this to your desired color */
        color: #ccc;
        /* Change this to your desired text color */
        cursor: not-allowed;
        /* Change cursor style */
    }
</style>

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
    <br>
    <h3 style="text-align: center; padding-left:20%;"> You have selected
        <?php echo $movie; ?> on
        <?php echo $date; ?> at
        <?php echo $time; ?>
    </h3>



    <div class="container-seat-page">
        <div class="col-image">
            <img src="./images/<?php echo $movie_picture; ?>" id="movie-image" style="width:90%;">
        </div>
        <div class="seating-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="checkout-form">
                <!-- Refresh the page itself -->
                <td id="seating-plan">

                    <?php
                    echo '<tr>';
                    echo '<div class="cinema-screen">Screen</div>';
                    echo '<br>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<span style="padding-right: 20px;">A</span>';
                    for ($i = 0; $i <= 5; $i++) {
                        if ($rowBoxes[$i]['bookingstatus'] == '0') {
                            echo '<input class="empty" type="checkbox" name="seat[]" value="' . $i . '">';
                        } else {
                            echo '<input class="booked" type="checkbox" name="seat[]" value="' . $i . 'booked" disabled>';
                        }

                        if ($i == '1' || $i == '3') {
                            echo '<input class="transparent" type="checkbox" disabled>';
                        }


                    }
                    echo '<span style="padding-left: 20px;">A</span>';
                    echo '</tr>';
                    echo '<br>';
                    echo '<tr>';
                    echo '<span style="padding-right: 20px;">B</span>';
                    for ($i = 6; $i <= 11; $i++) {
                        if ($rowBoxes[$i]['bookingstatus'] == '0') {
                            echo '<input class="empty" type="checkbox" name="seat[]" value="' . $i . '">';
                        } else {
                            echo '<input class="booked" type="checkbox" name="seat[]" value="' . $i . 'booked" disabled>';
                        }

                        if ($i == '7' || $i == '9') {
                            echo '<input class="transparent" type="checkbox" disabled>';
                        }
                    }
                    echo '<span style="padding-left: 20px;">B</span>';
                    echo '</tr>';
                    echo '<br>';
                    echo '<tr>';
                    echo '<span style="padding-right: 20px;">C</span>';
                    for ($i = 12; $i <= 17; $i++) {
                        if ($rowBoxes[$i]['bookingstatus'] == '0') {
                            echo '<input class="empty" type="checkbox" name="seat[]" value="' . $i . '">';
                        } else {
                            echo '<input class="booked" type="checkbox" name="seat[]" value="' . $i . 'booked" disabled>';
                        }

                        if ($i == '13' || $i == '15') {
                            echo '<input class="transparent" type="checkbox" disabled>';
                        }
                    }
                    echo '<span style="padding-left: 20px;">C</span>';
                    echo '</tr>';
                    echo '<br>';
                    echo '<tr>';
                    echo '<span style="padding-right: 20px;">D</span>';
                    for ($i = 18; $i <= 23; $i++) {
                        if ($rowBoxes[$i]['bookingstatus'] == '0') {
                            echo '<input class="empty" type="checkbox" name="seat[]" value="' . $i . '">';
                        } else {
                            echo '<input class="booked" type="checkbox" name="seat[]" value="' . $i . 'booked" disabled>';
                        }

                        if ($i == '19' || $i == '21') {
                            echo '<input class="transparent" type="checkbox" disabled>';
                        }
                    }
                    echo '<span style="padding-left: 20px;">D</span>';
                    echo '</tr>';
                    ?>
                    <br>
                    <p>
                        <input class="empty" type="checkbox" disabled>
                        <span style="padding-left: 3px;">Available</span>
                        <span style="padding-left:3px;"><input class="empty" type="checkbox" disabled></span>
                        <span style="padding-left:3px;">Selected</span>
                        <span style="padding-left:3px;"><input class="booked" type="checkbox" disabled></span>
                        <span style="padding-left:3px;">Occupied</span>
                    </p>
                </td>
                <tr>
                    <td id="payment-container">
                        <h3 id="seat-message">Please select a seat</h3>
                        <table border="1" id="ticket-table">
                            <tr style="background-color: grey;">
                                <th style="width: 25%;">
                                    <h3>Ticket Type
                                </th>
                                <th style="width: 25%;">
                                    <h3>Ticket Price
                                </th>
                                <th style="width: 25%;">
                                    <h3>Quantity
                                </th>
                                <th style="width: 25%;">
                                    <h3>Total Amount
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $movie ?> Standard Price
                                </td>
                                <td>$9</td>
                                <td id="quantity" name="quantityplaceholder"></td>
                                <td id="total" name="totalholder"></td>
                            </tr>
                        </table>
                        <br>
                        <div id="customer-info" style="display:none;">
                            <?php
                            if (isset($_SESSION['valid_user'])) {
                                // Retrieve the user's name from your database based on their email
                                $email = $_SESSION['valid_user'];
                                $query = "SELECT name FROM customers WHERE email = '$email'";
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $name = $row['name'];
                                } else {
                                    // Handle the case where the user's name is not found
                                    $name = "Unknown"; // You can set a default name
                                }
                            
                                echo '<h3>Ordered by ' . $name . ' </h3>';
                                echo '<input type="hidden" name="emailBox" value="' . $email . '">';
                                echo '<input type="hidden" name="nameBox" value="' . $name . '">';
                            } else {
                                echo '<fieldset style="border:0px">';
                                echo '<label>Email: <input type="text" name="emailBox" id="emailBox" size="25" required placeholder="Enter your email" oninput="emailValidation()"></label>
                                <br>';
                                echo '<div id="emailError" class="errormessage"></div>';
                                echo '<br>';
                                echo '<label>Name: <input type="text" name="nameBox" id="nameBox" size="25" required placeholder="Enter your name" oninput="nameValidation()"></label><br>';
                                echo '<div id="nameError" class="errormessage"></div>';
                                echo '</fieldset>';
                            }
                            ?>
                        </div>
                        <p id="payment-header" style="display: none;">Please select payment method:</p>
                        <!-- Not displayed unless user clicks seats -->
                        <div id="payment-options" style="display: none;">
                            <!-- Not displayed unless user clicks seats -->
                            <label>
                                <input type="radio" name="payment" value="master" checked> Master
                                <span style="vertical-align: middle;">
                                    <img src="./images/mastercard-logo.png" alt="Mastercard" style="width: 5%;">
                                </span>
                            </label>
                            <label>
                                <input type="radio" name="payment" value="paypal"> Paypal
                                <span style="vertical-align: middle;">
                                    <img src="./images/paypal-logo.png" alt="Paypal" style="width: 10%;">
                                </span>
                            </label>
                            <label>
                                <input type="radio" name="payment" value="visa"> Visa
                                <span style="vertical-align: middle;">
                                    <img src="./images/visa-logo.png" alt="Visa" style="width: 7%;">
                                </span>
                            </label>
                            <label>
                                <input type="radio" name="payment" value="paylah"> Paylah!
                                <span style="vertical-align: middle;">
                                    <img src="./images/paylah-logo.png" alt="paylah" style="width: 5%;">
                                </span>
                            </label>
                        </div>
                    </td>
                    <td style="text-align: center; vertical-align: middle; padding-left:50px;">
                        <div style="display: inline-block; text-align: left;">
                            <input class="checkout-btn custom-button" name="checkoutBtn" type="submit" value="CheckOut"
                                id="checkout" style="display:none" <?php echo isset($_SESSION['valid_user']) ? '' : 'disabled'; ?>>
                        </div>
                    </td>
                </tr>
            </form>
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

</body>



<script>

    // Add click event listeners to seats
    var seats = document.getElementsByName("seat[]");
    for (var i = 0; i < seats.length; i++) {
        seats[i].addEventListener('click', function () {
            resetMessage();   //whenever user click the seat it will delete the message
            calculateSeat();
            var ticketTable = document.getElementById("ticket-table");
            ticketTable.style.display = "block";  //show the table
            document.getElementById("payment-header").style.display = "block";   //show the payment header
            document.getElementById("payment-options").style.display = "block";  //show the payment option
            document.getElementById("checkout").style.display = "block";   //show the checkout button
            document.getElementById("customer-info").style.display = "block";  //show the customer info

        });
    }

    //Calculate number of seats checked and total price		
    function calculateSeat() {
        var quantity = 0;
        var seats = document.getElementsByName("seat[]"); // get the amount of seat selected 
        for (var i = 0, length = seats.length; i < length; i++) {
            if (seats[i].checked) {
                quantity += 1;
            }
        }
        if (quantity == 0) {
            showMessage("Please select a seat");
            var ticketTable = document.getElementById("ticket-table");
            ticketTable.style.display = "none";  //hide the table
            document.getElementById("payment-header").style.display = "none";   //hide the payment header
            document.getElementById("payment-options").style.display = "none";  //hide the payment header
            document.getElementById("checkout").style.display = "none";  //hide the checkout button
            document.getElementById("customer-info").style.display = "none";  //hide the customer info
        }

        document.getElementById("quantity").innerHTML = quantity;
        document.getElementById("total").innerHTML = "$" + quantity * 9;  //price of ticket is 9 dollars

    }

    function calculatePrice() {

        calculateSeat();

    }
    setInterval(calculatePrice, 60);  //Calculate every 60 milliseconds

    function showMessage(message) {
        var messageElement = document.getElementById("seat-message");
        messageElement.textContent = message;
    }

    function resetMessage() {
        var messageElement = document.getElementById("seat-message");
        messageElement.textContent = "";
    }

    //email validation
    function emailValidation() {
        const emailValue = document.getElementById("emailBox").value;
        const emailError = document.getElementById("emailError");


        const regexEmail = /^[a-zA-Z0-9.-]+@([a-zA-Z0-9-])+(\.[a-zA-Z]+){0,3}\.[a-zA-Z]{2,3}$/; //email format    //[a-zA-Z0-9.-]+: Matches one or more word characters, hyphens, or periods for the user name part.
        //     // + means repeat more than once , 
        //     //(\.[a-zA-Z]+){0,3} : Matches zero to three occurrences of a period followed by one or more word characters for the domain name part.  meaning 0 to 3 extension
        //     //\.[a-zA-Z]{2,3} : for last extension it has to be 2-3 characters.

        // Check if the input is null or empty
        if (!emailValue) {
            emailError.textContent = '';
            return; // Clear error message
        }

        if (regexEmail.test(emailValue) == false) {
            emailError.textContent = 'Invalid Email Address';
            disableCheckoutButton(); // Disable the button
        } else {
            emailError.textContent = '';
            enableCheckoutButton(); // Enable the button
        }
    }

    //function to validate name
    function nameValidation() {
        const nameValue = document.getElementById("nameBox").value;
        const nameError = document.getElementById("nameError");

        const regexName = /^[a-zA-Z\s]+$/; //alphabet charaters and space 

        const nameWithoutSpacesCharCount = nameValue.match(/[\w]*/g).join('').length;  //count the length of char without space  \w matches any word character

        // Check if the input is null or empty
        if (!nameValue) {
            nameError.textContent = '';  // Clear error message
            return;
        }

        if (regexName.test(nameValue) == false) {      //if else to check valid
            nameError.textContent = 'Name cannot contain numbers or special characters.';
            disableCheckoutButton();
        } else if (nameWithoutSpacesCharCount < 3) {
            nameError.textContent = 'Name must be at least 3 characters long';
            disableCheckoutButton();

        } else {
            nameError.textContent = '';
            enableCheckoutButton(); // Enable the button
        }

    }

    //disable the checkoutbutton
    function disableCheckoutButton() {
        document.getElementById("checkout").disabled = true;

    }

    function enableCheckoutButton() {
        document.getElementById("checkout").disabled = false;
    }


    document.getElementById("emailBox").addEventListener("input", updateCheckoutButtonState);
    document.getElementById("nameBox").addEventListener("input", updateCheckoutButtonState);

    function updateCheckoutButtonState() {
        const validUser = <?php echo isset($_SESSION['valid_user']) ? 'true' : 'false'; ?>;
        const emailError = document.getElementById("emailError").textContent;
        const nameError = document.getElementById("nameError").textContent;

        if (emailError || nameError) {
            disableCheckoutButton();
        } else {
            enableCheckoutButton(); // Enable the button when both validations are clear
        }

    }


</script>

</html>