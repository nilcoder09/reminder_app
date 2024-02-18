<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // You can add additional validation or processing here

    // Compose email content
    $to = ""; // Replace with your help center's email address
    $subject = "New Form Submission";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $messageBody = "Name: $name\nEmail: $email\nMessage: $message";

    // Send email
    if (mail($to, $subject, $messageBody, $headers)) {
        // Redirect to a thank you page or display a success message
        echo "done!"; 
        //header("Location: thank_you.php");
        exit();
    } else {
        // Handle email sending failure
        echo "Error: Unable to send email. Please try again later.";
    }
}
?>
