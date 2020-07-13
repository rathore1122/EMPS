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





<!-- Second column start -->




<style>
	.ass{
		background-color:#dc3545;
		color:white;
	}
</style>

 <?php

if(isset($_REQUEST['c_submit'])){
  if(($_REQUEST['p_id']=="")||($_REQUEST['cus_name']=="")||($_REQUEST['p_available']=="")||($_REQUEST['cus_product_quantity']=="")||($_REQUEST['cus_product_date']=="")||($_REQUEST['cus_add']=="")){
     $msg='<div class="alert alert-warning mt-2 role="alert"">Please fill All Details </div>';
    }
    else
    {
      $p_id=$_REQUEST['p_id'];
      $p_available = ($_REQUEST['p_available'] - $_REQUEST['cus_product_quantity']);
      $cus_name=$_REQUEST['cus_name'];
      $cus_add=$_REQUEST['cus_add'];
      $p_name=$_REQUEST['p_name'];
      $cus_product_quantity=$_REQUEST['cus_product_quantity'];
      $p_selling_cost=$_REQUEST['p_selling_cost'];
      $cus_product_total=$_REQUEST['cus_product_total'];
      $cus_product_date=$_REQUEST['cus_product_date'];
      
      $sql="INSERT INTO custumer_bill(cus_name,cus_add,cus_p_name,cus_product_quantity,cus_product_each,cus_product_total,cus_product_date)VALUES('$cus_name','$cus_add','$p_name','$cus_product_quantity','$p_selling_cost','$cus_product_total','$cus_product_date')";
      $query=mysqli_query($conn,$sql);
      if($query==True){
        $gen_id = mysqli_insert_id($conn);
        $_SESSION['myid'] = $gen_id;
        echo $_SESSION['myid'];
        $msg='<div class="alert alert-success mt-2 role="alert"">Successfull</div>';
        echo "<script>location.href='custumer_bill_success.php'</script>";
      }
      else{
        $msg='<div class="alert alert-warning mt-2 role="alert"">Unsuccessfull</div>';
      }
      $sql1="UPDATE assets_tb SET p_available='$p_available' WHERE p_id='$p_id'";
      $query=mysqli_query($conn,$sql1);


    }


}





?> 


<div class="col-sm-5 mr-4 jumbotraon" style="background-color:rgb(233, 236, 239);">
<br>
<br>

<h3 class="text-center">Customer Bill</h3>


<?php
if(isset($_REQUEST['id'])){
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
      <label for="pname">Customer Name</label>
      <input type="text" class="form-control" id="cus_name" name="cus_name" value="">
    </div>
    <div class="form-group">
      <label for="pdop">Customer Address</label>
      <input type="text" class="form-control" id="cus_add" name="cus_add" value="">
    </div>
    <div class="form-group">
      <label for="pava">Product Name</label>
      <input type="text" class="form-control" id="pname" name="p_name" value="<?php if(isset($row['p_name'])) {echo $row['p_name']; }?>" >
    </div>
    <div class="form-group">
      <label for="ptotal">Available</label>
      <input type="text" class="form-control" id="pava" name="p_available" value="<?php if(isset($row['p_available'])) {echo $row['p_available']; }?>" >
    </div>
    <div class="form-group">
      <label for="poriginalcost">Quantity</label>
      <input type="text" class="form-control price " id="cus_product_quantity" name="cus_product_quantity" value="" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="psellingcost">Price Each</label>
      <input type="text" class="form-control price" id="psellingcost" name="p_selling_cost" value="<?php if(isset($row['p_selling_cost'])) {echo $row['p_selling_cost']; }?>"  onkeypress="isInputNumber(event)">
    </div>



    <div class="form-group">
      <label for="psellingcost">Total Price</label>
      <input type="text" class="form-control " id="totalPrice" name="cus_product_total"  >
    </div>
    <div class="form-group">
      <label for="psellingcost">Date</label>
      <input type="date" class="form-control" id="cus_product_date" name="cus_product_date" value="<?php ?>"  onkeypress="isInputNumber(event)">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="issue" name="c_submit">Submit</button>
      <a href="assets.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
  <br>
  <br>
  <br>
  <br>
  <br>
</div>
<!-- Only Number for input fields -->
	
</form>
	
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>


<script>
// we used jQuery 'keyup' to trigger the computation as the user type
$('.price').keyup(function () {
 
    // initialize the sum (total price) to zero
    var sum = 1;
     
    // we use jQuery each() to loop through all the textbox with 'price' class
    // and compute the sum for each loop
    $('.price').each(function() {
        sum *= Number($(this).val());
    });
     
    // set the computed value to 'totalPrice' textbox
    $('#totalPrice').val(sum);
     
});
</script>





<?php
include('include/footer.php');
?>