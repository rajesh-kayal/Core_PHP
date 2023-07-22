<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "tts9to12_new";

$conn = mysqli_connect($servername, $username, $password, $db);

if($conn)
{
	// echo "connection successfull";
}
else
{
	echo "NOT Connected";
}
