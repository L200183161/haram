<?php
session_start();
global $wrongpassword, $wrongusername;
require_once 'includes/library.php';
$app = new AppLib();
$dbh = Database();
$is_login = $app->is_user();
if ($is_login) {
	session_destroy();
}
if (isset($_POST['login'])) {
	global $dbh;
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$sql = "SELECT * from users where username = '$username'";
	// $query = $dbh->prepare($sql);
	// $query->bindParam(':username',$username,PDO::PARAM_STR);
	// $query-> execute();
	// $results = $query->fetchAll(PDO::FETCH_OBJ);
	$results = $dbh->query($sql); //Really Important part to make query just like fetcharray
	if ($results->rowCount() > 0) {
		foreach ($results as $row) {
			$_SESSION['role'] = $row['role'];
			$_SESSION['userlogin'] = $_POST['username'];
			$_SESSION['photo'] = $row['picture'];
			if (password_verify($password, $row['password'])) {
				if ($row['role'] == 'admin') {
					$_SESSION['userlogin'] = $_POST['username'];
					$_SESSION['role'] = "admin";
					header("location:index.php");
				} else if ($row['role'] == 'employee') {
					$_SESSION['userlogin'] = $_POST['username'];
					$_SESSION['role'] = "employee";
					header("location:dashboard.php");
				}
			} else {
				$wrongpassword = '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Oh Snapp!😕</strong> Alert <b class="alert-link">Password: </b>You entered wrong password.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>';
			}
		} //verifying Password

	}
	//if username or email not found in database
	else {
		$wrongusername = '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Oh Snapp!🙃</strong> Alert <b class="alert-link">User </b> is not found in our database.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Login - HaRaM</title>
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
			<div class="container">
				<!-- Account Logo -->
				<div class="account-logo">
					<a href="index.php"><img src="assets/img/logo2.png" alt="HaRaM"></a>
				</div>
				<!-- /Account Logo -->
				<div class="account-box">
					<div class="account-wrapper">
						<h3 class="account-title">Login</h3>
						<p class="account-subtitle">Access to our dashboard</p>
						<!-- Account Form -->
						<form method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label>User Name</label>
								<input class="form-control" name="username" required type="text">
							</div>
							<?php if ($wrongusername) {
								echo $wrongusername;
							} ?>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<label>Password</label>
									</div>
								</div>
								<input class="form-control" name="password" required type="password">
							</div>
							<?php if ($wrongpassword) {
								echo $wrongpassword;
							} ?>
							<div class="form-group">
								<div class="form-check">
									<input id="remember_me" class="form-check-input" type="checkbox">
									<label class="form-check-label" name="remember_me" for="remember_me">Remember Me
									</label>
								</div>
							</div>
							<div class="form-group text-center">
								<button class="btn btn-primary account-btn" name="login" type="submit">Login</button>
								<div class="col-auto pt-2">
									<a class="text-muted float-right" href="forgot-password.php">
										Forgot password?
									</a>
								</div>
							</div>
							<div class="account-footer" style="color:tomato;">
								<p class="mt-3 mb-3 text-muted text-center">Don't have account yet? <a href="register.php">Register here!</a></p>
								<p>Having Trouble? <a href="mailto:donnyrizaladhip@rocketmail.com?subject=Hello%20sir%2C%20help%20me%20plz">Contact Us</a></p>
							</div>
						</form>
						<!-- /Account Form -->
					</div>
				</div>
			</div>
			<div class="alert alert-danger alert alert-dismissable col-md-10 offset-md-1" role="alert">
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button>
				<p id="notice" class="d-flex mr-3 mb-0 font-weight-bold" class="btn btn-flat" "><b>Important Notice</b></p>
                    		<div class=" media-body">
				<p>See this link for more information regarding government policy to handle the outbreak of COVID-19
					<a class="btn-flat" href="https://www.indonesia.travel/gb/en/coronavirus">here</a>
				</p>
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