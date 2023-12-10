<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate form data
    if (empty($name) || empty($email) || empty($message)) {
        // Return an error message if any required field is empty
        echo "Please fill in all the fields.";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Return an error message for invalid email format
        echo "Invalid email address.";
        exit;
    }

    // Send email (replace with your email and subject)
    $to = "pragyas9525@email.com";
    $subject = "New Contact Form Submission";
    $headers = "From: $email";

    // Email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n\n";
    $email_body .= "Message:\n$message";

    // Send email and handle success or failure
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        // Return an error message if the email could not be sent
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    // Handle the case when the form is not submitted via POST
    echo "Invalid request.";
}
?>
