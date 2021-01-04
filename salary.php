<?php
require_once 'includes/library.php';
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
function penyebut($nilai)
{
	$nilai = abs($nilai);
	$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " " . $huruf[$nilai];
	} else if ($nilai < 20) {
		$temp = penyebut($nilai - 10) . " Belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai / 10) . " Puluh" . penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " Seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai / 100) . " Ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " Seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai / 1000) . " Ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai / 1000000) . " Juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai / 1000000000) . " Milyar" . penyebut(fmod($nilai, 1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai / 1000000000000) . " Trilyun" . penyebut(fmod($nilai, 1000000000000));
	}
	return $temp;
}

function terbilang($nilai)
{
	if ($nilai < 0) {
		$hasil = "minus " . trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}
	return $hasil;
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
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table datatable">
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
														<a href="profile.php" class="avatar"><img alt="picture" src="uploads/employees/<?php echo htmlentities($row->Picture); ?>"></a>
														<a href="profile.php"><?php echo htmlentities($row->FirstName) . " " . htmlentities($row->LastName); ?><span><?php echo htmlentities($row->Designation); ?></span></a>
													</h2>
												</td>
												<td><?php echo htmlentities($row->Employee_Id); ?></td>
												<td><?php echo htmlentities($row->Email); ?></td>
												<td><?php echo htmlentities($row->Joining_Date); ?></td>
												<td><?php echo htmlentities($row->Designation); ?></td>
												<td><?php echo "Rp " . number_format((htmlentities($row->salary)), 2, ',', '.'); ?></td>
												<td><a class="btn btn-sm btn-primary" href="salary-view.php?&id=<?= htmlentities($row->id); ?>">Generate Slip</a></td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" id="edit_employeesButton" href="javascript:void(0)" data-id="<?= htmlentities($row->id); ?>" data-firstname="<?= htmlentities($row->FirstName); ?>" data-lastname="<?= htmlentities($row->LastName); ?>" data-username="<?= htmlentities($row->UserName); ?>" data-email="<?= htmlentities($row->Email); ?>" data-password="" data-confirmpass="" data-employeeid="<?= htmlentities($row->Employee_Id); ?>" data-phone="<?= htmlentities($row->Phone); ?>" data-department="<?= htmlentities($row->Department); ?>" data-designation="<?= htmlentities($row->Designation); ?>" data-picture="<?= htmlentities($row->Picture); ?>" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<!-- Ini buat ambil data script dibawah dicoba dulu boi -->
															<a class="dropdown-item disabled" href="javascript:void(0)" onclick="confirm_modal('salary.php?&delid=<?= htmlentities($row->id); ?>');" data-id="<?php echo htmlentities($row->id); ?>" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>
									<?php
											echo terbilang(1000000000);
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
						<form>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Select Staff</label>
										<select class="select">
											<option>John Doe</option>
											<option>Richard Miles</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<label>Net Salary</label>
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<h4 class="text-primary">Earnings</h4>
									<div class="form-group">
										<label>Basic</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>DA(40%)</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>HRA(15%)</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Conveyance</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Allowance</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Medical Allowance</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Others</label>
										<input class="form-control" type="text">
									</div>
									<div class="add-more">
										<a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
								<div class="col-sm-6">
									<h4 class="text-primary">Deductions</h4>
									<div class="form-group">
										<label>TDS</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>ESI</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>PF</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Leave</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Prof. Tax</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Labour Welfare</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Others</label>
										<input class="form-control" type="text">
									</div>
									<div class="add-more">
										<a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>
							<div class="submit-section">
								<button class="btn btn-primary submit-btn">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Salary Modal -->
		<!-- Edit Salary Modal -->
		<div id="edit_salary" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Staff Salary</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Select Staff</label>
										<select class="select">
											<option>John Doe</option>
											<option>Richard Miles</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<label>Net Salary</label>
									<input class="form-control" type="text" value="$4000">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<h4 class="text-primary">Earnings</h4>
									<div class="form-group">
										<label>Basic</label>
										<input class="form-control" type="text" value="$6500">
									</div>
									<div class="form-group">
										<label>DA(40%)</label>
										<input class="form-control" type="text" value="$2000">
									</div>
									<div class="form-group">
										<label>HRA(15%)</label>
										<input class="form-control" type="text" value="$700">
									</div>
									<div class="form-group">
										<label>Conveyance</label>
										<input class="form-control" type="text" value="$70">
									</div>
									<div class="form-group">
										<label>Allowance</label>
										<input class="form-control" type="text" value="$30">
									</div>
									<div class="form-group">
										<label>Medical Allowance</label>
										<input class="form-control" type="text" value="$20">
									</div>
									<div class="form-group">
										<label>Others</label>
										<input class="form-control" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<h4 class="text-primary">Deductions</h4>
									<div class="form-group">
										<label>TDS</label>
										<input class="form-control" type="text" value="$300">
									</div>
									<div class="form-group">
										<label>ESI</label>
										<input class="form-control" type="text" value="$20">
									</div>
									<div class="form-group">
										<label>PF</label>
										<input class="form-control" type="text" value="$20">
									</div>
									<div class="form-group">
										<label>Leave</label>
										<input class="form-control" type="text" value="$250">
									</div>
									<div class="form-group">
										<label>Prof. Tax</label>
										<input class="form-control" type="text" value="$110">
									</div>
									<div class="form-group">
										<label>Labour Welfare</label>
										<input class="form-control" type="text" value="$10">
									</div>
									<div class="form-group">
										<label>Fund</label>
										<input class="form-control" type="text" value="$40">
									</div>
									<div class="form-group">
										<label>Others</label>
										<input class="form-control" type="text" value="$15">
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
	<!-- Datatable JS -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
</body>

</html>