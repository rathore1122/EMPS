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
<div class="col-sm-6 mt-5  mx-3">
 <h3 class="text-center">Assigned Work Details</h3>
<?php
if(isset($_REQUEST['view'])){
	$sql="SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
	$query=mysqli_query($conn,$sql);
	if($query == True){
		$row=$query->fetch_assoc();
		
	}
}
?>
<table class="table table-bordered">
	<tbody>
		<tr>
			<td>
			Request ID	
			</td>
			<td>
				<?php if(isset($row['request_id'])) {echo $row['request_id']; } ?>
			</td>
		</tr>
		<tr>
			<td>
			Request info	
			</td>
			<td>
				<?php if(isset($row['request_info'])) {echo $row['request_info']; } ?>
			</td>
		</tr>
		<tr>
			<td>
			Desceription	
			</td>
			<td>
				<?php if(isset($row['request_desc'])) {echo $row['request_desc']; } ?>
			</td>
		</tr>
	
		<tr>
			<td>
			Name	
			</td>
			<td>
				<?php if(isset($row['requester_name'])) {echo $row['requester_name']; } ?>
			</td>
		</tr>
		<tr>
			<td>
			Address 	
			</td>
			<td>
				<?php if(isset($row['requester_add1'])) {echo $row['requester_add1']; } ?>
			</td>
		</tr>
		<tr>
			<td>
			Address 2
			</td>
			<td>
				<?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; } ?>
			</td>
		</tr>
		<tr>
			<td>
			City	
			</td>
			<td>
				<?php if(isset($row['requester_city'])) {echo $row['requester_city']; } ?>
			</td>
		</tr>
		<tr>
			<td>
			Pin Code	
			</td>
			<td>
				<?php if(isset($row['requester_zip'])) {echo $row['requester_zip']; } ?>
			</td>
		</tr>
		<tr>
			<td>
			Email	
			</td>
			<td>
				<?php if(isset($row['requester_email'])) {echo $row['requester_email']; } ?>
			</td>
		</tr>
		<tr>
			<td>
			Mobile No.
			</td>
			<td>
				<?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; } ?>
			</td>
		</tr>
		<tr>
			<td>
			Date
			</td>
			<td>
				<?php if(isset($row['assign_date'])) {echo $row['assign_date']; } ?>
			</td>
		</tr>
		<tr>
    <td>Technician Name</td>
    <td>
     <?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; }?>
    </td>
   </tr>
   <tr>
    <td>Customer Sign</td>
    <td></td>
   </tr>
   <tr>
    <td>Technician Sign</td>
    <td></td>
   </tr>
	</tbody>
</table>
<div>
<form class="d-print-none d-inline mr-5">
	<input type="submit" name="print" value="Print" Onclick='window.print()' class="btn btn-danger">
	
</form>
<form class='d-print-none d-inline' action="work.php"><input class='btn btn-secondary' type='submit' value='Close'></form>
</div>
</div>


<?php
include('include/footer.php');
?>