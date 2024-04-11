<?php

// Process the form submission only if the submit button is clicked
if (isset($_POST['submit'])) {

  // Get form data (sanitize user input!)
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

  // Set email configuration (replace with your details)
  $to = "paurvin@gmail.com"; // Replace with your recipient email
  $subject = "Contact Form Submission from " . $name;
  $headers = "From: " . $email . "\r\n";
  $headers .= "Reply-To: " . $email . "\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  // Create email body message
  $body = "Name: " . $name . "\r\n";
  $body .= "Email: " . $email . "\r\n";
  $body .= "Message: \r\n" . $message;

  // Send email using mail() function (consider using PHPMailer for more features)
  if (mail($to, $subject, $body, $headers)) {
    echo "Thank you for contacting us! We will get back to you shortly.";
  } else {
    echo "There was an error sending your message. Please try again later.";
  }
}

?>

