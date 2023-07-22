<?php

include('connection.php');
$id=$_REQUEST['del'];
$sql="DELETE FROM users WHERE `id`='$id'";
$data=mysqli_query($conn,$sql);

if($data){
	?>
	<script>
		confirm("Are you sure you want to delete this record?");
		window.location.href="display.php";
	</script>
	<?php
}else{
	echo "record not deleted";
}