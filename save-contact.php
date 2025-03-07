<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $timestamp = date("Y-m-d H:i:s");

    // Format the data
    $data = "Contact Message\n";
    $data .= "Timestamp: $timestamp\n";
    $data .= "Name: $name\n";
    $data .= "Email: $email\n";
    $data .= "Message: $message\n";
    $data .= "------------------------\n";

    // Save to file
    $file = 'contacts.txt';
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirect back to contact page with success message
    header("Location: contact-us.html?success=contact");
    exit();
} else {
    // If not a POST request, redirect to form
    header("Location: contact-us.html");
    exit();
}
?>