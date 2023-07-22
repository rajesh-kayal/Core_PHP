<?php
include("connection.php");
$email =$_POST['email'];
$pass=sha1($_POST['Password']);
$sql="SELECT * FROM users WHERE email='$email' AND password='$pass'";
$data=mysqli_query($conn,$sql);
$total=mysqli_num_rows($data);

if($total){
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
