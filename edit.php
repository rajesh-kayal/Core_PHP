<?php
session_start();
include('connection.php');
$id=$_GET['ep'];

$sql="SELECT * FROM users WHERE id='$id'";
$data = mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);
$_SESSION['oldpipath']=$result['picture'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Abc</title>

	<link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>

<form method="post" action="editaction.php" enctype="multipart/form-data"> 

<table border="1" cellpadding='10px' cellspacing="0" style="display: flex; justify-content: center;">
	<tr>
	<td colspan="2" id="td1"><h3 align="center"> Registation Form </h3></td>
</tr>
	
	<input type="text" name="uid" value="<?php echo $result['id']?>" hidden>

<tr>
	   <td class="td2"> Enter name: </td> <td>  <input type="text" name="name" placeholder="Name" value="<?php echo $result['name'] ?>" id="input1"></td>
</tr>
<tr>
	<td class="td3"> 	Enter Address1:</td> <td> <input type="text" name="address" placeholder="Address1" value="<?php echo $result['address'] ?>"  id="input2"></td>
</tr>

<tr>
	<td class="td4"> Enter Address2: </td> <td> <textarea name="address2" placeholder="Address2"> <?php echo $result['address2'] ?></textarea> </td>
</tr>


<tr>
	<td class="td5"> Enter Email:</td> <td> <input type="text" name="email" placeholder="Email" value="<?php echo $result['email'] ?>" id="input4"></td>
</tr>

<tr>
	<td class="td8">Enter Phone: </td> 	
	
	<td id="number">  <select name="number" id=" num">
		<option> +91</option>
		<option> +001</option>
		<option> +12</option>
		<option> +55</option>
		<option> +01</option>
			</select>  
<input type="number" name="number" placeholder="Numbr" value="<?php echo $result['mobile'] ?>" id="input7">
			 	
</tr>

<tr>
	<td class="td7">Enter Dob: </td> <td> <input type="date" name="date" value="<?php echo $result['dob'] ?>" id="input6">  </td>
</tr>


<!-- Gender -->
<tr>
	<td class="td9" >Enter Gender: </td>

	<td name="Gender" > 
		<input type="radio" name="Gender" value="Male"<?php if($result['gender']=='Male'){echo "checked";}  ?>> Male
		<input type="radio" name="Gender" value="Female"<?php if($result['gender']=='Female'){echo "checked";}  ?>> Female
		<input type="radio" name="Gender" value="Others"<?php if($result['gender']=='Others'){echo "checked";}  ?>> Others 
		<span id="a5"></span>
	</td>
</tr>

<!-- Degree -->
<tr>
 
 <td> Degree: </td>
  <td>

    <select name="degree">
      <option value="">Select</option>
      <?php
      $degrees=['B.tech', 'M.tech', 'B.sc', 'M.sc'];
      foreach($degrees as $deg){
      	$selecte='';
      	if($result['degree'] == $deg){
      		$selecte='selected';
      	}
      	echo "<option value='$deg' $selecte>".ucfirst($deg)."</option>";
      }
      
      ?>
    </select>
    <span id="a6"></span>
  </td>
</tr>

<!-- 	Languages -->
<tr>
	<?php 
	$langarray=explode(",", $result['language']);
	  ?>
	<td class="td11">Languages:</td> 

	<td> <input type="checkbox" name="Langauge[]" value="English" <?php if(in_array("English", $langarray)){echo "checked";} ?>> English
	<input type="checkbox" name="Langauge[]" value="Hindi"<?php if(in_array("Hindi", $langarray)){echo "checked";} ?>> Hindi
	<input type="checkbox" name="Langauge[]" value="Bengali"<?php if(in_array("Bengali", $langarray)){echo "checked";} ?>>Bengali
	<span name="a7"></span>
	</td>
</tr>

	<td class="td12" id="input11">Upload Image : </td> <td id="img"> <input type="file" name="uploadimage"></td>
</tr>

<tr>
	<td colspan="2" align="center" id="footer"> 	<input type="submit" name="submit" value="Submit" class="submit">
	 <input type="reset" name="reset" value="reset" class="reset"></td>
</tr>


	</table>
</form>



</body>
</html>
