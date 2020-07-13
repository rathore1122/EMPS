<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible",content="ie=edge">

	<!-- boostrap code-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	
	<!--font Awesome-->
	<link rel="stylesheet" href="../css/all.min.css">

	<!-- Google Font-->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	<!---Custom css-->
	<link rel="stylesheet" href="../css/custom.css">
	<title><?php echo TITLE ?> </title>
</head>

<body>
<nav class="navbar navbar-dark fixed-top flex-md-nowrap p-2 shadow bg-danger"><a class="navbar-brand col-sm-2 col-md-3 mr-0 "style="font-size: 30px;" href="Dashboard.php"> OSMS</a>
</nav>
<!-- start container -->
<div class="container-fluid" style="margin-top: 40px;">
	<!-- start row -->
	<div class="row ">
		<!-- Start sidebar -->
		<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item ">
						<!-- here the class is h,s,c,ch, and l, are the classes for the active column -->
						<br>
						<a class="nav-link d" href="dashboard.php"style="color: black;"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link w" href="work.php" style="color: black;"><i class="fab fa-accessible-icon"></i>Work Order</a>
					</li>
					<li class="nav-item">
						<a class="nav-link r" href="request.php"style="color: black;"><i class="fas fa-align-center"></i>Request</a>
					</li>
					<li class="nav-item">
						<a class="nav-link ass" href="assets.php"style="color: black;"><i class="fas fa-database"></i>Assets</a>
					</li>
					<li class="nav-item">
						<a class="nav-link t"  href="technician.php"style="color: black;"><i class="fab fa-teamspeak"></i>Technician</a>
					</li>
					<li class="nav-item">
						<a class="nav-link req"  href="requester.php"style="color: black;"><i class="fas fa-users"></i>Requester</a>
					</li>
					<li class="nav-item">
						<a class="nav-link so"  href="soldproductreport.php"style="color: black;"><i class="fas fa-table"></i>Sell Report</a>
					</li>
					<li class="nav-item">
						<a class="nav-link wo"  href="workreport.php"style="color: black;"><i class="fas fa-table"></i> Work Report</a>
					</li>
					<li class="nav-item">
						<a class="nav-link ch"  href="changepass.php"style="color: black;"><i class="fas fa-key"></i>Change Password</a>
					</li>
					<li class="nav-item">
						<a class="nav-link l"  href="logout.php"style="color: black;"><i class="fas fa-sign-out-alt"></i> Log out</a>
					</li>

				</ul>
			</div>
		</nav>
		<!-- Sidebar End 1solumn -->
