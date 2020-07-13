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
	if(($_REQUEST['p_name']=="")||($_REQUEST['p_dop']=="")||($_REQUEST['p_available']=="")||($_REQUEST['p_total']=="")||($_REQUEST['p_original_cost']=="")||($_REQUEST['p_selling_cost']=="")){
     $msg='<div class="alert alert-warning mt-2 role="alert"">Please fill All Details </div>';
  	}
  	else
    {
    		$p_id=$_REQUEST['p_id'];
			$p_name=$_REQUEST['p_name'];
			$p_dop=$_REQUEST['p_dop'];
			$p_available=$_REQUEST['p_available'];
			$p_total=$_REQUEST['p_total'];
			$p_original_cost=$_REQUEST['p_original_cost'];
			$p_selling_cost=$_REQUEST['p_selling_cost'];
			
      $sql="UPDATE assets_tb SET p_id='$p_id',p_name='$p_name',p_dop='$p_dop',p_available='$p_available',p_total='$p_total',p_original_cost='$p_original_cost',p_selling_cost='$p_selling_cost' WHERE p_id = '$p_id'";
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



<!-- Second column start -->




<style>
	.ass{
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
	$sql="SELECT * FROM assets_tb WHERE p_id={$_REQUEST['id']}";
	 $query=mysqli_query($conn,$sql);
	      if($query== True){
	      	$row = $query->fetch_assoc();	
	      }
}
?>
	<form action="" method="POST">
	<div class="form-group">
      <label for="pname">Product ID</label>
      <input type="text" class="form-control" id="pid" name="p_id" value="<?php if(isset($row['p_id'])) {echo $row['p_id']; }?>">
    </div>
    <div class="form-group">
      <label for="pname">Product Name</label>
      <input type="text" class="form-control" id="pname" name="p_name" value="<?php if(isset($row['p_name'])) {echo $row['p_name']; }?>">
    </div>
    <div class="form-group">
      <label for="pdop">Date of Purchase</label>
      <input type="date" class="form-control" id="pdop" name="p_dop" value="<?php if(isset($row['p_dop'])) {echo $row['p_dop']; }?>">
    </div>
    <div class="form-group">
      <label for="pava">Available</label>
      <input type="text" class="form-control" id="pava" name="p_available" value="<?php if(isset($row['p_available'])) {echo $row['p_available']; }?>" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="ptotal">Total</label>
      <input type="text" class="form-control" id="ptotal" name="p_total" value="<?php if(isset($row['p_total'])) {echo $row['p_total']; }?>" >
    </div>
    <div class="form-group">
      <label for="poriginalcost">Original Cost Each</label>
      <input type="text" class="form-control" id="poriginalcost" name="p_original_cost" value="<?php if(isset($row['p_original_cost'])) {echo $row['p_original_cost']; }?>" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="psellingcost">Selling Cost Each</label>
      <input type="text" class="form-control" id="psellingcost" name="p_selling_cost" value="<?php if(isset($row['p_selling_cost'])) {echo $row['p_selling_cost']; }?>"  onkeypress="isInputNumber(event)">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Update</button>
      <a href="requester.php" class="btn btn-secondary">Close</a>
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