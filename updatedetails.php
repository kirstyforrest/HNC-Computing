<html>
<head>
</head>
<body>
<h1>Check Member Details</h1>
<?php
	echo "<pre>\$_POST", print_r($_POST), "</pre>";
	$username=$_POST['username'];
	$password=$_POST['password'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	$town=$_POST['town'];
	$postcode=$_POST['postcode'];
	$email=$_POST['email'];
	$customerno=$_POST['customerno'];
	
	/*
<form action="updatedetails.php">
  <input type ='hidden' name='customerno' value='customerno'>
</form> */


	@$db = mysql_pconnect('localhost', 'root', ''); 
	if (!$db)
	{
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	@mysql_select_db('surfshop');
	$query = "UPDATE customers SET firstname='$firstname', lastname='$lastname', address='$address', town='$town', postcode='$postcode', email='$email', username='$username', password='$password' WHERE customerno ='$customerno'"; 
	/* $query = "select * from customers where username = '$username' and password = '$password'"; */
	$result = mysql_query($query);
	if ($result)
		echo "details updated";
	else
		echo "did not work";
		

	
?>
<p>Click <a href="mainpage.html">here</a> to return to the login page</font></p>
</body>
</html>
