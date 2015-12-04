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

	@$db = mysql_pconnect('localhost', 'root', ''); 
	if (!$db)
	{
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	@mysql_select_db('surfshop');
	$query = "UPDATE customers SET firstname='$firstname', lastname='$lastname', address='$address', town='$town', postcode='$postcode', email='$email', username='$username', password='$password ' WHERE customerno ='$customerno' "; 
	
	$query = "select * from customers where username = '$username' and password = '$password'";
	$result = mysql_query($query);
	// if($result == false)
	// {
		// die(mysql_error());
	// } 
	
	// $row = mysql_fetch_array($result);
	
	$num_results = mysql_num_rows($result);
	echo $num_results;
	if ($num_results != 0)
	{	
		$row = mysql_fetch_array($result);
		extract($row);
		mysql_close($db);
		echo "<p>Welcome, your login details were correct.</p>"; 
		echo "<form action ='orderentry.php' method='post'>
		<input type ='hidden' name='customerno' value='$customerno'>

		<input type ='hidden' name='customerno' value='$customerno'>
	
		<input type ='hidden' name='firstname' value='$firstname'	size= '20'>
		
		<input type ='hidden' name='lastname' value='$lastname'	size= '20'>

		<input type ='hidden' name='address' 	value='$address'	size= '20'>

		<input type ='hidden' name='town' 	value='$town'	size= '20'>

		<input type ='hidden' name='postcode' value='$postcode'	size= '20'>
		<input type ='hidden' name='email' value='$email'		size= '40'>
		<input type ='hidden' name='username' value='$username'	size= '20'>
		<input type ='hidden' name='password' value='$password'	size= '20'>
		</br>
		<input type ='hidden' name='username' value='$username'>
		 
		
		<input name='submit' type='submit' value='Continue'>
		</form>";
		
		echo "<form action ='updatedetails.php' method='post'>
		CustomerNo: $customerno
		</br>
		<input type ='hidden' name='customerno' value='$customerno'>
		First Name:
		<input type ='text' name='firstname' value='$firstname'	size= '20'></br>
		Last Name:
		<input type ='text' name='lastname' value='$lastname'	size= '20'></br>
		Address:
		<input type ='text' name='address' 	value='$address'	size= '20'></br>
		Town:
		<input type ='text' name='town' 	value='$town'	size= '20'></br>
		Postcode:
		<input type ='text' name='postcode' value='$postcode'	size= '20'></br>
		Email:
		<input type ='text' name='email' value='$email'		size= '40'></br>
		Username:
		<input type ='text' name='username' value='$username'	size= '20'></br>
		Password:
		<input type ='text' name='password' value='$password'	size= '20'></br>
		</br>
		
		 
		
		<input name='submit' type='submit' value='Update'>
		</form>";
	}
	else 
	{
		echo "Incorrect try again!!";
		
	}
	
	
?>
<p>Click <a href="mainpage.html">here</a> to return to the login page</font></p>
</body>
</html>
