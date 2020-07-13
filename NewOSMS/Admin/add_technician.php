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
	if(($_REQUEST['t_name']=="")||($_REQUEST['t_city']=="")||($_REQUEST['t_mobile']=="")||($_REQUEST['t_email']=="")){
     $msg='<div class="alert alert-warning mt-2 role="alert"">Please fill All Details </div>';
  }
  else
    {
			$t_name=$_REQUEST['t_name'];
      $t_city=$_REQUEST['t_city'];
      $t_mobile=$_REQUEST['t_mobile'];
			$t_email=$_REQUEST['t_email'];
			
			
      $sql="INSERT INTO technisian (t_name,t_city,t_mobile,t_email)
      VALUES('$t_name','$t_city','$t_mobile','$t_email')";
      $query=mysqli_query($conn,$sql);
      if($query==1){
        $msg='<div class="alert alert-success mt-2 role="alert"">Success</div>';
      }
      else{
        $msg='<div class="alert alert-warning mt-2 role="alert"">Unseccess</div>';
      }



		}


}










?>



<style>
  .t{
    background-color:#dc3545;
    color:white;
  }
</style>


<!-- Second column start -->
<div class="col-sm-5 jumbotraon" style="background-color:rgb(233, 236, 239);">
<br>
<br>
<br>
<h3 class="text-center">Add New Technician</h3>
	<form action="" method="POST">
    <div class="form-group">
      <label for="pname">Name</label>
      <input type="text" class="form-control" id="t_name" name="t_name">
    </div>
    <div class="form-group">
      <label for="pdop">City</label>
      <input type="text" class="form-control" id="t_city" name="t_city">
    </div>
     <div class="form-group">
      <label for="pava">Mobile</label>
      <input type="text" class="form-control" id="t_mobile" name="t_mobile" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="pava">Email</label>
      <input type="email" class="form-control" id="t_email" name="t_email" onkeypress="isInputNumber(event)">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
      <a href="technician.php" class="btn btn-secondary">Close</a>
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