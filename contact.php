<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = 'hello.bagortech@gmail.com';
    $subject = 'New Contact Us Form Submission';
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";
    if (mail($to, $subject, $body, $headers)) {
        echo '<div class="alert alert-success">Thank you for contacting us. We will get back to you soon.</div>';
    } else {
        echo '<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again later.</div>';
    }
}
?>
