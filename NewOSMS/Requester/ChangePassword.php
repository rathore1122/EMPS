<?php
define('TITLE','Change Password');

include('include/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_login'])){
	$rEmail=$_SESSION['rEmail'];
	$value=$rEmail;
}
else{
	echo "<script> location.href='RequesterLogin.php'</script>";
}
if(isset($_REQUEST['passupdate'])){

	$rpassword=$_REQUEST['rpassword'];
	$sql="UPDATE requesterlogin_tb SET r_password='$rpassword'   WHERE r_email='$rEmail'";
	$query=mysqli_query($conn,$sql);
	if($query==1){
		$fillmsg= '<div class="alert alert-success mt-2 col-md-4 role="alert">Update Seccussfull... </div>';
	}

}
?>
<style>
	.ch{
		background-color:#dc3545;
		color:white;
	}
</style>

		<!-- profile area 2nd column -->
		<div class="col-sm-6 mt-5">
			<form action="" method="POST" class="mx-5">
				<div class="form-group">
					<label for="rEmail">Email</label><input  type="email" class="form-control" name="rEmail" id="rEmail" value="<?php echo $value ?>" readonly  ">
					
				</div>
				<div class="form-group">
					<label for="rName">New Password</label><input   type="text" class="form-control" name="rpassword" id="rName" ">
					
				</div>
				<?php if(isset($fillmsg)){echo $fillmsg;}?>
				<button type="submit" class="btn btn-danger" name="passupdate">Upadate</button>
			</form>
			
		</div>		<!-- End profile area -->



<?php
include('include/footer.php')
?>