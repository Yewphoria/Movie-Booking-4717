<?php
$email = $_SESSION['email'] ;
$name = $_SESSION['name'];
$payment = $_SESSION['payment'];
$timing = $_SESSION['timing'];
$date = $_SESSION['date'];
$movie = $_SESSION['movie'];

$to      = 'f32ee@localhost';
$subject = 'Order Ticket Successful!';
$message = "
Dear $name,

Thank you for your purchase of $movie tickets for $date at $timing.
Payment with $payment.
We look forward to your visit.
Enjoy your movie and have a nice day!

Best Regards,
Seenima Cineplex";
$headers = 'From: f31ee@localhost' . "\r\n" .
    'Reply-To: f31ee@localhost' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers,'-ff31ee@localhost');


?>