<?php
session_start();
$id=$_SESSION['id'];
include('connection.php');
$sql = "SELECT * FROM `multi_image_import` WHERE id='$id'";
$data = mysqli_query($conn,$sql);

?>

<table border="1">
    <tr>
        <th>SL.NO</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Picsource</th>
    </tr>
    <?php
    $i =1;
    while($result=mysqli_fetch_assoc($data))
    {
         $img = explode(',', $result['picsource']);
        ?>
        <tr>
            <td><?php echo $i;$i++;?></td>
            <td><?php echo $result['name']?></td>
            <td><?php echo $result['email']?></td>
            <td><?php echo $result['password']?></td>
            <td><?php echo $result['phone']?></td>
            <td><img src="<?php echo $img[0]?>" height="100" width="100">
            <img src="<?php echo $img[1]?>" height="100" width="100"></td>
        </tr>
        <?php
    }
    ?>
</table>
