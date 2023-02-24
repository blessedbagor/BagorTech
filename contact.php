<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    
    if (!$name || !$email || !$message) {
        // If any required field is missing or empty
        http_response_code(400); // Bad Request
        echo '<div class="alert alert-danger">Please fill in all required fields.</div>';
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // If email is not valid
        http_response_code(400); // Bad Request
        echo '<div class="alert alert-danger">Please enter a valid email address.</div>';
        exit;
    }
    
    $to = 'hello.bagortech@gmail.com';
    $subject = 'Contact Submission from BagorSRI.Tech';
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();
    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200); // OK
        echo '<div class="alert alert-success">Thank you for contacting us. We will get back to you soon.</div>';
    } else {
        http_response_code(500); // Internal Server Error
        echo '<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again later.</div>';
    }
}
?>
