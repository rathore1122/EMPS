<?php
include('../dbconnection.php');

session_start();
if(!isset($_SESSION['is_login'])){
	
	if(isset($_REQUEST['rEmail'])){
		$rEmail = mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
		$rPassword = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));

		$sql="SELECT r_email,r_password FROM Requesterlogin_tb WHERE r_email='".$rEmail."' AND r_password='".$rPassword."' limit 1";
		$query=mysqli_query($conn,$sql);
		
		if($query->num_rows == 1){

			$_SESSION['is_login']=true;
			$_SESSION['rEmail']=$rEmail;

			echo $_SESSION['rEmail'];
			echo"<script> location.href='RequesterProfile.php'; </script>";
			exit;
		}

		else
{
	$logmsg= '<div class="alert alert-warning mt-2 role="alert"> Your email and password is wrong...</div>';;
}
	}



}

else{
	echo"<script> location.href='RequesterProfile.php'; </script>";
}


?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible",content="ie=edge">

	<!-- Boostrap CSS  -->
	<link rel="stylesheet" type="text/css" href="../css/Bootstrap.min.css">

	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">

	<!---Custom css-->
	<link rel="stylesheet" href="../css/custom.css">


	<title>Login</title>
</head>
<body>
<div class="mt-3 mt-5 text-center" style="font-size: 30px;">
	<i class="fas fa-stethoscope"></i>
	<span >Online Service Maintaince System</span>
</div>
<p class="text-center" style="font-size: 20px;"><i class="fas fa-user-secret text-danger"></i> Requester Area</p>
<div class="container-fluid">
	<div class="row justify-content-center" >
		<div class="col-sm-6 col-md-4">
			<form action="#" class="shadow-lg p-4" method="POST">
				<div class="form-group">
   				<i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2 ">Email</label>
   				<input type="email" name="rEmail" class="form-control" placeholder="Email">
				</div>


				<div class="form-group">
   				<i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label>
   				<input type="password" name="rPassword" class="form-control" placeholder="Password">

   				<button type=" submit" class="btn btn-outline-danger mt-5 btn-block shadow-sm font-weight-bold" name="rlogin">Login</button>
   				<?php if(isset($_REQUEST['rlogin'])){
   				 echo $logmsg ;
   				} 
   				 ?>

   			</form>

   			</div>
			
		</div>
		
	</div>
				<div class="text-center">
   				<a href="../index.php" type=" submit" class="btn btn-primary mt-4  shadow-sm font-weight-bold">Back To Home</a>
   				</div>
	
</div>


<!--Javascript-->
<script src="../js/jquer.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html>