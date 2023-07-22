<?php

include('connection.php');
$name = $_POST['name'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$phone = $_POST['phn'];

$filename = $_FILES['uploadimage']['name'];//nameof the image
$tempname=$_FILES['uploadimage']['tmp_name'];//path of the image
$folder = 'image/'.$filename; //destination
move_uploaded_file($tempname, $folder);

$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
	echo "email already exists";
}else{
	$sql = "INSERT INTO `user` (`name`, `email`, `password`, `phone`,`picsource`) 
			VALUES ('$name', '$email', '$pass', '$phone','$folder')";

	$data = mysqli_query($conn, $sql);

	if($data){
		header("Location:login.php");
	}else{
		echo "Not inserted";
	}
}
