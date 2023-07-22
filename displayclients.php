<?php
session_start();

include('connection.php');
$sql = "SELECT * FROM multi_user";
$data = mysqli_query($conn,$sql);
?>
<span>Welcome <?php echo $_SESSION['name'] ?></span>
<table border="1" cellpadding="10px" cellspacing="0" >
	<tr>
		<th>SL.NO</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Phone</th>
		<th>User</th>
		<th>Action</th>
	</tr>
	<?php
	$i =1;
	while($result=mysqli_fetch_assoc($data))
	{
		?>
		<tr>
			<td><?php echo $i;$i++;?></td>
			<td><?php echo $result['name']?></td>
			<td><?php echo $result['email']?></td>
			<td><?php echo $result['password']?></td>
			<td><?php echo $result['phone']?></td>
			<td><?php echo $result['user']?></td>
			<td>
				<a href="blk.php?blk=<?php echo $result['id']?>">block</a>
				<a href="ublk.php?ublk=<?php echo $result['id']?>">ublock</a>
			</td>
		<?php
		//$i++;
	}
	?>
</table>