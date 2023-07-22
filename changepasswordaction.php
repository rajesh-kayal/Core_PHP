<?php
include('connection.php');
session_start();
$id = $_SESSION['id'];
$oldp = sha1($_REQUEST['oldpass']);
$newp = sha1($_REQUEST['newpass']);
$confp = sha1($_REQUEST['confpass']);

if($oldp != $newp){
	$sql="SELECT * FROM users WHERE password ='$oldp'";
	$data=mysqli_query($conn,$sql);
	$result=mysqli_fetch_assoc($data);
	if($result){
		if($newp == $confp){
			$sql="UPDATE users SET password='$newp' WHERE id = '$id'";
			$data=mysqli_query($conn,$sql);
			if($data){
				echo "<script>alert('Password was updated.');</script>";
                    echo "<script>window.location.href='login.php';</script>";
				// echo "password updated";
			}else{
				echo "password not updated";
			}
		}else{
			echo "new password and confirm password not match";
		}

	}else{
		echo "Old password and database password not match";
	}

}else{
	echo "Old password and new password are same";
}