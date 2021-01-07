<?php
require_once 'includes/library.php';
session_start();
ERROR_REPORTING(E_ALL);
$app = new AppLib();
$dbh = Database();
$is_login = $app->is_user();
if (!$is_login) {
	header('location:login.php');
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
	return $hasil . " Rupiah";
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
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css" id="theme-link">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	<script>
		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}
	</script>
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
							<h3 class="page-title">Payslip</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Payslip</li>
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
				<?php
				$nganu = $_GET['id'];
				$sql = "SELECT * FROM employees INNER JOIN salary ON employees.Employee_Id = salary.Employee_Id WHERE employees.Employee_Id='$nganu'";
				$query = $dbh->prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
				$cnt = 1;
				$set = '1234567890';
				$nomer = substr(str_shuffle($set), 0, 6);
				if ($query->rowCount() > 0) {
					foreach ($results as $row) {
						$foto = $row->Picture;
						$newdate = date("l d-m-Y", strtotime($row->Joining_Date));
				?>
						<div class="row" id='print'>
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<h4 class="payslip-title">Payslip for the month of <?php echo date("F Y") ?></h4>
										<div class="row">
											<div class="col-sm-6 m-b-20">
												<img src="assets/img/logo2.png" class="inv-logo" alt="">
												<ul class="list-unstyled mb-0">
													<li>HaRaM</li>
													<li>Zip Code 2454</li>
													<li>Jl. Panglima Sudirman no. 1001 </li>
													<li>Mengkubumi, Surakarta, Jawa Tengah, Indonesia</li>
												</ul>
											</div>
											<div class="col-sm-6 m-b-20">
												<div class="invoice-details">
													<h3 class="text-uppercase">Payslip <?php echo '#SLIP-' . $nomer; ?></h3>
													<ul class="list-unstyled">
														<li>Salary Month: <span><?php echo date("F, Y") ?></span></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12 m-b-20">
												<ul class="list-unstyled">
													<li>
														<h5 class="mb-0"><strong><?php echo htmlentities($row->FirstName) . " " . htmlentities($row->LastName); ?></strong></h5>
													</li>
													<li><span><?php echo htmlentities($row->Designation); ?></span></li>
													<li>Employee ID: <?php echo htmlentities($row->Employee_Id); ?></li>
													<li>Joining Date: <?php echo htmlentities($newdate); ?></li>
												</ul>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div>
													<h4 class="m-b-10"><strong>Earnings</strong></h4>
													<table class="table table-bordered">
														<tbody>
															<tr>
																<td><strong>Basic Salary</strong> <span class="float-right"><?php echo "Rp " . number_format((htmlentities($row->salary)), 2, ',', '.'); ?></span></td>
															</tr>
															<tr>
																<td><strong>House Rent Allowance (H.R.A.)</strong> <span class="float-right">Rp. 0,00</span></td>
															</tr>
															<tr>
																<td><strong>Conveyance</strong> <span class="float-right">Rp. 0,00</span></td>
															</tr>
															<tr>
																<td><strong>Other Allowance</strong> <span class="float-right">Rp. 0,00</span></td>
															</tr>
															<tr>
																<td><strong>Total Earnings</strong> <span class="float-right"><strong>Rp. 0,00</strong></span></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="col-sm-6">
												<div>
													<h4 class="m-b-10"><strong>Deductions</strong></h4>
													<table class="table table-bordered">
														<tbody>
															<tr>
																<td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">Rp. 0,00</span></td>
															</tr>
															<tr>
																<td><strong>Provident Fund</strong> <span class="float-right">Rp. 0,00</span></td>
															</tr>
															<tr>
																<td><strong>ESI</strong> <span class="float-right">Rp. 0,00</span></td>
															</tr>
															<tr>
																<td><strong>Loan</strong> <span class="float-right">Rp. 0,00</span></td>
															</tr>
															<tr>
																<td><strong>Total Deductions</strong> <span class="float-right"><strong>Rp. 0,00</strong></span></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="col-sm-12">
												<p><strong>Net Salary: <?php echo "Rp " . number_format((htmlentities($row->salary)), 2, ',', '.'); ?></strong> // <?php echo terbilang($row->salary) ?></p>
											</div>
										</div>
									</div>
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