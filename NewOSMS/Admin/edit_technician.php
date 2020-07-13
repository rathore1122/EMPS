<?php
define('TITLE','Update Technician');
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
    	$t_id=$_REQUEST['t_id'];
			$t_name=$_REQUEST['t_name'];
			$t_city=$_REQUEST['t_city'];
			$t_mobile=$_REQUEST['t_mobile'];
			$t_email=$_REQUEST['t_email'];
		
			
      $sql="UPDATE technisian SET t_id='$t_id',t_name='$t_name',t_city='$t_city',t_mobile='$t_mobile',t_email='$t_email' WHERE t_id = '$t_id'";
      $query=mysqli_query($conn,$sql);
      if($query==1){
        $msg='<div class="alert alert-success mt-2 role="alert"">Success</div>';
      }
      else{
        $msg='<div class="alert alert-warning mt-2 role="alert"">Failed</div>';
      }



		}


}





?> 



<!-- Second column start -->




<style>
	.t{
		background-color:#dc3545;
		color:white;
	}
</style>


<div class="col-sm-5 jumbotraon" style="background-color:rgb(233, 236, 239);">
<br>
<br>
<br>
<h3 class="text-center">Update Products</h3>


<?php
if(isset($_REQUEST['view'])){
	$sql="SELECT * FROM technisian WHERE t_id={$_REQUEST['id']}";
	 $query=mysqli_query($conn,$sql);
	      if($query== True){
	      	$row = $query->fetch_assoc();	
	      }
}
?>
	<form action="" method="POST">
	<div class="form-group">
      <label for="t_id">ID</label>
      <input type="text" class="form-control" id="t_id" name="t_id" value="<?php if(isset($row['t_id'])) {echo $row['t_id']; }?>">
    </div>
    <div class="form-group">
      <label for="tname">Name</label>
      <input type="text" class="form-control" id="t_name" name="t_name" value="<?php if(isset($row['t_name'])) {echo $row['t_name']; }?>">
    </div>
    <div class="form-group">
      <label for="t_city">City</label>
      <input type="text" class="form-control" id="t_city" name="t_city" value="<?php if(isset($row['t_city'])) {echo $row['t_city']; }?>">
    </div>
    <div class="form-group">
      <label for="pava">Mobile</label>
      <input type="text" class="form-control" id="t_mobile" name="t_mobile" value="<?php if(isset($row['t_mobile'])) {echo $row['t_mobile']; }?>" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="ptotal">Email</label>
      <input type="email" class="form-control" id="t_email" name="t_email" value="<?php if(isset($row['t_email'])) {echo $row['t_email']; }?>" >
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Update</button>
      <a href="technician.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<!-- Only Number for input fields -->
	
</form>
	
</div>










<?php
include('include/footer.php');
?>