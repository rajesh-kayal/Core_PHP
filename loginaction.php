<?php
session_start();
include("connection.php");
$email =$_POST['email'];
$pass=sha1($_POST['password']);
$sql="SELECT * FROM users WHERE email='$email' AND password='$pass'";
$data=mysqli_query($conn,$sql);
$total=mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);

if($result){
	$_SESSION['id']=$result['id'];
			?>
		<script>
			alert('login successfully');
			window.location.href ='display.php';
		</script>
		<?php
	// header('location:display.php');
}else{
	echo "login failure";
}
?>