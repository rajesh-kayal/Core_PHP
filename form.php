
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mini project Session Final</title>

	<link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>

<form method="post" action="formainsertction.php" enctype="multipart/form-data"> 

<table border="1" cellpadding='10px' cellspacing="0" style="display: flex; justify-content: center;">
	<tr>
	<td colspan="2" id="td1"><h3 align="center"> Registation Form </h3></td>
</tr>

<tr>
	   <td class="td2"> Enter name: </td> <td>  <input type="text" name="name" placeholder="Name"  id="input1"></td>
</tr>
<tr>
	<td class="td3"> 	Enter Address1:</td> <td> <input type="text" name="address" placeholder="Address1"  id="input2"></td>
</tr>

<tr>
	<td class="td4"> Enter Address2: </td> <td> <textarea name="address2" placeholder="Address2"  id="input3"></textarea> </td>
</tr>


<tr>
	<td class="td5"> Enter Email:</td> <td> <input type="text" name="email" placeholder="Email"  id="input4"></td>
</tr>
<tr>
	<td class="td6"> Enetr Password :</td> <td> <input type="password" name="password" placeholder="Password"  id="input1"> </td>
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
<input type="number" name="number" placeholder="Numbr"  id="input7">
			 	
</tr>

<tr>
	<td class="td7">Enter Dob: </td> <td> <input type="date" name="date" id="input6">  </td>
</tr>


<!-- Gender -->
<tr>
	<td class="td9" >Enter Gender: </td>

	<td name="Gender" > 
		<input type="radio" name="Gender" value="Male"> Male
		<input type="radio" name="Gender" value="Female"> Female
		<input type="radio" name="Gender" value="Others"> Others 
		<span id="a5"></span>
	</td>
</tr>

<!-- Degree -->
<tr>
 
 <td> Degree: </td>
  <td>

    <select name="degree">
      <option value="">Select</option>
      <option value="B.tech">B.tech</option>
      <option value="M.tech">M.tech</option>
      <option value="B.sc">B.sc</option>
      <option value="M.sc">M.sc</option>
    </select>
    <span id="a6"></span>
  </td>
</tr>

<!-- 	Languages -->
<tr>
	<td class="td11">Languages:</td> 

	<td> <input type="checkbox" name="Langauge[]" value="English"> English
	<input type="checkbox" name="Langauge[]" value="Hindi"> Hindi
	<input type="checkbox" name="Langauge[]" value="Bengali"> Bengali
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
