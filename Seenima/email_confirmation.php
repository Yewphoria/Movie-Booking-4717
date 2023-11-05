<?php
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$payment = $_SESSION['payment'];
$time = $_SESSION['time'];
$date = $_SESSION['date'];
$movie = $_SESSION['movie'];

// Retrieve the selected seats from the session
$selectedSeats = $_SESSION['selected_seats'];

// Format the selected seats as a comma-separated string
$selectedSeatsString = implode(', ', $selectedSeats);

$to = 'f32ee@localhost';
$subject = 'Order Ticket Successful!';
$message = "
Dear $name,

Thank you for your purchase of $movie tickets for $date at $time. Your seat(s): $selectedSeatsString.
Payment with $payment.
We look forward to your visit.
Enjoy your movie and have a nice day!

Best Regards,
Seenima Cineplex";
$headers = 'From: f31ee@localhost' . "\r\n" .
    'Reply-To: f31ee@localhost' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers, '-ff31ee@localhost');


?>