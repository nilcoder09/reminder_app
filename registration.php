<?php
$conn = new mysqli("localhost", "root", "", "project1");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    // $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO registration (username, passwordnew, email, phone) VALUES ('$username', '$password', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: loginpage.html"); 
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        echo "error";
    }
}

$conn->close();
