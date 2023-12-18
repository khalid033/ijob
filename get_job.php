<?php

session_start();

class CandidateForm {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;

        // Check if the user is logged in
        if (!isset($_SESSION['username'])) {
            header('Location: ./login.php');
            exit();
        }
    }

    public function handleFormSubmission() {
        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $age = $_POST['age'];
            $post = $_POST['post'];
            $skills = $_POST['skills'];
            $motivation = $_POST['motivation'];

            $sql = "INSERT INTO `candidat`(`fullname`, `age`, `post`, `skills`, `motivation`) VALUES ('$fullname','$age','$post','$skills','$motivation')";
            
            $result = mysqli_query($this->conn, $sql);

            if ($result) {
                header("location: index.php?msg=New record created successfully");
                exit();
            } else {
                echo "Failed: " . mysqli_error($this->conn);
            }
        }
    }
}

include "inc/connection.php";
$candidateForm = new CandidateForm($conn);
$candidateForm->handleFormSubmission();

?>




<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		JobEase
	</title>

	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
	<header>


		<nav class="navbar navbar-expand-md navbar-dark">
			<div class="container">
				<!-- Brand/logo -->
				<a class="navbar-brand" href="#">
					<i class="fas fa-code"></i>
					<h1>JobEase &nbsp &nbsp</h1>
				</a>

				<!-- Toggler/collapsibe Button -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- Navbar links -->
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Features</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								language
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">FR</a>
								<a class="dropdown-item" href="#">EN</a>
							</div>
						</li>
						<span class="nav-item active">
							<a class="nav-link" href="#">EN</a>
						</span>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">log out</a>
							<a class="nav-link" href="login.php">Login</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

    <div class="container mt-5">
    <h2>i want to apply for this job </h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="fullName">Full Name:</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="position">Desired Position:</label>
            <input type="text" class="form-control" id="post" name="post" required>
        </div>
        <div class="form-group">
            <label for="skills">Skills:</label>
            <textarea class="form-control" id="skills" name="skills" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="motivation">Motivation:</label>
            <textarea class="form-control" id="motivation" name="motivation" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
    </form>
</div>









	<footer class="mt-5">
		<p>© 2023 JobEase </p>
	</footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>