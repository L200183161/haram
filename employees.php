<?php
require_once 'includes/library.php';
session_start();
$app = new AppLib();
$dbh = Database();
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
	<title>Employees - HRMS admin template</title>

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

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

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
		<?php include_once("includes/header.php"); ?>
		<!-- /Header -->

		<!-- Sidebar -->
		<?php include_once("includes/sidebar.php"); ?>
		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper">

			<!-- Page Content -->
			<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Employee</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Employee</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
							<div class="view-icons">
								<a href="employees.php" title="Grid View" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
								<a href="employees-list.php" title="Tabular View" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<!-- Search Filter -->
				<div class="row filter-row">
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">Employee ID</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">Employee Name</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus select-focus">
							<select class="select floating">
								<option>Select Designation</option>
								<option>Web Developer</option>
								<option>Web Designer</option>
								<option>Android Developer</option>
								<option>Ios Developer</option>
							</select>
							<label class="focus-label">Designation</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<a href="#" class="btn btn-success btn-block"> Search </a>
					</div>
				</div>
				<!-- Search Filter -->
				<!-- user profiles list starts her -->

				<div class="row staff-grid-row">
					<?php
					$sql = "SELECT * FROM employees";
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$cnt = 1;
					if ($query->rowCount() > 0) {
						foreach ($results as $row) {
					?>
							<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
								<div class="profile-widget">
									<div class="profile-img">
										<a href="profile.html" class="avatar"><img src="uploads/employees/<?php echo htmlentities($row->Picture); ?>" alt="picture"></a>
									</div>
									<div class="dropdown profile-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
									</div>
									<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html"><?php echo htmlentities($row->FirstName) . " " . htmlentities($row->LastName); ?></a></h4>
									<div class="small text-muted"><?php echo htmlentities($row->Designation); ?></div>
								</div>
							</div>
					<?php $cnt += 1;
						}
					} ?>
				</div>

			</div>
			<!-- /Page Content -->

			<!-- Add Employee Modal -->
			<?php
			//adding employees code starts from here
			if (isset($_POST['add_employee'])) {
				$firstname = htmlspecialchars($_POST['firstname']);
				$lastname = htmlspecialchars($_POST['lastname']);
				$username = htmlspecialchars($_POST['username']);
				$email = htmlspecialchars($_POST['email']);
				$password = htmlspecialchars($_POST['password']);
				$confirm_password = htmlspecialchars($_POST['confirm_pass']);
				$employee_id = htmlspecialchars($_POST['employee_id']);
				$phone = htmlspecialchars($_POST['phone']);
				$department = htmlspecialchars($_POST['department']);
				$designation = htmlspecialchars($_POST['designation']);
				//grabbing the picture
				$file = $_FILES['picture']['name'];
				$file_loc = $_FILES['picture']['tmp_name'];
				$folder = "uploads/employees/";
				$new_file_name = strtolower($file);
				$final_file = str_replace(' ', '-', $new_file_name);

				if (move_uploaded_file($file_loc, $folder . $final_file) && ($password == $confirm_password)) {
					$image = $final_file;
					$password = password_hash($password, PASSWORD_DEFAULT);
				}
				$sql = "INSERT INTO `employees` (`id`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `Employee_Id`, `Phone`, `Department`, `Designation`, `Picture`, `DateTime`)
				VALUES (NULL, :firstname, :lastname, :username, :email,:password, :id, :phone, :department, :designation, :pic, current_timestamp())";
				$query = $dbh->prepare($sql);
				$query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
				$query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
				$query->bindParam(':username', $username, PDO::PARAM_STR);
				$query->bindParam(':email', $email, PDO::PARAM_STR);
				$query->bindParam(':password', $password, PDO::PARAM_STR);
				$query->bindParam(':id', $employee_id, PDO::PARAM_STR);
				$query->bindParam(':phone', $phone, PDO::PARAM_STR);
				$query->bindParam(':department', $department, PDO::PARAM_STR);
				$query->bindParam(':designation', $designation, PDO::PARAM_STR);
				$query->bindParam(':pic', $image, PDO::PARAM_STR);
				$query->execute();
				$lastInsert = $dbh->lastInsertId();
				if ($lastInsert > 0) {
					echo "<script>
				alert('Employee Has Been Added.');
				</script>";
					echo "<script>
				window.location.href = 'employees.php';
				</script>";
				} else {
					echo "<script>
				alert('Something Went Wrong');
				</script>";
				}
			}
			//ading employees code eds here


			$set = '1234567890';
			$id = substr(str_shuffle($set), 0, 6); ?>
			<div id="add_employee" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Employee</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">First Name <span class="text-danger">*</span></label>
											<input name="firstname" required class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Last Name</label>
											<input name="lastname" required class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Username <span class="text-danger">*</span></label>
											<input name="username" required class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Email <span class="text-danger">*</span></label>
											<input name="email" required class="form-control" type="email">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Password</label>
											<input class="form-control" required name="password" type="password">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Confirm Password</label>
											<input class="form-control" required name="confirm_pass" type="password">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
											<input name="employee_id" readonly type="text" value="<?php echo 'EMP-' . $id; ?>" class="form-control">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Phone </label>
											<input name="phone" required class="form-control" type="text">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Department <span class="text-danger">*</span></label>
											<select required name="department" class="select">
												<option>Select Department</option>
												<?php
												$sql2 = "SELECT * from departments";
												$query2 = $dbh->prepare($sql2);
												$query2->execute();
												$result2 = $query2->fetchAll(PDO::FETCH_OBJ);
												foreach ($result2 as $row) {
												?>
													<option value="<?php echo htmlentities($row->Department); ?>">
														<?php echo htmlentities($row->Department); ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Designation <span class="text-danger">*</span></label>
											<select required name="designation" class="select">
												<option>Select Designation</option>
												<?php
												$sql2 = "SELECT * from designations";
												$query2 = $dbh->prepare($sql2);
												$query2->execute();
												$result2 = $query2->fetchAll(PDO::FETCH_OBJ);
												foreach ($result2 as $row) {
												?>
													<option value="<?php echo htmlentities($row->Designation); ?>">
														<?php echo htmlentities($row->Designation); ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-form-label">Employee Picture</label>
											<input class="form-control" required name="picture" type="file">
										</div>
									</div>
								</div>

								<div class="submit-section">
									<button type="submit" name="add_employee" class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add Employee Modal -->
			<!-- Edit Employee Modal -->
			<div id="edit_employee" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Employee</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">First Name <span class="text-danger">*</span></label>
											<input class="form-control" value="John" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Last Name</label>
											<input class="form-control" value="Doe" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Username <span class="text-danger">*</span></label>
											<input class="form-control" value="johndoe" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Email <span class="text-danger">*</span></label>
											<input class="form-control" value="johndoe@example.com" type="email">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Password</label>
											<input class="form-control" value="johndoe" type="password">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Confirm Password</label>
											<input class="form-control" value="johndoe" type="password">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
											<input type="text" value="FT-0001" readonly="" class="form-control floating">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
											<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Phone </label>
											<input class="form-control" value="9876543210" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Company</label>
											<select class="select">
												<option>Global Technologies</option>
												<option>Delta Infotech</option>
												<option selected="">International Software Inc</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Department <span class="text-danger">*</span></label>
											<select class="select">
												<option>Select Department</option>
												<option>Web Development</option>
												<option>IT Management</option>
												<option>Marketing</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Designation <span class="text-danger">*</span></label>
											<select class="select">
												<option>Select Designation</option>
												<option>Web Designer</option>
												<option>Web Developer</option>
												<option>Android Developer</option>
											</select>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Employee Modal -->
			<?php
			if (isset($_GET['delid'])) {
				$rid = $_GET['delid'];
				$sql = "DELETE FROM employees where id=:rid";
				$query = $dbh->prepare($sql);
				$query->bindParam(':rid', $rid, PDO::PARAM_STR);
				$query->execute();
				echo "<script>
				alert('Employee Has Been Deleted');
				</script>";
			} ?>
			<div class="modal custom-modal fade" id="delete_employee" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Employee <?php echo htmlentities($row->id); ?></h3>
								<p>Are you sure want to delete?</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-6">
										<a href="employees.php?delid=<?php echo htmlentities($row->id); ?>" class="btn btn-primary continue-btn">Delete</a>
									</div>
									<div class="col-6">
										<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
	<!-- Select2 JS -->
	<script src="assets/js/select2.min.js"></script>
	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
</body>

</html>