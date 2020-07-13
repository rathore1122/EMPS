<?php
define('TITLE','Check Status');
include('../dbconnection.php');
include('include/header.php');
session_start();
if(isset($_SESSION['is_login'])){
	$rEmaile=$_SESSION['rEmail'];
}
else{
	echo "<script>location.href='RequesterLogin.php'</script>";
}
?>
<style>
	.c{
		background-color:#dc3545;
		color:white;
	}
</style>

		<!-- profile area 2nd column -->
		<div  class="col-sm-6 mt-5 ">
			<form action="" method="POST" class="form-inline d-print-none">
				<div class="form-group mr-3">
				<label for="check id" class="mr-3 ">Enter request id : </label>
				<input type="text" class="form-control" name="checkid" id="checkid" >
				</div>
				<button type="Submit" name="btn1" class="btn btn-danger">Search</button>
			</form>
			
			<br>

			
			
		


		
<?php
			if(isset($_REQUEST['btn1'])){
				if(($_REQUEST['checkid']=="")){
					echo "unseccessfull";
				}
				else{
					$sql="SELECT * FROM assignwork_tb WHERE request_id='".$_REQUEST['checkid']."'";
					$query=mysqli_query($conn,$sql);
					if($query->num_rows==1){
						$row = $query->fetch_assoc();
						?>
						<table class="table">
    
							<tbody>
								<tr>
									<th>Request Id</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['request_id'] ;} ?></td>
								</tr>
								<tr>
									<th>Request info</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['request_info'];} ?></td>
								</tr>
								<tr>
									<th>Description</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['request_desc'];} ?></td>
								</tr>
								<tr>
									<th>Name</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['requester_name'];} ?></td>
								</tr>
								<tr>
									<th>Address1</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['requester_add1'];} ?></td>
								</tr>
								<tr>
									<th>Address2</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['requester_add2'];} ?></td>
								</tr>
								<tr>
									<th>City</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['requester_city'];} ?></td>
								</tr>
								<tr>
									<th>State</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['requester_state'];} ?></td>
								</tr>
								<tr>
									<th>Pin Code</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['requester_zip'];} ?></td>
								</tr>
								<tr>
									<th>Email</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['requester_email'];} ?></td>
								</tr>
								<tr>
									<th>Mobile</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['requester_mobile'];} ?></td>
								</tr>
								<tr>
								<tr>
									<th>Technision</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['assign_tech'];} ?></td>
								</tr>
								<tr>
									<th>Date</th>
									<td><?php if(isset($_REQUEST['checkid'])) { echo $row['assign_date'];} ?></td>
								</tr>
								<tr>
									<th>Signeture</th>
									<td><?php  ?></td>
								</tr>

								</tbody>
							</table>


							<div class="text-center">
								<form action="" class="mb-3 d-print-none">
									<input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
									<input type="submit" class="btn btn-secondary" value="Close">
								</form>
								
							</div>
					
							

					<?php	
					}
					else{
						echo "<div class='alert-warning'> Your Request is panding </div>";
					}
				}

			}

				

			?>

</div>



		
		
		<!-- End profile area -->



<?php
include('include/footer.php')
?>