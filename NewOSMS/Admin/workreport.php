<?php
define('TITLE','Work Report');
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
	.wo{
		background-color:#dc3545;
		color:white;
	}
</style>


<div class="col-sm-9 col-md-10 mt-5 text-center">
  <form action="" method="POST" class="d-print-none">
    <div class="form-row">
      <div class="form-group col-md-2">
        <input type="date" class="form-control" id="startdate" name="startdate">
      </div> <span> to </span>
      <div class="form-group col-md-2">
        <input type="date" class="form-control" id="enddate" name="enddate">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
      </div>
    </div>
  </form>
  <?php
 if(isset($_REQUEST['searchsubmit'])){
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];
    // $sql = "SELECT * FROM customer_tb WHERE cpdate BETWEEN '2018-10-11' AND '2018-10-13'";
    $sql = "SELECT * FROM assignwork_tb WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
     echo '
  <p class=" bg-dark text-white p-2 mt-4">Details</p>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Requester Info</th>
        <th scope="col">Description</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Address2</th>
        <th scope="col">City</th>
        <th scope="col">State</th>
        <th scope="col">Zip</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Assign Engineer</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_assoc()){
      echo '<tr>
        <th scope="row">'.$row["rno"].'</th>
        <td>'.$row["request_info"].'</td>
        <td>'.$row["request_desc"].'</td>
        <td>'.$row["requester_name"].'</td>
        <td>'.$row["requester_add1"].'</td>
        <td>'.$row["requester_add2"].'</td>
        <td>'.$row["requester_city"].'</td>
        <td>'.$row["requester_state"].'</td>
        <td>'.$row["requester_zip"].'</td>
        <td>'.$row["requester_email"].'</td>
        <td>'.$row["requester_mobile"].'</td>
        <td>'.$row["assign_tech"].'</td>
        <td>'.$row["assign_date"].'</td>
      </tr>';
    }
    echo '<tr>
    <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form></td>
  </tr></tbody>
  </table>';
  } else {
    echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
  }
 }
  ?>
</div>
</div>
</div>

<?php
include('include/footer.php');
?>