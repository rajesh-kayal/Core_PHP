<?php
include('connection.php');
$id=$_REQUEST['ublk'];
$sql="UPDATE multi_user SET auth ='0' WHERE id='$id'";
$data=mysqli_query($conn,$sql);
if($data){
	  echo "<script>alert('Now User is unblocked.'); window.location.href='displayclients.php';</script>";
}else{
	echo "Not updated";
}