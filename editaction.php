<?php

include('connection.php');

$id = $_REQUEST['uid'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phn'];

$filename = $_FILES['uploadimage']['name']; // name of the image
$tempname = $_FILES['uploadimage']['tmp_name']; // path of the image
$folder = 'image/' . $filename; // destination
move_uploaded_file($tempname, $folder);

$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $sql);


	$sql = "UPDATE `user` SET `name`='$name', `email`='$email', `phone`='$phone', `picsource`='$folder' WHERE `user_id`='$id'";

	$data = mysqli_query($conn, $sql);

	if($data){
		header("Location: display.php");
	} else {
		echo "Not updated";
	}

?>
