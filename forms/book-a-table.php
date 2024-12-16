<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your email address to receive the bookings
    $receiving_email_address = 'puvvalanarendra014@gmail.com';

    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $people = htmlspecialchars($_POST['people']);
    $message = htmlspecialchars($_POST['message']);

    // Email subject
    $subject = "New Slot Booking Request from $name";

    // Email body
    $email_body = "<h2>New Slot Booking Request</h2>";
    $email_body .= "<p><strong>Name:</strong> $name</p>";
    $email_body .= "<p><strong>Email:</strong> $email</p>";
    $email_body .= "<p><strong>Phone:</strong> $phone</p>";
    $email_body .= "<p><strong>Date:</strong> $date</p>";
    $email_body .= "<p><strong>Time:</strong> $time</p>";
    $email_body .= "<p><strong># of People:</strong> $people</p>";
    $email_body .= "<p><strong>Message:</strong> $message</p>";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $name <$email>" . "\r\n";

    // Send email
    if (mail($receiving_email_address, $subject, $email_body, $headers)) {
        // Success response
        echo 'Your booking request was sent. We will call back to confirm your reservation. Thank you!';
    } else {
        // Failure response
        echo 'Error: Your booking request could not be sent. Please try again later.';
    }
} else {
    // Restrict direct access to the PHP file
    echo 'Access Denied!';
}
?>
