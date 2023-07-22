<?php
include('connection.php');
$email= $_REQUEST['email'];
$pass= md5($_REQUEST['pass']);

$sql= "SELECT * FROM user WHERE email='$email' AND password='$pass'";
$data = mysqli_query($conn,$sql);
$total = mysqli_num_rows($data);

if($total){
	// echo "Login successful";
		header("Location:display.php");
}else{
	echo "Login failed";
}
?>
