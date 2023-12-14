<?php
session_start();

require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];



    $sql = "INSERT INTO users (username,password,email) VALUES ('$username','$hash','$email')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 'Registration successful!';
        header('Location: ../login.php');
        
    } else {
        echo 'Registration failed!';
    }
}
