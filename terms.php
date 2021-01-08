<?php
require_once 'includes/library.php';
session_start();
$app = new AppLib();
$is_login = $app->is_user();
if (!$is_login) {
	header('location:login.php');
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
	<title>Terms - HaRaM</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css" id="theme-link">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<!-- Header -->
		<?php
		// <!-- Header -->
		include_once 'includes/header.php';
		// <!-- /Header -->
		// <!-- Sidebar -->
		include_once 'includes/sidebar.php';
		// <!-- /Sidebar -->
		?>
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<!-- Page Content -->
			<div class="content container-fluid">
				<div class="small-container">
					<div class="inner-header text-center">
						<h1>Terms of Service</h1>
					</div>
					<div class="inner-content">
						<i>(Updated at 2021-01-01)</i>
						<h3>General Terms </h3>
						<p>By accessing and pacing an order with you confirm that you are in agreement with and bound by the terms of service contained in the Terms & Conditions outlined below. These terms apply to the entire website and any email or other type of communication between you and .
						<p>Under no circumstances shall team be liable for any direct. indirect, special. incidental or consequential damages. including. but not limited to, loss of data or profd, arising out of the use, or the inability to use. the materials on this site. even if team or an authorized representative has been advised of the possibility of such damages. If your use of materials from this site results in the need for servicing. repair or correction of equipment or data. you assume any costs thereof. </p>
						<p>will not be responsible for any outcome that may occur during the course of usage of our resources. We reserve the rights to change prices and revise the resources usage policy in any moment. </p>
						<h3>License</h3>
						<p>HaRaM grants you a revocable. non-exclusive. non- transferable. limited license to download. install and use our service strictly in accordance with the terms of this Agreement. </p>
						<p>These Terms & Conditions are a contract between you and HaRaM (referred to in these Terms & Conditions as "HaRaM". MC. "we" or "our"). the provider of the HaRaM website and the services accessible from the HaRaM website (which are collectively referred to in these Terms & Conditions as the "HaRaM Service").</p>
						<p>You are agreeing to be bound by these Terms & Conditions. If you do not agree to these Terms & Conditions. please do not use the Service. In these Terms & Conditions. "you" refers both to you as an individual and to the entity you represent. If you violate any of these Terms & Conditions. we reserve the right to cancel your account or block access to your account without notice. </p>
					</div>
				</div>
			</div>
			<!-- /Page Content -->
		</div>
		<!-- /Page Wrapper -->
	</div>
	<!-- /Main Wrapper -->
	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Slimscroll JS -->
	<script src="assets/js/jquery.slimscroll.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
</body>

</html>