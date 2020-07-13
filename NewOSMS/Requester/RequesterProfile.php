<?php
define('TITLE','Resuester Profile');

include('include/header.php');
include('../dbconnection.php');
session_start();
if($_SESSION['is_login']){
$rEmail=$_SESSION['rEmail'];
}
else{
	echo "<script> location.href='RequesterLogin.php'</script>";
}

// Fatching Start
$sql="SELECT r_name,r_email FROM Requesterlogin_tb WHERE r_email='$rEmail'";
$query=mysqli_query($conn,$sql);
if($query->num_rows==1){

	$row=$query->fetch_assoc();
	$rName=$row['r_name'];
	$value=$rEmail;
}
//Fatching End...
if(isset($_REQUEST['nameupdate'])){
	if($_REQUEST['rName']==""){
		$fillmsg='<div class="alert alert-warning mt-2 role="alert"> Fill Your Name</div>';
	}
	else{
		$rName=$_REQUEST['rName'];
		$sql="UPDATE Requesterlogin_tb SET r_name='$rName' WHERE r_email='$rEmail'";
		$query=mysqli_query($conn,$sql);
		if($query==1){
			$fillmsg='<div class="alert alert-success mt-2 role="alert">Update Successfully...</div>';
		}
		else{
			$fillmsg='<div class="alert alert-warning mt-2 role="alert">Unable to update...</div>';
		}
	}
}


?>

		<!-- Sidebar End 1solumn -->
		<style>
	.h{
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
					<label for="rName">Name</label><input   type="text" class="form-control" name="rName" id="rName" value="<?php echo $rName ?>">
					
				</div>
				<?php if(isset($fillmsg)){echo $fillmsg;}?>
				<button type="submit" class="btn btn-danger" name="nameupdate">Upadate</button>
			</form>
			
		</div>
		<!-- End profile area -->



<?php include'include/footer.php' ?>