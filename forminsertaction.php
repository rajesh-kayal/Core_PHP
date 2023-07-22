<?php
include('connection.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $phone = $_POST['phn'];

        $filename1 = $_FILES['uploadimage1']['name'];
        $tempname1=$_FILES['uploadimage1']['tmp_name'];
        $folder1 = 'image/'.$filename1;
        move_uploaded_file($tempname1, $folder1);

        $filename2 = $_FILES['uploadimage2']['name'];
        $tempname2=$_FILES['uploadimage2']['tmp_name'];
        $folder2 = 'image/'.$filename2;
        move_uploaded_file($tempname2, $folder2);

        $folder= $folder1. ' , ' .$folder2;
        // echo $name,$email,$pass,$phone;
        // print_r($_FILES['uploadimage1']);
        // print_r($_FILES['uploadimage2']);

            $sql = "INSERT INTO `multi_image_import`(`name`, `email`, `password`, `phone`, `picsource`) VALUES ('$name','$email','$pass','$phone','$folder')";
            $data = mysqli_query($conn, $sql);
            if($data){
                header("Location:login.php");
            }else{
                echo "Not inserted";
            }
        
    

?>