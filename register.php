<?php
// require_once 'includes/library.php';
// require 'includes/config.php';
// session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// $app = new AppLib();
// $is_login = $app->is_user();
// if ($is_login) {
// 	session_destroy();
// }
$koneksi = new mysqli("localhost", "root", "", "smarthr");
if ($koneksi->connect_errno) {
	echo die("Failed to connect to MySQL: " . $koneksi->connect_error);
}

function registration($data)
{
	$koneksi = new mysqli("localhost", "root", "", "smarthr");
	$username = strtolower(stripslashes($data["username"]));
	$firstname = mysqli_real_escape_string($koneksi, $data["firstname"]);
	$lastname = mysqli_real_escape_string($koneksi, $data["lastname"]);
	$email = mysqli_real_escape_string($koneksi, $data["email"]);
	$phone = mysqli_real_escape_string($koneksi, $data["phone"]);
	$address = mysqli_real_escape_string($koneksi, $data["address"]);
	$password = mysqli_real_escape_string($koneksi, $data["password"]);
	$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
	$result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('this $username is already registered')
		      </script>";
		return false;
	}
	if ($password !== $password2) {
		echo "<script>
				alert('Confirmation password is not same as $password');
		      </script>";
		return false;
	}
	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($koneksi, "INSERT INTO `users`(`firstname`, `lastname`, `username`, `email`, `password`, `phone`, `address`, `role`,`picture`,`datetime`,) VALUES('$firstname','$lastname','$username','$email','$password','$phone', '$address', DEFAULT, DEFAULT, DEFAULT)");

	return mysqli_affected_rows($koneksi);
}

if (isset($_POST["registration"])) {
	if (registration($_POST) > 0) {
		echo "<script>
				alert('User SUCCESSFULLY added!');window.location='login.php';
			  </script>";
	} else {
		echo mysqli_error($koneksi);
	}
} ?>
<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Register - HaRaM</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="account-page">
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">
			<a href="job-list.php" class="btn btn-primary apply-btn">Apply Job</a>
			<div class="container">
				<!-- Account Logo -->
				<div class="account-logo">
					<a href="index.php"><img src="assets/img/logo2.png" alt="HaRaM"></a>
				</div>
				<!-- /Account Logo -->
				<div class="account-box">
					<div class="account-wrapper">
						<h3 class="account-title">Register</h3>
						<p class="account-subtitle">Access to our dashboard</p>
						<!-- Account Form -->
						<form method="POST" action="" enctype="multipart/form-data">
							<div class="form-group">
								<label>First Name</label>
								<input class="form-control" type="text" name="firstname" required>
							</div>
							<div class="form-group">
								<label>Last Name</label>
								<input class="form-control" type="text" name="lastname" required>
							</div>
							<div class="form-group">
								<label>Username</label>
								<input class="form-control" type="text" name="username" required>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" type="email" name="email" required autofocus>
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input class="form-control" type="text" name="phone" required>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input class="form-control" type="text" name="address" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" type="password" name="password" required>
							</div>
							<div class="form-group">
								<label>Repeat Password</label>
								<input class="form-control" type="password" name="password2" required>
							</div>
							<div class="form-group text-center">
								<button class="btn btn-primary account-btn" type="submit" name="registration">Register</button>
							</div>
						</form>
						<!-- /Account Form -->
						<div class="account-footer">
							<p>Already have an account? <a href="login.php">Login</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->
	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
</body>

</html>