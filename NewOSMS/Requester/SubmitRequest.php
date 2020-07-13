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

if(isset($_REQUEST['namesubmit'])){
	if(($_REQUEST['inputrequestinfo']=="")||($_REQUEST['inputdescription']=="")||($_REQUEST['inputname']=="")||($_REQUEST['inputaddress_Line_1']=="") ||($_REQUEST['inputaddress_Line_2']=="") ||($_REQUEST['inputcity']=="") ||($_REQUEST['inputstate']=="") ||($_REQUEST['inputzip']=="") || ($_REQUEST['inputemail']=="") ||($_REQUEST['inputmobile']=="")||($_REQUEST['requestdate']=="")){

		$submitmsg='<div class="alert alert-warning mt-2 role="alert"> All fillds are required....</div>';
	}
	else{
			$inputrequestinfo=$_REQUEST['inputrequestinfo'];
			$inputdescription=$_REQUEST['inputdescription'];
			$inputname=$_REQUEST['inputname'];
			$inputaddress_Line_1=$_REQUEST['inputaddress_Line_1'];
			$inputaddress_Line_2=$_REQUEST['inputaddress_Line_2'];
			$inputcity=$_REQUEST['inputcity'];
			$inputstate=$_REQUEST['inputstate'];
			$inputzip=$_REQUEST['inputzip'];
			$inputemail=$_REQUEST['inputemail'];
			$inputmobile=$_REQUEST['inputmobile'];
			$requestdate=$_REQUEST['requestdate'];

		$sql="INSERT INTO submitrequest_tb(request_info,request_desc,requester_name,requester_add1,	requester_add2,requester_city,requester_state,requester_zip,requester_email,requester_mobile,request_date) VALUES ('$inputrequestinfo','$inputdescription','$inputname','$inputaddress_Line_1','$inputaddress_Line_2','$inputcity','$inputstate','$inputzip','$inputemail','$inputmobile','$requestdate')";
		$query=mysqli_query($conn,$sql);
		if($query==1){
			$genid=mysqli_insert_id($conn);
			$submitmsg='<div class="alert alert-success mt-2 role="alert"> Your request has been submitted</div>';
			$_SESSION['myid']=$genid;
			echo "<script> location.href='submitrequestsuccess.php'</script>";
	}
}
	
}



?>

<style>
	.s{
		background-color:#dc3545;
		color:white;
	}
</style>
		<!-- Service reuest form 2nd column -->
		<div class="col-sm-9 col-md-10 mt-5">
			<form action="" method="POST">
				<div class="form-group">
				<label for="inputreuestinfo">Request info</label>
				 <input type="text" class="form-control" id="inputreuestinfo" placeholder="Request Info" name="inputrequestinfo" >
				</div>


				 <div class="form-group">
				<label for="inputDescription">Description</label>
				 <input type="text" class="form-control" id="inputDescription" placeholder="Write Description" name="inputdescription" >
				</div>

				 <div class="form-group">
				<label for="inputName">Name</label>
				 <input type="text" class="form-control" id="inputName" placeholder="Sourabh" name="inputname" >
				</div>

				<div class="form-row" >
				 <div class="form-group col-md-6">
				<label for="inputAddress_Line_1">Address Line 1</label>
				 <input type="text" class="form-control" id="inputAddress_Line_1" placeholder="House No.123" name="inputaddress_Line_1" >
				 </div>
				 <div class="form-group col-md-6">
				<label for="inputAddress_Line_2">Address Line 2</label>
				 <input type="text" class="form-control" id="inputAddress_Line_2" placeholder="Railway colony" name="inputaddress_Line_2" >
				 </div>
				 <div class="form-group col-md-5">
				<label for="inputCity">City</label>
				 <input type="text" class="form-control" id="inputCity" placeholder=" " name="inputcity" >
				 </div>
				 <div class="form-group col-md-5">
				<label for="inputState">State</label>
				 <input type="text" class="form-control" id="inputState" placeholder="State" name="inputstate" >
				 </div>
				 <div class="form-group col-md-2">
				<label for="inputZip">Zip</label>
				 <input type="text" class="form-control" id="inputZip" placeholder="Zip" name="inputzip" >
				 </div>
				 <div class="form-group col-md-5">
				<label for="inputEmail">Email</label>
				 <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="inputemail" >
				 </div>

				 <div class="form-group col-md-2">
				<label for="inputMobile">Mobile</label>
				 <input type="text" class="form-control" id="inputMobile" placeholder="9039583928" name="inputmobile" >
				 </div>

				 <div class="form-group col-md-2">
		        <label for="inputDate">Date</label>
		        <input type="date" class="form-control" id="inputDate" name="requestdate">
		      </div>
				 </div>
				 
				<button type="submit" class="btn btn-danger" name="namesubmit">Submit</button>
		      	<button type="submit" class="btn btn-secondary" name="nameupdate">Reset</button>
		      	
 				
				
				</form>
				<div class="form-group col-md-4">
		        <?php if(isset($submitmsg)){echo $submitmsg;} ?>
		      </div>
				
				 </div>
				 
				
			
			
		</div>
		<!-- service reuest area end -->



<?php
include('include/footer.php')
?>