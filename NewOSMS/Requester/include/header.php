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
	<title><?php echo TITLE  ?></title>
</head>

<body>
<nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow bg-danger"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="RequesterProfile.php"> EMSP</a>
</nav>
<!-- start container -->
<div class="container-fluid" style="margin-top: 40px;">
	<!-- start row -->
	<div class="row">
		<!-- Start sidebar -->
		<nav class="col-sm-2 bg-light sidebar py-5 d-print-none ">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item ">
						<!-- here the class is h,s,c,ch, and l, are the classes for the active column -->
						<a class="nav-link h " href="RequesterProfile.php"style="color: black;"><i class="fas fa-user"></i>Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link s" href="SubmitRequest.php" style="color: black;"><i class="fab fa-accessible-icon"></i>Submit Request</a>
					</li>
					<li class="nav-item">
						<a class="nav-link c" href="CheckStatus.php"style="color: black;"><i class="fas fa-align-center"></i>Service Stutas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link ch" href="ChangePassword.php"style="color: black;"><i class="fas fa-key"></i>Change Password</a>
					</li>
					<li class="nav-item">
						<a class="nav-link l"  href="Logout.php"style="color: black;"><i class="fas fa-sign-out-alt"></i> Log out</a>
					</li>

				</ul>
			</div>
		</nav>
		<!-- Sidebar End 1solumn -->
