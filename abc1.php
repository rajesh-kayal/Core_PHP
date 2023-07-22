<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Welcome</title>
</head>
<body>
     <div class="container">
     	<header class="modal-header"><h4>SignUP:</h4></header>
     	<form method="post" enctype="multipart/form-data" action="submit.php">
     	<div class="form-group">
     		<label>Name :</label>
     		<input type="text" name="t1" id="t1" required class="form-control">
     	</div>
     	<div class="form-group">
     		<label>Phone :</label>
     		<input type="number" name="t2" id="t2" required class="form-control">
     	</div>
     	<div class="form-group">
     		<label>Email :</label>
     		<input type="text" name="t3" id="t3" required class="form-control">
     	</div>
      <!--Adding the file upload controls-->
      <div class="form-group">
          <label>Upload Profile Pic:</label>
          <input type="file" id="avatar" name="avatar" required class="form-control">

      </div>
     	<div class="form-group">
     		<label>Password:</label>
     		<input type="password" name="p1" id="p1" required class="form-control">
     	</div>
     	<div class="form-group">
     		<label>Confirm Password:</label>
     		<input type="password" name="p2" id="p2" required class="form-control">
     	</div>
     	<div class="form-group">
     		<button class="btn btn-sm btn-outline-primary">Submit</button> |
     		<button type="reset" class="btn btn-sm btn-outline-info">Reset</button>
     	</div>
        </form>
 
      <?php 
             
              if(isset($_SESSION['message'])){
              	echo $_SESSION['message'];
                session_destroy(); 
              }

      ?>

     </div>
</body>
</html>