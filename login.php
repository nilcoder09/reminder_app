<?php
session_start();

$conn = new mysqli("localhost", "root", "", "project1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM registration WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row['passwordnew']) {
        // Correct login credentials (plaintext comparison)
            // $_SESSION['username'] = $username;
            header("Location: mainpage.html"); // Redirect to mainpage.php or your desired main page
            exit();
            } 
            else {
                echo "Incorrect password";
            }
    } else {
        echo "User not found";
    }
}

$conn->close();
?>
