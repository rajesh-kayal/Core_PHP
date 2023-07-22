<?php

include('connection.php');
$name = $_POST['name'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$phone = $_POST['phn'];

$sql="SELECT * FROM multi_user WHERE email='$email'";
$data=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);
if($result > 0){

	echo "<script>alert('this email already exists!.');
	window.location.href='forminsert.php'; </script>";
}else{

	$sql = "INSERT INTO `multi_user`( `name`, `email`, `password`,`phone`, `user`,`auth`) VALUES ('$name','$email','$pass','$phone','client','0')";

	$data = mysqli_query($conn, $sql);

	if($data){
		header("Location:login.php");
	}else{
		echo "Not inserted";
	}
}