<html>
<head>
</head>
<body>
<?php
//form name="form1" action="checkdetails.php" method = "post"

echo "<pre>\$_POST", print_r($_POST), "</pre>";
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $address=$_POST['address'];
  $town=$_POST['town'];
  $postcode=$_POST['postcode'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  

  @  $db = mysql_pconnect('localhost', 'root', '');
  if (!$db)
  {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  else
  {
  mysql_select_db('surfshop');
    $query = "insert into customers(firstname, lastname, address, town, postcode, email, username, password) values ('$firstname', '$lastname', '$address', '$town', '$postcode', '$email','$username', '$password')";	
	echo $query . '</br>';
  $result = mysql_query($query);
	  if ($result){
		echo 'Member inserted';
		}
	   else {
		echo 'Did not work';
	   }
   }
?>
<p>Click <a href="mainpage.html">here</a> to return to the login page</font></p>
</body>
</html>
