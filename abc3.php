<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <?php
           $id = isset($_GET['id']) ? $_GET['id'] : 0;
           $user =[];
          define("HOST",'localhost'); //127.0.0.1
          define("USERNAME",'root');
          define("PASSWORD",'');
          define("DB",'hiiDB');

          $con = new MYSQLi(HOST,USERNAME,PASSWORD,DB);
          if($con->connect_error) die($con->connect_error);
          else {
          	$SQL="select * from users where user_id=$id";
          	$resultSet= $con->query($SQL);
            while($rows = $resultSet->fetch_assoc()){
          	$created = strtotime($rows['created']);
          	$customDate = date('d-m-y h:i:sA',$created);
               $user = [
                     'NAME' => $rows['name'],
                     'PHONE'=> $rows['phone'],
                     'EMAIL'=> $rows['email'],
                     'PROFILE_PIC'=>$rows['profile_pic'],
                     'CREATED'=>$customDate
               ];
           }
          // print '<pre>';
          // print_r($user);
           $con->close();
          }
   ?>
       <div class="card">
       	    <div class="card-header">
       	    	<h4><?php echo $user['NAME'];?>'s Info:</h4>
       	    </div>
       	    <div class="card-body">
       	    	<p>Name :<?php echo $user['NAME'];?> </p>
       	    	<p>Phone : <?php echo $user['PHONE'];?></p>
       	    	<p>Email : <?php echo $user['EMAIL'];?></p>
                <p>
                     <img src="<?php echo $user['PROFILE_PIC'];?>" height="120px" width="120px" title="<?php echo $user['NAME']; ?>'s Pic" alt="no image">
                     <a href="change.php">Change Profile Pic:</a>
                </p>
       	    	<p>Account Creation : <?php echo $user['CREATED'];?></p>
       	    	<a href="index.php">Back</a>
       	    </div>
       </div>

</body>
</html>