<?php
require_once 'includes/library.php';
session_start();
$app = new AppLib();
$dbh = Database();
$is_login = $app->is_user();
if (!$is_login) {
	header('location:login.php');
}
$nganu = $_GET['id'];
$sql = "SELECT * FROM employees INNER JOIN salary ON employees.Employee_Id = salary.Employee_Id WHERE employees.Employee_Id='$nganu'";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
	foreach ($results as $row) {
		$namaa = htmlentities($row->FirstName) . " " . htmlentities($row->LastName);
		$foto = $row->Picture;
		$newdate = date("l d-m-Y", strtotime($row->Joining_Date));
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
			<title><?php echo htmlentities($namaa); ?> Profile - HaRaM</title>
			<!-- Favicon -->
			<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="assets/css/bootstrap.min.css">
			<!-- Fontawesome CSS -->
			<link rel="stylesheet" href="assets/css/font-awesome.min.css">
			<!-- Lineawesome CSS -->
			<link rel="stylesheet" href="assets/css/line-awesome.min.css">
			<!-- Select2 CSS -->
			<link rel="stylesheet" href="assets/css/select2.min.css">
			<!-- Datetimepicker CSS -->
			<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
			<!-- Tagsinput CSS -->
			<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
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
				<div class="page-wrapper" id="print">
					<!-- Page Content -->
					<div class="content container-fluid">
						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col-sm-12">
									<h3 class="page-title">Profile</h3>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
										<li class="breadcrumb-item active">Profile</li>
									</ul>
								</div>
								<div class="col-auto float-right ml-auto">
									<div class="btn-group btn-group-sm">
										<button class="btn btn-white" onclick="printDiv('print')"><i class=" fa fa-print fa-lg"></i> Print</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						<div class="card mb-0">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="profile-view">
											<div class="profile-img-wrap">
												<div class="profile-img">
													<a href="javascript:void(0)"><img alt="Picture" src="uploads/employees/<?= $foto; ?>"></a>
												</div>
											</div>
											<div class="profile-basic">
												<div class="row">
													<div class="col-md-5">
														<div class="profile-info-left">
															<h3 class="user-name m-t-0 mb-0"><strong><?php echo htmlentities($row->FirstName) . " " . htmlentities($row->LastName); ?></strong></h3>
															<h6 class="text-muted"><?php echo htmlentities($row->Department); ?></h6>
															<small class="text-muted"><?php echo htmlentities($row->Designation); ?></small>
															<div class="staff-id">Employee ID : <?php echo htmlentities($row->Employee_Id); ?></div>
															<div class="small doj text-muted">Date of Join : <?php echo htmlentities($newdate); ?></div>
															<div class="staff-msg"><a class="btn btn-custom" href="mailto:<?php echo htmlentities($row->Email); ?>?subject=Hello%20sir%2C%20help%20me%20plz">Send Message</a></div>
														</div>
													</div>
													<div class="col-md-7">
														<ul class="personal-info">
															<li>
																<div class="title">Phone:</div>
																<div class="text"><a href="https://api.whatsapp.com/send/?phone=<?php echo htmlentities($row->Phone); ?>=&text=Hello%20World"><?php echo htmlentities($row->Phone); ?></a></div>
															</li>
															<li>
																<div class="title">Email:</div>
																<div class="text"><a href="mailto:<?php echo htmlentities($row->Email); ?>?subject=Hello%20sir%2C%20help%20me%20plz"><?php echo htmlentities($row->Email); ?></a></div>
															</li>
															<li>
																<div class="title">Address:</div>
																<div class="text"><?php echo htmlentities($row->address); ?></div>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card tab-box">
							<div class="row user-tabs">
								<div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
									<ul class="nav nav-tabs nav-tabs-bottom">
										<li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
									</ul>
								</div>
							</div>
						</div>
				<?php
			}
		}
				?>
					</div>
					<!-- /Page Content -->
				</div>
				<!-- /Page Wrapper -->
			</div>
			<!-- /Main Wrapper -->
			<!-- jQuery -->
			<!-- <script src="assets/js/jquery-3.2.1.min.js"></script> -->
			<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
			<!-- Bootstrap Core JS -->
			<script src="assets/js/popper.min.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
			<!-- Slimscroll JS -->
			<script src="assets/js/jquery.slimscroll.min.js"></script>
			<!-- Select2 JS -->
			<script src="assets/js/select2.min.js"></script>
			<!-- Datetimepicker JS -->
			<script src="assets/js/moment.min.js"></script>
			<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
			<!-- Tagsinput JS -->
			<script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
			<!-- Custom JS -->
			<script src="assets/js/app.js"></script>
			<script>
				function printDiv(divName) {
					var printContents = document.getElementById(divName).innerHTML;
					var originalContents = document.body.innerHTML;

					document.body.innerHTML = printContents;

					window.print();

					document.body.innerHTML = originalContents;
				};
			</script>
		</body>

		</html>