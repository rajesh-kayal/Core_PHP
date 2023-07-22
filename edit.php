<?php
include('connection.php');
$id= $_REQUEST['ep'];
$sql="SELECT * FROM user WHERE user_id='$id'";
$data = mysqli_query($conn,$sql);
$result =mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form method="post" action="editaction.php" enctype="multipart/form-data">
		Enter Name <input type="text" name="name" value="<?php echo $result['name']?>"><br> 
		<input type="text" name="uid" value="<?php echo $id?>" hidden>
		Enter Email<input type="text" name="email" value="<?php echo $result['email']?>"><br>
		Enter Phone<input type="text" name="phn" value="<?php echo $result['phone']?>"><br><br>
		Enter Image<input type="file" name="uploadimage"><br><br>

		<input type="submit" name="submit" value="Submit">

	</form>

	
</body>
</html>