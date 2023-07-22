<?php
session_start();
include('connection.php');
$id=$_REQUEST['uid'];

$name = $_POST['name'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$email = $_POST['email'];
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
$oldpic=$_SESSION['oldpicpath'];

if($folder=='image/'){
  $sql = "UPDATE `users` SET `name`='$name',`address`='$address',`address2`='$address2',`email`='$email',`mobile`='$mobile',`dob`='$dob',`gender`='$gender',`degree`='$degree',`language`='$language',`picture`='$oldpic' WHERE `id`='$id'";
$data =mysqli_query($conn,$sql);

if($data){
   // echo "Data Inserted successfully";
    ?>
  <script>
    alert("Data Updated Successfully");
    window.location.href= 'display.php';
  </script>
  <?php

}else{
  echo 'Data Not Updated';
}
}else{

$sql = "UPDATE `users` SET `name`='$name',`address`='$address',`address2`='$address2',`email`='$email',`mobile`='$mobile',`dob`='$dob',`gender`='$gender',`degree`='$degree',`language`='$language',`picture`='$folder' WHERE `id`='$id'";
$data =mysqli_query($conn,$sql);

if($data){
   // echo "Data Inserted successfully";
    ?>
  <script>
    alert("Data Updated Successfully");
    window.location.href= 'display.php';
  </script>
  <?php

}else{
  echo 'Data Not Updated';
}
}