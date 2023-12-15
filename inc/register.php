<?php
session_start();

require("connection.php");

class Registration
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function registerUser($username, $password, $email)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hash', '$email')";
        $result = mysqli_query($this->conn, $sql);

        return $result;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $registration = new Registration($conn);
    $registrationResult = $registration->registerUser($username, $password, $email);

    if ($registrationResult) {
        echo 'Registration successful!';
        header('Location: ../login.php');
    } else {
        echo 'Registration failed!';
    }
}
?>

