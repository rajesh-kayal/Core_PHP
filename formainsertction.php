<?php
include('connection.php');

$name = $_POST['name'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$email = $_POST['email'];
$password =sha1($_POST['password']);
$mobile = $_POST['number'];
$dob = $_POST['date'];

$gender = $_POST['Gender'];
$degree = $_POST['degree'];
$language =implode(",",$_POST['Langauge']);

//image
$filename= $_FILES['uploadimage']['name'];
$tmpname=$_FILES['uploadimage']['tmp_name'];
$folder = 'image/'.$filename; 
move_uploaded_file($tmpname, $folder);

$sql="SELECT * FROM users WHERE email='$email'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
  echo"<script> alert('Opp! This email already exists');
    window.location.href= 'form.php';
  </script>";

}else{
  $sql = "INSERT INTO `users`(`id`, `name`, `address`, `address2`, `email`, `password`, `mobile`, `dob`, `gender`, `degree`, `language`,`picture`) VALUES ('','$name','$address','$address2','$email','$password','$mobile','$dob','$gender','$degree','$language','$folder')";
$data =mysqli_query($conn,$sql);

if($data){
   // echo "Data Inserted successfully";
    ?>
  <script>
    alert("Data inserted Successfully");
    window.location.href= 'login.php';
  </script>
  <?php

}else{
  echo 'Data Not Inserted';
}
}



?>

