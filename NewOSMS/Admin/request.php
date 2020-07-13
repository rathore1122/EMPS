<?php
define('TITLE','Request');
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
	.r{
		background-color:#dc3545;
		color:white;
	}
</style>




<!--start second colum-->
<div class="col-sm-4">
	<?php 
	$sql="SELECT request_id,request_info,request_desc,request_date FROM submitrequest_tb ";
	$query=mysqli_query($conn,$sql);
	if($query->num_rows > 0){
		while($row=$query->fetch_assoc()){
			
			echo  "<div class='card' style='margin-top:10%; margin-left:5%;'>";
			echo "<div class='card-header bg-light'>";
			echo"Request ID:".$row['request_id'];
			echo "</div>";
			echo "<div class='card-body'>";
			echo "<h5 class='card-title '>Request Info: ".$row['request_info']; 
			echo "</h5>";
			echo "<p class='card-text'>".$row['request_desc'];
			echo"</p>";
			echo "<p class='card-text'>".$row['request_date'];
			echo"</p>";
			echo "<div class='float-right'>";
			 echo '<form action="" method="POST"> <input type="hidden" name="id" value='. $row["request_id"] .'><input type="submit" class="btn btn-danger mr-3" name="view" value="View"><input type="submit" class="btn btn-secondary" name="close" value="Close"></form>';
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
	}
	 ?>
	
</div>




<!-- End request card section -->
<?php


if(isset($_REQUEST['view'])){
	$sql="SELECT * FROM submitrequest_tb WHERE request_id='".$_REQUEST['id']."'";
	$query=mysqli_query($conn,$sql);
	if($query->num_rows==1){
		$row=$query->fetch_assoc();
		$r_d=$row['request_desc'];
		$r_n=$row['requester_name'];
		$r_a1=$row['requester_add1'];
		$r_a2=$row['requester_add2'];
		$r_c=$row['requester_city'];
		$r_s=$row['requester_state'];
		$r_z=$row['requester_zip'];
		$r_email=$row['requester_email'];
		$r_mobile=$row['requester_mobile'];
}
}
?>
<?php
if(isset($_REQUEST['namesubmit'])){
	if(($_REQUEST['inputrequestid']=="")||($_REQUEST['inputdescription']=="")||($_REQUEST['inputname']=="")||($_REQUEST['inputaddress_Line_1']=="")||($_REQUEST['inputaddress_Line_2']=="")||($_REQUEST['inputcity']=="")||($_REQUEST['inputstate']=="")||($_REQUEST['inputzip']=="")||($_REQUEST['inputemail']=="")||($_REQUEST['inputmobile']=="")||($_REQUEST['inputassign']=="")||($_REQUEST['requestdate']=="")){

		$msg= '<div class="alert alert-danger mt-2 role="alert"> All fields are required....</div>';
	}
	else{
			$inputId=$_REQUEST['inputrequestid'];
			$inputDescription=$_REQUEST['inputdescription'];
			$inputName=$_REQUEST['inputname'];
			$inputAddress_Line_1=$_REQUEST['inputaddress_Line_1'];
			$inputAddress_Line_2=$_REQUEST['inputaddress_Line_2'];
			$inputCity=$_REQUEST['inputcity'];
			$inputState=$_REQUEST['inputstate'];
			$inputZip=$_REQUEST['inputzip'];
			$inputEmail=$_REQUEST['inputemail'];
			$inputMobile=$_REQUEST['inputmobile'];
			$inputassign=$_REQUEST['inputassign'];
			$inputDate=$_REQUEST['requestdate'];


		$sql="INSERT INTO assignwork_tb(request_id,request_desc,requester_name,requester_add1,requester_add2,	requester_city,requester_state,requester_zip,requester_email,requester_mobile,assign_tech,assign_date) VALUES ('$inputId','$inputDescription','$inputName','$inputAddress_Line_1','$inputAddress_Line_2','$inputCity','$inputState','$inputZip','$inputEmail','$inputMobile','$inputassign','$inputDate')";
		
		$query=mysqli_query($conn,$sql);
			if($query == 1){
				$msg= '<div class="alert alert-success mt-2 role="alert"> Assign Successfull...</div>';
			}
			else{
				$msg='<div class="alert alert-danger mt-2 role="alert"> Went to wrong please try again...</div>';
			}
		}
}

?>

<div class="col-sm-5 ">
	<div class="jumbotron bg-light mt-5">
		<form action="" method="POST ">
			<h3 class="text-center">Assign Work Order Request</h3>
			<br>
				<div class="form-group">
				<label for="inputreuestinfo">Request Id</label>
				 <input type="text" class="form-control" id="inputId" value="<?php if(isset ($_REQUEST['id'])){echo $_REQUEST['id'];}?>" placeholder="Request Info" name="inputrequestid" readonly >
				</div>


				 <div class="form-group">
				<label for="inputDescription">Description</label>
				 <input type="text" class="form-control" id="inputDescription" placeholder="Write Description" value="<?php if(isset($_REQUEST['id'])){echo $r_d;}?>" name="inputdescription" >
				</div>

				 <div class="form-group">
				<label for="inputName">Name</label>
				 <input type="text" class="form-control" id="inputName" placeholder="Sourabh" value="<?php if(isset($_REQUEST['id'])){echo $r_n ;}?>" name="inputname" >
				</div>

				<div class="form-row" >
				 <div class="form-group col-md-6">
				<label for="inputAddress_Line_1">Address Line 1</label>
				 <input type="text" class="form-control" id="inputAddress_Line_1" value="<?php if(isset($_REQUEST['id'])){echo $r_a1 ;}?>"placeholder="House No.123" name="inputaddress_Line_1" >
				 </div>
				 <div class="form-group col-md-6">
				<label for="inputAddress_Line_2">Address Line 2</label>
				 <input type="text" class="form-control" id="inputAddress_Line_2" value="<?php if(isset($_REQUEST['id'])){echo $r_a2 ;}?>"placeholder="Railway colony" name="inputaddress_Line_2" >
				 </div>
				 <div class="form-group col-md-5">
				<label for="inputCity">City</label>
				 <input type="text" class="form-control" id="inputCity" placeholder=" "
				 value="<?php if(isset($_REQUEST['id'])){echo $r_c ;}?>" name="inputcity" >
				 </div>
				 <div class="form-group col-md-4">
				<label for="inputState">State</label>
				 <input type="text" class="form-control" id="inputState" value="<?php if(isset($_REQUEST['id'])){echo $r_s ;}?>" placeholder="State" name="inputstate" >
				 </div>
				 <div class="form-group col-md-3">
				<label for="inputZip">Zip</label>
				 <input type="text" class="form-control" id="inputZip" value="<?php if(isset($_REQUEST['id'])){echo $r_z ;}?>" placeholder="Zip" name="inputzip" >
				 </div>
				 <div class="form-group col-md-8">
				<label for="inputEmail">Email</label>
				 <input type="text" class="form-control" id="inputEmail" value="<?php if(isset($_REQUEST['id'])){echo $r_email ;}?>" placeholder="Email" name="inputemail" >
				 </div>

				 <div class="form-group col-md-4">
				<label for="inputMobile">Mobile</label>
				 <input type="text" class="form-control" id="inputMobile" value="<?php if(isset($_REQUEST['id'])){echo $r_mobile ;}?>" placeholder="9039583928" name="inputmobile" >
				 </div>

				 <div class="form-group col-md-8">
				<label for="inputMobile">Assign to Technician</label>
				 <input type="text" class="form-control" id="inputassign" placeholder="" name="inputassign" >
				 </div>

				 <div class="form-group col-md-3">
		        <label for="inputDate">Date</label>
		        <input type="date" class="form-control" id="inputDate" name="requestdate" >
		      </div>

		      

				 </div>
				 
				<button type="submit" class="btn btn-danger" name="namesubmit">Submit</button>
		      	<button type="submit" class="btn btn-secondary" name="nameupdate" > Reset </button>
		      	
 				 
				
				</form>
				<?php if(isset($_REQUEST['namesubmit'])){echo $msg ; } ?>

		
	</div>


	
</div>
<?php

if(isset($_REQUEST['close'])){
	$sqli="DELETE FROM submitrequest_tb WHERE request_id='".$_REQUEST['id']."' ";
	$queryi=mysqli_query($conn,$sqli);
	if($queryi==1){
		 // echo "Record Deleted Successfully";
	    // below code will refresh the page after deleting the record
	    echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
	}
}

?>

<?php
include('include/footer.php');
?>