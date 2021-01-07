<?php
require_once 'includes/library.php';
error_reporting(E_ALL ^ E_WARNING);
session_start();
$app = new AppLib();
$dbh = Database();
$is_login = $app->is_user();
if (!$is_login) {
	header('location:login.php');
} else if (isset($_GET['delid'])) {
	$rid = $_GET['delid'];
	$sql = "DELETE FROM salary where id=:rid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':rid', $rid, PDO::PARAM_STR);
	$query->execute();
	echo "<script>
		alert('Salary has been truncated');
		</script>";
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
	<title>Salary - HaRaM</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">
	<!-- Datatable CSS -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
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
				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Employee Salary</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Salary</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<?php if ($_SESSION['role'] == "admin") { ?>
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table dataTable">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Employee ID</th>
										<th>Email</th>
										<th>Join Date</th>
										<th>Role</th>
										<th>Salary</th>
										<th>Payslip</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM employees LEFT JOIN salary ON employees.Employee_Id = salary.Employee_Id UNION SELECT * FROM employees RIGHT JOIN salary ON employees.Employee_Id = salary.Employee_Id";
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
												<td><?php echo htmlentities($newdate); ?></td>
												<td><?php echo htmlentities($row->Designation); ?></td>
												<td><?php echo "Rp " . number_format((htmlentities($row->salary)), 2, ',', '.'); ?></td>
												<td><a target="_blank" class="btn btn-sm btn-primary" href="salary-view.php?&id=<?= htmlentities($row->Employee_Id); ?>">Generate Slip</a></td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" id="edit_salaryButton" href="javascript:void(0)" data-id="<?= htmlentities($row->id); ?>" data-firstname="<?= htmlentities($row->FirstName); ?>" data-lastname="<?= htmlentities($row->LastName); ?>" data-employeeid="<?= htmlentities($row->FirstName) . " " . htmlentities($row->LastName); ?>" data-salary="<?= htmlentities($row->salary); ?>" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<!-- Ini buat ambil data script dibawah dicoba dulu boi -->
															<a class="dropdown-item disabled" href="javascript:void(0)" onclick="confirm_modal('salary.php?&delid=<?= htmlentities($row->id); ?>');" data-id="<?php echo htmlentities($row->id); ?>" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Content -->
		<?php
		//adding employees code starts from here
		if (isset($_POST['add_salary'])) {
			$employee_id = htmlspecialchars($_POST['employee_pilih']);
			$salary = htmlspecialchars($_POST['salary']);
			$sql = "INSERT INTO `salary` (`Employee_Id`, `salary`, `date`)
				VALUES (:id, :salary, DEFAULT)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':id', $employee_id, PDO::PARAM_STR);
			$query->bindParam(':salary', $salary, PDO::PARAM_INT);
			$query->execute();
			// echo $query;
			$lastInsert = $dbh->lastInsertId();
			if ($lastInsert > 0) {
				echo "<script>alert('Salary succesfully Added.');</script>";
				echo "<script>window.location.href = 'salary.php';</script>";
			} else {
				echo "<script>alert('Something Went Wrong');</script>";
				echo "<script>window.location.href = 'salary.php';</script>";
				// echo 'Error :';
				// echo '<pre>';
				// print_r($query->errorInfo());
				// print_r($query->debugDumpParams());
				// echo '</pre>';
			}
		}
		?>
		<!-- //ading employees code eds here -->
		<!-- Add Salary Modal -->
		<div id="add_salary" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Staff Salary</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Employees List</label>
										<select class="select" name="employee_pilih">
											<option>Select Staff</option>
											<?php
											$sql2 = "SELECT * from employees";
											$query2 = $dbh->prepare($sql2);
											$query2->execute();
											$result2 = $query2->fetchAll(PDO::FETCH_OBJ);
											foreach ($result2 as $row) {
											?>
												<option value="<?php echo htmlentities($row->Employee_Id); ?>">
													<?php echo htmlentities($row->FirstName) . " " . htmlentities($row->LastName); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<label for="salary">Basic Salary</label>
									<input name="salary" id="salary" class="form-control" type="text">
								</div>
							</div>
							<div class="submit-section">
								<button name="add_salary" class="btn btn-primary submit-btn">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Salary Modal -->

		<?php
		//adding employees code starts from here
		if (isset($_POST['edit_salary'])) {
			$id = htmlspecialchars($_POST['id']);
			$employee_id = htmlspecialchars($_POST['employee_pilih']);
			$salary = htmlspecialchars($_POST['salary']);
			$sql = "UPDATE `salary` set `id`=:id, `Employee_Id`=:employee_id, `salary`=:salary WHERE `id`=:id";
			$query = $dbh->prepare($sql);
			$query->bindParam(':id', $id, PDO::PARAM_STR);
			$query->bindParam(':employee_id', $employee_id, PDO::PARAM_STR);
			$query->bindParam(':salary', $salary, PDO::PARAM_INT);
			$query->execute();
			// echo $query;
			return $query->rowCount();
			$lastInsert = $dbh->lastInsertId();
			if ($lastInsert > 0) {
				echo "<script>alert('Edit Salary is success.');</script>";
				echo "<script>window.location.href = 'salary.php';</script>";
			} else {
				echo "<script>alert('Something is Wrong');</script>";
				echo "<script>window.location.href = 'salary.php';</script>";
				// echo 'Error :';
				// echo '<pre>';
				// print_r($query->errorInfo());
				// print_r($query->debugDumpParams());
				// echo '</pre>';
			}
		}
		?>
		<!-- //ading employees code eds here -->

		<!-- Edit Salary Modal -->
		<div id="edit_salary" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Staff Salary</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label hidden for="id">ID</label>
										<input hidden name="id" id="id" class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Employees List</label>
										<select class="select" name="employee_pilih">
											<option>Select Staff</option>
											<?php
											$sql2 = "SELECT * from employees";
											$query2 = $dbh->prepare($sql2);
											$query2->execute();
											$result2 = $query2->fetchAll(PDO::FETCH_OBJ);
											foreach ($result2 as $row) {
											?>
												<option value="<?php echo htmlentities($row->Employee_Id); ?>">
													<?php echo htmlentities($row->FirstName) . " " . htmlentities($row->LastName); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<label for="salary">Basic Salary</label>
									<input name="salary" id="salary" class="form-control" type="text">
								</div>
							</div>
							<div class="submit-section">
								<button name="edit_salary" class="btn btn-primary submit-btn">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Salary Modal -->
		<!-- Delete Salary Modal -->
		<div class="modal custom-modal fade" id="delete_salary" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body">
						<div class="form-header">
							<h3>Delete Salary</h3>
							<p>Are you sure want to delete?</p>
						</div>
						<div class="modal-btn delete-action">
							<div class="row">
								<div class="col-6">
									<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
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
		<!-- /Delete Salary Modal -->
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
	<!-- Datatable JS -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
	<script>
		$(document).ready(function() {

			$('.dataTable').DataTable({
				"pagingType": "full_numbers",
				"lengthMenu": [
					[5, 10, 25, 50, -1],
					[5, 10, 25, 50, "All"]
				],
				responsive: true,
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
		$(document).on("click", "#edit_salaryButton", function() {
			let id = $(this).data('id');
			let employeeid = $(this).data('employeeid');
			let salary = $(this).data('salary');

			$(".modal-body #id").val(id);
			$(".modal-body #employee_pilih").val(employeeid);
			$(".modal-body #salary").val(salary);
		});
	</script>
</body>

</html>