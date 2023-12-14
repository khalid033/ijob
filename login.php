<?php
session_start();
if (isset($_SESSION['username'])) {
  header('Location: index.php');
}
require("./inc/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      echo 'Login successful!';
      $_SESSION['username'] = $username;
      header('Location: index.php');
    } else {
      echo 'Login failed!';
    }
  } else {
    echo 'Login failed!';
  }
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | CodingLab</title>
  <link rel="stylesheet" href="styles/loginstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>

  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Login Form</span></div>
      <h1></h1>
      <form action="" method="POST">
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="username" placeholder="Email or username" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="pass"><a href="#">Forgot password?</a></div>

        <button type="submit"> submit</button>
        <span style="color:red;"></span>
        <div class="signup-link">Not a member? <a href="/job/register.php">Signup now</a></div>
      </form>
    </div>
  </div>





</body>

</html>