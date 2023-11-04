<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Customername"];
    $email = $_POST["email"];
    $title = $_POST["title"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $seat = $_POST["seat"];
    $payment = $POST["payment"];
    // Set the return path using the -f parameter
    $additional_parameters = "-ff31ee@localhost"; // Replace with your email address
    // Define email parameters
    $to = "f32ee@localhost"; // Change to the recipient's email address
    $subject = "Your Movie Ticket";
    $message = "Hello,\n\nHere is your movie ticket information:\n\nTitle: $movie \nSeat: $selected \nDate: $date \nTime:$time \nCustomer Name: $name \nPayment: $payment";
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Email sent successfully.');</script>";
    } else {
        echo "Email sending failed: " . error_get_last()['message'];
    }
    $to      = 'f32ee@localhost';
    $subject = 'Your Movie Ticker';
    $message = 'Hello,\n\nHere is your movie ticket information:\n\nTitle: $movie \nSeat: $selected \nDate: $date \nTime:$time \nCustomer Name: $name \nPayment: $payment';

    $headers = 'From: f32ee@localhost' . "\r\n" .
        'Reply-To: f32ee@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers, $additional_parameters);
    echo ("mail sent to : ".$to);
}
?>