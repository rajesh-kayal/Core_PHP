<?php
include('connection.php');
$sql="SELECT * FROM users";
$data = mysqli_query($conn,$sql);

// $result = mysqli_fetch_assoc($data);
// print_r($result);
?>
<a href="form.php">Add New Record</a>
<table border="1" cellpadding="20" cellspacing="1">
	<tr>
		<th>SL.NO</th>
		<th>Name</th>
		<th>Address</th>
		<th>Address2</th>
		<th>Email</th>
		<th>Password</th>
		<th>Mobile</th>
		<th>DOB</th>
		<th>Gender</th>
		<th>Degree</th>
		<th>Language</th>
		<th>Picture</th>
		<th>Action</th>
	</tr>
	<?php
	$i = 1;
	while($result=mysqli_fetch_assoc($data))
	{
	?>
	<tr>
		<td><?php echo $i; $i++;?></td>
		<td><?php echo $result['name']?></td>
		<td><?php echo $result['address']?></td>
		<td><?php echo $result['address2']?></td>
		<td><?php echo $result['email']?></td>
		<td><?php echo $result['password']?></td>
		<td><?php echo $result['mobile']?></td>
		<td><?php echo $result['dob']?></td>
		<td><?php echo $result['gender']?></td>
		<td><?php echo $result['degree']?></td>
		<td><?php echo $result['language']?></td>
		<td><img src="<?php echo $result['picture']?>"height='100' width='100'></td>
		<td><a href="edit.php?ep=<?php echo $result['id']; ?>">Edit</a>
		<a href="delete.php?del=<?php echo $result['id']; ?>">Delete</a></td>
	</tr>
	<?php
	}
?>
</table>