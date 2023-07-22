<?php
include('connection.php');
$id=$_REQUEST['blk'];
$sql="UPDATE multi_user SET auth ='1' WHERE id='$id'";
$data=mysqli_query($conn,$sql);
if($data){
	  echo "<script>alert('Now User is blocked.'); window.location.href='displayclients.php';</script>";
}else{
	echo "Not updated";
}