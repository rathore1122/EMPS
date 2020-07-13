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
$sql = "SELECT * FROM custumer_bill WHERE cus_id = {$_SESSION['myid']}";
$query = mysqli_query($conn,$sql);
if($query->num_rows > 0){
 $row = $query->fetch_assoc();
 echo "<div class='ml-5 mt-10'>
 <h3 class='text-center'>Customer Bill</h3>
 <table class='table'>
  <tbody>
  <tr>
    <th>Customer ID</th>
    <td>".$row['cus_id']."</td>
  </tr>
   <tr>
     <th>Customer Name</th>
     <td>".$row['cus_name']."</td>
   </tr>
   <tr>
     <th>Address</th>
     <td>".$row['cus_add']."</td>
   </tr>
   <tr>
   <th>Product</th>
   <td>".$row['cus_p_name']."</td>
  </tr>
   <tr>
    <th>Quantity</th>
    <td>".$row['cus_product_quantity']."</td>
   </tr>
   <tr>
    <th>Price Each</th>
    <td>".$row['cus_product_each']."</td>
   </tr>
   <tr>
    <th>Total Cost</th>
    <td>".$row['cus_product_total']."</td>
   </tr>
   <tr>
   <th>Date</th>
   <td>".$row['cus_product_date']."</td>
  </tr>
   <tr>
    <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
    <td><a href='assets.php' class='btn btn-secondary d-print-none'>Close</a></td>
  </tr>
  </tbody>
 </table> </div>
 ";

} 
else {
  echo "Failed";
}


 ?>
 <?php
include('include/footer.php');
?>