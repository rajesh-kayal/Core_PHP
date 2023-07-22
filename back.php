<?php
include('connection.php');
session_start();
$id =$_session['id'];
$oldp =md5($_REQUEST['oldpass']);
$newp =md5($_REQUEST['newpass']);
$confp =md5($_REQUEST['confpass']);
	
	if($oldp!=$newp);
	{
		if($newp==$conp)
		{
			$spl ="UPDATE `user_1` SET `password`='$confp' WHERE `user_id`='$id'";
			$data = mysqli_query($conn, $sql);

			if ($data)
			{
				echo "<script>alert('password was update');</script>";
				echo "<script>window.location.href='login.php';</script>";
			}else
				echo "newp and confp are not same"
		}

	}
	else
		{
			echo "oldp and newp are same";
		}
?>
