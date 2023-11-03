<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["CustName"];
    $email = $_POST["CustEmail"];
    $phoneno = $_POST["phoneno"];
    $enquiry = $_POST["type"];
    $comments = $_POST["comment"];

    // Recipient email addresses (user and owner)
    $user_email = $email; // User's email
    $user_email2 = "f32ee@localhost";
    $owner_email = "f31ee@localhost"; // Owner's email

    $subject = "New Enquiry: $enquiry";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Email: $phoneno\n";
    $message .= "Type of Enquiry: $enquiry\n";
    $message .= "Comments: $comments";

    // Additional headers
    $headers = "From: f31ee@localhost" . "\r\n"; // Replace with your email address
    $headers .= "Reply-To: $user_email2" . "\r\n";

    // Set the return path using the -f parameter
    $additional_parameters = "-ff31ee@localhost"; // Replace with your email address

    // Send email to user
    mail($user_email2, $subject, $message, $headers, $additional_parameters);

    // Send email to owner
    mail($owner_email, $subject, $message, $headers, $additional_parameters);

    // Display a confirmation message using JavaScript
    echo '<script>alert("Thank you for your submission. We will get in touch with you shortly.");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=/seenima/aboutus.php" />';
}
?>
?>
