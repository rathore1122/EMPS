<?php
define('TITLE','Requester');
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
	.t{
		background-color:#dc3545;
		color:white;
	}
</style>

<!-- Second column start -->


<?php
$sql="SELECT * FROM technisian
";
  $query=mysqli_query($conn,$sql);
  if($query->num_rows>0){

?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
	<p class="bg-dark text-white p-2">List of Requesters</p>

<?php
	echo'
		<table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">Requester ID</th>
      <th scope="col">Name</th>
      <th scope="col">City</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
		 while($row= $query->fetch_assoc()){
		   echo' <tr>
		       <th scope="row">'.$row["t_id"].'</th>
		    <td>'.$row["t_name"].'</td>
		    <td>'.$row["t_city"].'</td>
		    <td>'.$row["t_mobile"].'</td>
		    <td>'.$row["t_email"].'</td>
		    <td> 
		    <form action="edit_technician.php" method="POST" class="d-inline">
		    
		    <input type="hidden" name="id" value='.$row["t_id"].'>
		    	
		    	<button type="submit" class=" btn btn-success " name="view" value="view"><i class="fas fa-pen"></i></button>
		    </form>

		    <form action="#" method="POST" class="d-inline">
		    <input type="hidden" name="ids" value='.$row["t_id"].'>
		    	<button type="submit" class=" btn btn-primary " name="delete" value="delete"><i class="far fa-trash-alt"></i></button>
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

	$sql="DELETE FROM technisian WHERE t_id={$_REQUEST['ids']}";
	$query=mysqli_query($conn,$sql);
	if($query==1){
		echo "<meta http-equiv='refresh' content='0;URL=?deleted'";
	}
}
?>


<a class="btn btn-danger box "style="float: right;" href="add_technician.php"><i class="fas fa-plus fa-2x"></i></a>
</div>

<?php
include('include/footer.php');
?>

