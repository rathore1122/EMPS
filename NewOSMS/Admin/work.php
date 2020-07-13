<?php
define('TITLE','Work');

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
	.w{
		background-color:#dc3545;
		color:white;
	}
</style>


<!-- second column start -->
<div class="col-sm-8 col-md-10 mt-5">
<?php
$sql="SELECT * FROM assignwork_tb ";
$query=mysqli_query($conn,$sql);
if($query->num_rows > 0){
	
		echo'
		<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Req ID</th>
      <th scope="col">Request Info</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Mobile</th>
      <th scope="col">Technician</th>
      <th scope="col">Assigned Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $query->fetch_assoc()){
   echo' <tr>
    <th scope="row">'.$row["request_id"].'</th>
    <td>'.$row["request_info"].'</td>
    <td>'.$row["requester_name"].'</td>
    <td>'.$row["requester_add2"].'</td>
    <td>'.$row["requester_city"].'</td>
    <td>'.$row["requester_mobile"].'</td>
    <td>'.$row["assign_tech"].'</td>
    <td>'.$row["assign_date"].'</td>
    <td> 
    <form action="viewassign_work.php" method="POST" class="d-inline">
    	<input type="hidden" name="id" value='.$row["request_id"].'>
    	<button type="submit" class="btn btn-warning" name="view" value="View"><i class="far fa-eye"></i></button></form>
      
    <form action="#" method="POST" class="d-inline">
    <input type="hidden" name="ids" value='.$row['request_id'].'>
    	<button type="submit" class="btn btn-secondry" name="delete" value="delete"><i class="far fa-trash-alt"></i></button>
    </form>


    </td>
    </tr>';
    }
  
  echo '</tbody>
</table>';


	
}

?>
<?php
if(isset($_REQUEST['delete'])){
$sql="DELETE FROM assignwork_tb WHERE request_id={$_REQUEST['ids']}";
$query=mysqli_query($conn,$sql);
if($query==1){
	echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
}
}

?>

	


</div>







<?php
include('include/footer.php');
?>