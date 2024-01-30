<?php
$conn == new mysqli("localhost", "root", "", "project1");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "post") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO project1 (username, passwordnew, email, phone) VALUES ('$username', '$password', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        echo "error";
    }
}

$conn->close();
?>