<?php
   session_start();//$_SESSION 
   function generateRandomString($str,$length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= substr(md5($str),0,4).$characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
   #To see entire Data from the html form 
   print '<pre>';
   print_r($_POST);
   print_r($_FILES); //-->file info will be shown.
   #Database Connectivity
   define("HOST",'127.0.0.1');
   define("USERNAME","root");
   define("PASSWORD","");
   define("DB","hiiDB");

   #Accepting text values from html form.
   $name        = $_POST['t1'];
   $phone       = $_POST['t2'];
   $email       = $_POST['t3'];
   $pass1       = $_POST['p1'];
   $hashPass    = generateRandomString($pass1);

   
   #Accepting the input file 
   $filename = time()."_".$_FILES['avatar']['name'];
   $fileType = $_FILES['avatar']['type'];
   $fileSize = $_FILES['avatar']['size'];//bytes
   $fileTmp  = $_FILES['avatar']['tmp_name'];

   $uploadPath ='./uploads/'.$filename;
   
   if($fileType == 'image/jpg' || $fileType=='image/jpeg' || $fileType =='image/png' || $fileType=='image/gif'){
      if($fileSize<100*1024){
     move_uploaded_file($fileTmp, $uploadPath);

     //now rest of the code will go here ...
       try{
   $con = new MYSQLi(HOST,USERNAME,PASSWORD,DB);
   #Checking the connectivity error status
   if($con->connect_error) die($con->connect_error);
   else {
      #Passing the SQL Statement in order to insert a new row into exisiting table i.e users.
      /*$SQL="insert into users(name,phone,email,pass1)values('$name','$phone','$email','$hashPass')";
    Calling a StoredProcedure.
    */
    $stmt = $con->prepare('call addUser(?,?,?,?,?)');
    $stmt->bind_param('sssss',$name,$phone,$email,$hashPass,$uploadPath);


      #Executing the SQL Statement 
      //$con->query($SQL);
      $stmt->execute();
      $rows = $stmt->affected_rows;
         /*
      if($rows == 1)
         echo "SignUP Successfull !";
      else 
         echo "Error while Signup !";
      */
         if($rows ==1){
              $_SESSION['message'] ="<div class='alert alert-success'>You have successfully Sign Up.</div>";
         }
         else {
              $_SESSION['message']="<div class='alert alert-danger'>Unable to SignUP !</div>";
         }
      #Close the Database Connection 
      $con->close();
   }
}
   catch(Exception $e){
        $_SESSION['message']="<div class='alert alert-warning'>Phone number or Email Already registerd With US !</div>";
   }
   finally{
         echo "<script>
                window.location.href='signup.php';
         </script>";
   }

       }
       else{
         $_SESSION['message']="<div class='alert alert-danger'>Image file is too large to upload..</div>";
       }
   
   }else {
       $_SESSION['message']="<div class='alert alert-danger'>Only image files are acceptable i.e *.jpeg | *.jpg | *.png |*.gif</div>";
   }

   echo "<script>
                window.location.href='signup.php';
         </script>";
 ?>