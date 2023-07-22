<?php
session_start();
session_unset();
$logout=session_destroy();

if($logout){
	echo "<script>alert('logout'); window.location.href='login.php';</script>";
}
?>
