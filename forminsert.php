<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Multi user</title>
</head>
<body>
	<form method="post" action="forminsertaction.php" enctype="multipart/form-data">
		Enter Name <input type="text" name="name"><br> 
		Enter Email <input type="text" name="email"><br>
		Enter Password <input type="text" name="pass"><br>
		Enter Phone <input type="text" name="phn"><br>
		add img 1 <input type="file" name="uploadimage1"><br>
		add img 2 <input type="file" name="uploadimage2"><br><br>

		<input type="submit" name="submit" value="Submit">
		<a href="login.php">already login? </a>

	</form>

	
</body>
</html>