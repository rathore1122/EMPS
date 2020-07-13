<?php
define('TITLE','Submit Request');
include('include/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_login'])){
	$rEmail=$_SESSION['rEmail'];
}
else{
	echo "<script> location.href='RequesterLogin.php'</script>";
}

$sql="SELECT * FROM submitrequest_tb WHERE request_id = {$_SESSION['myid']}";
$query= mysqli_query($conn,$sql);
if($query->num_rows == 1){
	$row=$query->fetch_assoc();
	echo "
		<div class='ml-5 mt-5'>
 <table class='table'>
  <tbody>
   <tr>
     <th>Request ID</th>
     <td>".$row['request_id']."</td>
   </tr>
   <tr>
     <th>Name</th>
     <td>".$row['requester_name']."</td>
   </tr>
   <tr>
   <th>Email ID</th>
   <td>".$row['requester_email']."</td>
  </tr>
   <tr>
    <th>Request Info</th>
    <td>".$row['request_info']."</td>
   </tr>
   <tr>
    <th>Request Description</th>
    <td>".$row['request_desc']."</td>
   </tr>

   <tr>
    <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
  </tr>
  </tbody>
 </table> </div>";
}




?>















<?php
include('include/footer.php')
?>