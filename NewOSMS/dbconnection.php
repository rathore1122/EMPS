<?php
$db_host="localhost";
$username="root";
$password="";
$db_name="newosms";
$db_port=3307;

//create connection
$conn= mysqli_connect($db_host,$username,$password,$db_name,$db_port);

//checking connection
if($conn->connect_error){
	die("Connection Faild");
}
// else{
// 	echo("Connection Successfull");
// }
?>