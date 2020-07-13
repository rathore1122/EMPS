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
	if(($_REQUEST['pname']=="")||($_REQUEST['pdop']=="")||($_REQUEST['pava']=="")||($_REQUEST['ptotal']=="")||($_REQUEST['poriginalcost']=="")||($_REQUEST['psellingcost']=="")){
     $msg='<div class="alert alert-warning mt-2 role="alert"">Please fill All Details </div>';
  }
  else
    {
			$pname=$_REQUEST['pname'];
			$pdop=$_REQUEST['pdop'];
			$pava=$_REQUEST['pava'];
			$ptotal=$_REQUEST['ptotal'];
			$poriginalcost=$_REQUEST['poriginalcost'];
			$psellingcost=$_REQUEST['psellingcost'];
			
      $sql="INSERT INTO assets_tb (p_name,  p_dop, p_available, p_total, p_original_cost, p_selling_cost)
      VALUES('$pname', '$pdop','$pava','$ptotal', '$poriginalcost','$psellingcost')";
      $query=mysqli_query($conn,$sql);
      if($query==1){
        $msg='<div class="alert alert-success mt-2 role="alert"">Seccess</div>';
      }
      else{
        $msg='<div class="alert alert-warning mt-2 role="alert"">Unseccess</div>';
      }



		}


}





?>



<style>
	.ass{
		background-color:#dc3545;
		color:white;
	}
</style>


<!-- Second column start -->
<div class="col-sm-5 jumbotraon" style="background-color:rgb(233, 236, 239);">
<br>
<br>
<br>
<h3 class="text-center">Add New Product</h3>
	<form action="" method="POST">
    <div class="form-group">
      <label for="pname">Product Name</label>
      <input type="text" class="form-control" id="pname" name="pname">
    </div>
    <div class="form-group">
      <label for="pdop">Date of Purchase</label>
      <input type="date" class="form-control" id="pdop" name="pdop">
    </div>
    <div class="form-group">
      <label for="pava">Available</label>
      <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="ptotal">Total</label>
      <input type="text" class="form-control" id="ptotal" name="ptotal">
    </div>
    <div class="form-group">
      <label for="poriginalcost">Original Cost Each</label>
      <input type="text" class="form-control" id="poriginalcost" name="poriginalcost" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="psellingcost">Selling Cost Each</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
      <a href="assets.php" class="btn btn-secondary">Close</a>
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