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
<style>
	.ass{
		background-color:#dc3545;
		color:white;
	}
</style>


<!-- Second column start -->
<?php
$sql="SELECT * FROM assets_tb";
  $query=mysqli_query($conn,$sql);
  if($query->num_rows>0){

?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
	<p class="bg-dark text-white p-2">Product/Parts Details</p>

<?php
	echo'
		<table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Date of Purchase</th>
      <th scope="col">Available</th>
      <th scope="col">Total</th>
      <th scope="col">Original Cost Each</th>
      <th scope="col">Selling Cost Each</th>
    </tr>
  </thead>
  <tbody>';
		 while($row= $query->fetch_assoc()){
		   echo' <tr>
		       <th scope="row">'.$row["p_id"].'</th>
		    <td>'.$row["p_name"].'</td>
		    <td>'.$row["p_dop"].'</td>
		    <td>'.$row["p_available"].'</td>
		    <td>'.$row["p_total"].'</td>
		    <td>'.$row["p_original_cost"].'</td>
		    <td>'.$row["p_selling_cost"].'</td>
		    <td> 
		    <form action="edit_product.php" method="POST" class="d-inline">
		    
		    <input type="hidden" name="id" value='.$row["p_id"].'>
		    	
		    	<button type="submit" class=" btn btn-success " name="view" value="view"><i class="fas fa-pen"></i></button>
		    </form>

		    <form action="#" method="POST" class="d-inline">
		    <input type="hidden" name="ids" value='.$row["p_id"].'>
		    	<button type="submit" class=" btn btn-primary " name="delete" value="delete"><i class="far fa-trash-alt"></i></button>
		    </form>

		    <form action="custumer_bill.php" method="POST" class="d-inline">
		    <input type="hidden" name="id" value='.$row["p_id"].'>
		    	<button type="submit" class="btn btn-secondary " name="issue" value="issue"><i class="fas fa-handshake"></i></button>
		    </form>


		    </td>
		    </tr>';
    }
}
  
  echo '</tbody>
</table>';

?>
<?php
if(isset($_REQUEST['delete'])){

	$sql="DELETE FROM assets_tb WHERE p_id={$_REQUEST['ids']}";
	$query=mysqli_query($conn,$sql);
	if($query==1){
		echo "<meta http-equiv='refresh' content='0;URL=?deleted'";
	}
}
?>


<a class="btn btn-danger box "style="float: right;" href="add_product.php"><i class="fas fa-plus fa-2x"></i></a>
</div>

<?php
include('include/footer.php');
?>