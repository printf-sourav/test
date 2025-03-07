<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $dogName = $_POST['dog-name'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $timestamp = date("Y-m-d H:i:s");

    // Format the data
    $data = "Adoption Application\n";
    $data .= "Timestamp: $timestamp\n";
    $data .= "Dog: $dogName\n";
    $data .= "Name: $name\n";
    $data .= "Email: $email\n";
    $data .= "Phone: $phone\n";
    $data .= "Address: $address\n";
    $data .= "------------------------\n";

    // Save to file
    $file = 'adoptions.txt';
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirect back to home with success message
    header("Location: index.html?success=adoption");
    exit();
} else {
    // If not a POST request, redirect to form
    header("Location: adoption-form.html");
    exit();
}
?>