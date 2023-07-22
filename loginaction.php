<?php
session_start();
include('connection.php');
$email = $_REQUEST['email'];
$pass = md5($_REQUEST['pass']);

$sql = "SELECT * FROM `multi_image_import` WHERE email='$email' AND password='$pass'";
$data = mysqli_query($conn, $sql);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

if($result){
        $_SESSION['id']=$result['id'];
        header('Location:display.php');
}else{
    echo 'login failure!';
}
?>