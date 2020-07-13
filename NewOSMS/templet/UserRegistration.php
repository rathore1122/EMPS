<?php
include("dbconnection.php");

if(isset($_REQUEST['rSignup']))
{
   if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST["rPassword"]=="")){

      $regmsg = '<div class="alert alert-warning mt-2 role="alert"> All fillds are required....</div>';

   }
   else{
      $sql=("SELECT r_email FROM requesterlogin_tb WHERE r_email='".$_REQUEST["rEmail"]."'");
      $query=mysqli_query($conn,$sql);
      if($query->num_rows==1){
         $regmsg='<div class="alert alert-warning mt-2 role="alert"> Email id is allready exits...</div>';
      }
      else{
      $rName = $_REQUEST['rName'];
      $rEmail = $_REQUEST['rEmail'];
      $rPassword = $_REQUEST['rPassword'];

      $sql="INSERT INTO Requesterlogin_tb(r_name,r_email,r_password) VALUES ('$rName','$rEmail','$rPassword')";
      $query=mysqli_query($conn,$sql);
      if($query==1){
         $regmsg='<div class="alert alert-success mt-2 role="alert"> Account Crated....</div>';
      }
      else{

         $regmsg='<div class="alert alert-warning mt-2 role="alert"> Unable to Create Account....</div>';
      
      }
      }

   }
   
}
?>



<!-- Start Registration Form -->
<div class="container pt-5"  id="registration">
   	<h2 class="text-center">Create an Account</h2>
   	<div class="row mt-4 mb-4">
   		<div class="col-md-6 offset-md-3">
   			<form action="" method="POST" class="shadow-lg p-4">

   			<div class="form-group">
   				<i class="fas fa-user"></i><label for=" " class="font-weight-bold pl-2">Name</label>
   				<input type="text" name="rName" class="form-control" placeholder="Name">
   			</div>


   			<div class="form-group">
   				<i class="fas fa-user"></i><label for=" " class="font-weight-bold pl-2">Email</label>
   				<input type="email" name="rEmail" class="form-control" placeholder="Email">
   				<small class="form-text">We'll never share your email with enyone else...</small>
   			</div>


   			<div class="form-group">
   				<i class="fas fa-key"></i><label for=" " class="font-weight-bold pl-2">New Password</label>
   				<input type="password" name="rPassword" class="form-control" placeholder="Password">
   			</div>

   			<button type=" submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sing Up</button>
   			<em class="font-italic" style="font-size: 10px">Note - By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy.</em>

             <?php if(isset($regmsg)){echo $regmsg;}?>  

   			</form>
   			
   		</div>
   		
   	</div>
   	
   </div>

   <!-- End Registration Form -->
