<?php
define('TITLE','Dashboard');
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
	.d{
		background-color:#dc3545;
		color:white;
	}

</style>
<!-- start dashboard 2nd column -->
<?php
$sql="SELECT max(request_id) from submitrequest_tb";
$query=$conn->query($sql);
$row = mysqli_fetch_row($query);
$submitrequest = $row[0];
?>
<div class="col-sm-9 col-md-10">
<div class="row text-center mx-5">
	<div class="mt-5">
	<div class="card text-white bg-danger mb-4 ml-3"style="width:300px;">
		<div class="card-header">Request Service</div>
			<div class="card-body">
				<h4 class="card-title"><?php echo $submitrequest; ?></h4>
				<a href="#" class="btn text-white">View</a>
			</div>

	
	</div>
<?php
$sql="SELECT max(rno) from assignwork_tb";
$query=$conn->query($sql);
$row = mysqli_fetch_row($query);
$submitrequest = $row[0];
?>	
	</div>	
	<div class=" mt-5">
	<div class="card text-white bg-success mb-5 ml-3"style="width:300px;">
		<div class="card-header">Assingd Work</div>
			<div class="card-body">
				<h4 class="card-title"> <?php echo $submitrequest; ?></h4>
				<a href="#" class="btn text-white">View</a>
			</div>
		
	
	</div>
	
	</div>

<?php
$sql="SELECT max(t_id) from technisian";
$query=$conn->query($sql);
$row = mysqli_fetch_row($query);
$submitrequest = $row[0];
?>	
	<div class=" mt-5 mr-5">
	<div class="card text-white bg-info mb-5 ml-3"style="width:300px;">
		<div class="card-header">No.of Technician</div>
			<div class="card-body">
				<h4 class="card-title"><?php echo $submitrequest; ?></h4>
				<a href="#" class="btn text-white">View</a>
			</div>
		
	
	</div>
	
	</div>
	</div>



<div class="text-center mx-4 mt-4" >
<p class="bg-dark text-white">List of Requesters</p>	
<?php 
$sql="SELECT * FROM requesterlogin_tb";
$query=mysqli_query($conn,$sql);
if($query->num_rows > 0){
	
	echo"<table class='table'>
	<thead>
	<tr>
	<th scope='col'> Requester Id</th>
	<th scope='col'> Requester Name</th>
	<th scope='col'> Requester Email</th>
	</tr>
	</thead>
	<tbody>";
	while($row=$query->fetch_assoc()){
	 echo '<tr>';
	 echo'<td>'.$row['r_login_id'].'</td>';
	echo'<td>'.$row['r_name'].'</td>';
	echo'<td>'.$row['r_email'].'</td>';	
	echo'</tr>';
	'</tbody>
	</table>
	';}

}

?>
</div>
</div>







<!-- End 2nd coulumn -->





		
	

<?php
include('include/footer.php');
?>


