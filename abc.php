<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Welcome</title>
</head>
<body>
	 <div class="container-fluid">
      	 <section class="table-responsive">
      	    <table class="table table-hover table-bordered">
	    	<tr>
	    		<th>#</th> 
	    		<th>Name:</th>
	    		<th>Phone:</th>
	    		<th>Email:</th>
          <th>Profile Pic:</th>
	    		<th>Created:</th>
	    	</tr>
	    

	   <?php
           /*
           FAQ: State the difference between MYSQLI vs PDO:
               To Connect with MYSQL, PHP has provided 2 built in classes,
               i)MySQLi ==> only let PHP to communicate with MYSQL Server .
               ii)PDO[PHP Data Objects]   ==>
               it can communicate with 12 different 
               databases apart from MYSQL, e.g oracle,sqlite,sqlserver,postgreSQL and many more.
               PDO also provides anti SQL Injection 
               so it is more secured compare to MYSQLI
               and mostly recommended for Industry practice.

           */
          define("HOST",'localhost'); //127.0.0.1
          define("USERNAME",'root');
          define("PASSWORD",'');
          define("DB",'hiiDB');

          $con = new MySQLi(HOST,USERNAME,PASSWORD,DB);

          #Check the connection with MYSQL Server.
          if($con->connect_error)
          	die($con->connect_error);
          else{ 
          	#echo "Connection Successfull !";
            $SQL="select * from users";
            #Now executing the SQL
            $resultSet =$con->query($SQL);
            //print_r($resultSet); 
            /*
              To retrieve the value from resultSet
              Object PHP MYSQLi class are having following functions.
              i)fetch_array()  --> it will process the Database Table records by its index as well as its column name in both way.
              $rows['name'] or $rows[1]
              fetch_array => fetch_Assoc + fetch_row.
              ii)fetch_assoc() => it will only processed Table records interms of an associative array where column name becomes the key and column value becomes the value .
              column=>value
              $rows['name'] -->Permitted $rows[1]-->Error.
              iii)fetch_row() --> it will process the table records as neumerical index only .
              it can't allow column name as key .
              $rows[1] -->Permitted . $rows['email']==>error.
            */
              //print '<pre>';
              while($rows = $resultSet->fetch_assoc()){
              	   // print_r($rows);
              	    //echo $rows['name'];//Error
              	    //echo $rows[1];
              	$created = strtotime($rows['created']);
              	$customDate = date('d-m-y h:i:sA',$created);


              	?>
              	  	<tr>
              	  		<td>
              	  			<a href="info.php?id=<?php echo $rows['user_id'];?>">View</a>
              	  		</td>
	    		 <td><?php echo $rows['name'];?></td>
	    		 <td><a href="tel:<?php echo $rows['phone'];?>"><?php echo $rows['phone'];?></a></td>
	    		 <td><a href="mailto:<?php echo $rows['email'];?>"><?php echo $rows['email'];?></a></td>
           <td><img src="<?php echo $rows['profile_pic'];?>" height="120px" width="120px" title="<?php echo $rows['name'];?>'s Pic" alt="no image preview"></td>
	    		 <td><?php echo $customDate;?></td>
	    	</tr>

              	<?php
              }
           }
          #Closing the Database Connection.
          $con->close();


	    ?>
          </table>
          <div align="center">
          	  <button class="btn btn-sm btn-outline-danger" type="button" onclick="window.print();">Print</button>
          </div>
      </section>
   </div>
</body>
</html>

