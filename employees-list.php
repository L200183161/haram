<?php
require_once 'includes/library.php';
session_start();
$app = new AppLib();
$dbh = Database();
$is_login = $app->is_user();
if (!$is_login) {
	header('location:login.php');
} elseif (isset($_GET['delid'])) {
	$rid = intval($_GET['delid']);
	$sql = "DELETE from employees where id=:rid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':rid', $rid, PDO::PARAM_STR);
	$query->execute();
	echo "<script>alert('Employee Has Been Deleted');</script>";
	echo "<script>window.location.href ='employees-list.php'</script>";
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
	<title>Employees - HaRaM</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">
	<!-- dataTable CSS -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
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
		include_once 'includes/header.php';
		// <!-- /Header -->
		// <!-- Sidebar -->
		include_once 'includes/sidebar.php';
		//<!-- /Sidebar -->
		?>
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
							<!-- Permission admin only -->
							<?php
							if ($_SESSION['role'] == "admin") { ?>
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
							<?php } ?>
							<a href="employees.php" title="Grid View" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
							<a href="employees-list.php" title="Tabular View" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<!-- Search Filter -->
			<!-- /Search Filter -->
			<a href="javascript:void(0)" class="btn btn-file" onclick="printDiv('print')"><i class="fa fa-print"></i> Print</a>
			<div class="row" id='print'>
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped custom-table mb-0 dataTable js-exportable">
							<thead>
								<tr>
									<th class="text-left">Number</th>
									<th class="text-left">Name</th>
									<th class="text-left">Employee ID</th>
									<th class="text-left">Email</th>
									<th class="text-left">Mobile</th>
									<th class="text-center">Join Date</th>
									<th class="text-left">Role</th>
									<th class="text-danger text-right no-sort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM employees";
								$query = $dbh->prepare($sql);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $row) {
										$foto = $row->Picture;
										$newdate = date("l d-m-Y", strtotime($row->Joining_Date));
								?>

										<tr>
											<td><?php echo htmlentities($cnt++); ?></td>
											<td>
												<h2 class="table-avatar">
													<a href="profile.php?&id=<?= htmlentities($row->Employee_Id); ?>" class="avatar"><img alt="picture" src="uploads/employees/<?php echo htmlentities($row->Picture); ?>"></a>
													<a href="profile.php?&id=<?= htmlentities($row->Employee_Id); ?>"><?php echo htmlentities($row->FirstName) . " " . htmlentities($row->LastName); ?><span><?php echo htmlentities($row->Designation); ?></span></a>
												</h2>
											</td>
											<td><?php echo htmlentities($row->Employee_Id); ?></td>
											<td><?php echo htmlentities($row->Email); ?></td>
											<td><?php echo htmlentities($row->Phone); ?></td>
											<td><?php echo htmlentities($newdate); ?></td>
											<td><?php echo htmlentities($row->Designation); ?></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" id="edit_employeesButton" href="javascript:void(0)" data-id="<?= htmlentities($row->id); ?>" data-firstname="<?= htmlentities($row->FirstName); ?>" data-lastname="<?= htmlentities($row->LastName); ?>" data-username="<?= htmlentities($row->UserName); ?>" data-email="<?= htmlentities($row->Email); ?>" data-password="" data-confirmpass="" data-employeeid="<?= htmlentities($row->Employee_Id); ?>" data-phone="<?= htmlentities($row->Phone); ?>" data-department="<?= htmlentities($row->Department); ?>" data-designation="<?= htmlentities($row->Designation); ?>" data-address="<?php echo htmlentities($row->address); ?>" data-picture="<?= htmlentities($row->Picture); ?>" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<!-- Ini buat ambil data script dibawah dicoba dulu boi -->
														<a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('employees-list.php?&delid=<?= htmlentities($row->id); ?>');" data-id="<?php echo htmlentities($row->id); ?>" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
								<?php
									}
								} ?>
							</tbody>
						</table>
					</div>
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
				$address = htmlspecialchars($_POST['address']);
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
				$sql = "INSERT INTO `employees` (`id`, `FirstName`, `LastName`, `UserName`, `Email`, `address`, `Password`, `Employee_Id`, `Phone`, `Department`, `Designation`, `Picture`, `DateTime`)
				VALUES (NULL, :firstname, :lastname, :username, :email, :address, :password, :id, :phone, :department, :designation, :pic, current_timestamp())";
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
				$query->bindParam(':address', $address, PDO::PARAM_STR);
				$query->bindParam(':pic', $image, PDO::PARAM_STR);
				$query->execute();
				$lastInsert = $dbh->lastInsertId();
				if ($lastInsert > 0) {
					echo "<script>
				alert('Employee Has Been Added.');
				</script>";
					echo "<script>window.location.href = 'employees-list.php';</script>";
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
											<input name="phone" required class="form-control" type="text" maxlength="13">
										</div>
									</div>

									<div class=" col-md-6">
										<div class="form-group">
											<label>Department <span class="text-danger">*</span></label>
											<select required name="department" class="select" aria-placeholder="Haluu">
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
											<label for="address">Address</label>
											<textarea required name="address" id="address" class="form-control"></textarea>
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
			<?php
			if (isset($_POST['edit_employee'])) {
				global $dbh;
				$id = htmlspecialchars($_POST['id']);
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
				$password = password_hash($password, PASSWORD_DEFAULT);
				$address = htmlspecialchars($_POST['address']);
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
				$sql = "UPDATE `employees` SET `id`=:id, `FirstName`=:firstname, `LastName`=:lastname, `UserName`=:username,
			 	`Email`=:email, `address`=:address `Password`=:password, `Employee_Id`=:employee_id, `Phone`=:phone, `Department`=:department, 
			 	`Designation`=:designation, `Picture`=:pic WHERE `id`=:id";
				$query = $dbh->prepare($sql);
				$query->bindParam(':id', $id, PDO::PARAM_STR);
				$query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
				$query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
				$query->bindParam(':username', $username, PDO::PARAM_STR);
				$query->bindParam(':email', $email, PDO::PARAM_STR);
				$query->bindParam(':password', $password, PDO::PARAM_STR);
				$query->bindParam(':employee_id', $employee_id, PDO::PARAM_STR);
				$query->bindParam(':phone', $phone, PDO::PARAM_STR);
				$query->bindParam(':department', $department, PDO::PARAM_STR);
				$query->bindParam(':designation', $designation, PDO::PARAM_STR);
				$query->bindParam(':address', $address, PDO::PARAM_STR);
				$query->bindParam(':pic', $image, PDO::PARAM_STR);
				$query->execute();
				return $query->rowCount();
				$lastInsert = $dbh->lastInsertId();
				if ($lastInsert > 0) {
					echo "<script>alert('Successfully Edited');</script>";
					echo "<script>
					window.location.href = 'employees-list.php';
					</script>";
				} else {
					// echo "<script>alert('Oh crap, something is wrong'); window.location='employees-list.php';</script>";
					echo 'Error :';
					echo '<pre>';
					print_r($query->errorInfo());
					print_r($query->debugDumpParams());
					echo '</pre>';
				}
			}  ?>

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
							<form method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label hidden for="id">ID</label>
											<input hidden name="id" id="id" class="form-control" type="text">
										</div>
										<div class="form-group">
											<label for="firstname" class="col-form-label">First Name <span class="text-danger">*</span></label>
											<input name="firstname" id="firstname" required class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="lastname" class="col-form-label">Last Name</label>
											<input name="lastname" id="lastname" required class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="username" class="col-form-label">Username <span class="text-danger">*</span></label>
											<input name="username" id="username" required class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
											<input name="email" id="email" required class="form-control" type="email">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="password" class="col-form-label">Password</label>
											<input class="form-control" required name="password" id="password" type="password">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="confirm_pass" class="col-form-label">Confirm Password</label>
											<input class="form-control" required name="confirm_pass" id="confirm_pass" type="password">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="employee_id" class="col-form-label">Employee ID <span class="text-danger">*</span></label>
											<input name="employee_id" id="employee_id" readonly type="text" class="form-control">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label for="phone" class="col-form-label">Phone </label>
											<input name="phone" id="phone" required class="form-control" type="text" maxlength="13">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="department">Department <span class="text-danger">*</span></label>
											<select required name="department" id="department" class="select">
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
											<label for="designation">Designation <span class="text-danger">*</span></label>
											<select required name="designation" id="designation" class="select">
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
											<label for="address">Address</label>
											<textarea required name="address" id="address" class="form-control"></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="picture" class="col-form-label"></label>
											<img class="img-preview" src="uploads/employees/<?= $foto; ?>" alt="Foto" width="100">
											<input class="form-control" name="picture" id="picture" type="file">
										</div>
									</div>
								</div>

								<div class="submit-section">
									<button type="submit" name="edit_employee" class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Employee Modal -->
			<div class="modal custom-modal fade" id="delete_employee" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Employee</h3>
								<p>Are you sure want to delete?</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-6">
										<a href="javascript:void(0)" class="btn btn-primary continue-btn" id="link_hapus">Delete</a>
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
	<!-- dataTable JS -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>

	<!-- katanya sih JS biar export but who knows mfaka -->
	<!-- <script src="assets/js/tables/jquery-datatable.js"></script> -->

	<script>
		$(document).ready(function() {

			$('.dataTable').DataTable({
				"pagingType": "full_numbers",
				"lengthMenu": [
					[5, 10, 25, 50, -1],
					[5, 10, 25, 50, "All"]
				],
				responsive: true,
				"bInfo": false,
				language: {
					search: "_INPUT_",
					searchPlaceholder: "Search in Here",
				}
			});
		});

		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		};
		$(document).on("click", "#edit_employeesButton", function() {
			let id = $(this).data('id');
			let firstname = $(this).data('firstname');
			let lastname = $(this).data('lastname');
			let username = $(this).data('username');
			let email = $(this).data('email');
			let password = $(this).data('password');
			let confirmpass = $(this).data('confirmpass');
			let employeeid = $(this).data('employeeid');
			let phone = $(this).data('phone');
			let department = $(this).data('department');
			let designation = $(this).data('designation');
			let address = $(this).data('address');
			let picture = $(this).data('picture');

			$(".modal-body #id").val(id);
			$(".modal-body #firstname").val(firstname);
			$(".modal-body #lastname").val(lastname);
			$(".modal-body #username").val(username);
			$(".modal-body #email").val(email);
			$(".modal-body #password").val(password);
			$(".modal-body #confirm_pass").val(confirmpass);
			$(".modal-body #employee_id").val(employeeid);
			$(".modal-body #phone").val(phone);
			$(".modal-body #department").val(department);
			$(".modal-body #designation").val(designation);
			$(".modal-body #address").val(address);
			$(".modal-body #picture").val(picture);

		});

		// Confirm for Deletion
		function confirm_modal(delete_url) {
			$('#delete_employee').modal('show', {
				backdrop: 'static'
			});
			document.getElementById('link_hapus').setAttribute('href', delete_url);
		};
	</script>
</body>

</html>