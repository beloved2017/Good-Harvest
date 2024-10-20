<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['fname']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['contact_message']);

    // Email setup
    $to = "jaytopresources@gmail.com";
    $subject = "New Contact Form Submission from " . $name;
    
    // Email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email body
    $body = "<h2>New Contact Form Submission</h2>
             <p><strong>Name:</strong> {$name}</p>
             <p><strong>Email:</strong> {$email}</p>
             <p><strong>Message:</strong> {$message}</p>";

    // Send mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Message successfully sent!";
    } else {
        echo "Message sending failed. Please try again.";
    }
}
?>
