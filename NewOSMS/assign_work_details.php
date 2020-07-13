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
<?php
if(isset($_REQUEST['view'])){
	$sql="SELECT * FROM assignwork_tb WHERE request_id={$_REQUEST['assign_work_details']}";
	$query=mysqli_query($conn,$sql);
	if($query->num_rows==1){
		$row=$query->fetch_assoc();
	
}
?>
<table class="table table-bordered">
	<tbody>
		<tr>
			<td>
			Request ID	
			</td>
			<td>
				<?php if(isset($_REQUEST['request_id'])) {echo $row['request_id']; } ?>
			</td>
		</tr>
		<tr>
			<td>
				
			</td>
			<td>
				
			</td>
		</tr>
		<tr>
			<td>
				
			</td>
			<td>
				
			</td>
		</tr>
		<tr>
			<td>
				
			</td>
			<td>
				
			</td>
		</tr>
	</tbody>
</table>

<?php
include('include/footer.php')
?>