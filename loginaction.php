<?php
session_start();
include('connection.php');
$email = $_REQUEST['email'];
$pass = md5($_REQUEST['pass']);

$sql="SELECT * FROM multi_user WHERE email='$email' AND password='$pass'";
$data=mysqli_query($conn,$sql);
$total=mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
$_SESSION['name']=$result['name'];
if($total){
	if($result['auth']==0){
		if($result['user']=='admin'){
			header('Location:displayclients.php');
		}else{
			$_SESSION['id']=$result['id'];
			header('Location:displayclient.php');
		}
	}else{
		echo "You are blocked by admin";
	}
}else{
	echo "login failed!";
}








// $sql = "SELECT * FROM multi_user WHERE email='$email' AND password='$pass' AND user='client'";
// $data = mysqli_query($conn, $sql);
// $result = mysqli_fetch_assoc($data);//"mysqli_fetch_assoc retrieves a single row of data as an associative array from a database query result."
// if ($result) {
// 	 $_SESSION['id'] = $result['id'];
//     header("Location:displayclient.php");
// } else {
//     $sql = "SELECT * FROM multi_user WHERE email='$email' AND password='$pass' AND user='admin'";
//     $data = mysqli_query($conn, $sql);
//     $result = mysqli_num_rows($data);//mysqli_num_rows is used to check if user data exists in our table. If the user exists, it returns all of their data.

//     if ($result) {
//         header("Location:displayclients.php");
//     } else {
//         echo "Login failed";
//     }
// }
// ?>