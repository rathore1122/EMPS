<?php
define('TITLE','Assets');
include('../dbconnection.php');
include('include/header.php');

session_start();
if(isset($_SESSION['is_login'])){
	$admin_email=$_SESSION['aEmail'];

}

else{
	echo"<script> location.href='login.php'; </script>";

}

?>
<?php
if(isset($_REQUEST['psubmit'])){
	if(($_REQUEST['r_name']=="")||($_REQUEST['r_email']=="")||($_REQUEST['r_password']=="")){
     $msg='<div class="alert alert-warning mt-2 role="alert"">Please fill All Details </div>';
  }
  else
    {
			$r_name=$_REQUEST['r_name'];
      $r_email=$_REQUEST['r_email'];
			$r_password=$_REQUEST['r_password'];
			
			
      $sql="INSERT INTO requesterlogin_tb (r_name,r_email,r_password)
      VALUES('$r_name', '$r_email','$r_password')";
      $query=mysqli_query($conn,$sql);
      if($query==1){
        $msg='<div class="alert alert-success mt-2 role="alert"">Successfull Submit</div>';
      }
      else{
        $msg='<div class="alert alert-warning mt-2 role="alert"">Faild</div>';
      }



		}


}





?>



<style>
	.req{
		background-color:#dc3545;
		color:white;
	}
</style>


<!-- Second column start -->
<div class="col-sm-5 jumbotraon" style="background-color:rgb(233, 236, 239);">
<br>
<br>
<br>
<h3 class="text-center">Add New Requester</h3>
	<form action="" method="POST">
    <div class="form-group">
      <label for="pname">Name</label>
      <input type="text" class="form-control" id="r_name" name="r_name">
    </div>
    <div class="form-group">
      <label for="pdop">Email</label>
      <input type="email" class="form-control" id="r_email" name="r_email">
    </div>
    <div class="form-group">
      <label for="pava">Password</label>
      <input type="password" class="form-control" id="r_password" name="r_password" onkeypress="isInputNumber(event)">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
      <a href="requester.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
    <br>
<br>
<br>
<br>
<br>
<br>
  </form>
</div>
<!-- Only Number for input fields -->
	
</form>
	
</div>

<?php
include('include/footer.php');
?>