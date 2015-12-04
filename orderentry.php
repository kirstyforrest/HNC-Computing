<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document2</title>
<p><h1>Surf Shop Order Entry</h1></p>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
// shows the code 
echo "<pre>\$_POST", print_r($_POST), "</pre>";
$customerno = $_POST['customerno'];
echo "
<form name='form1' method='post' action='orderform.php'>
  <p>Customer No = $customerno
  <input type ='hidden' name='customerno' value='$customerno'></p>
  <p>Stock No Quantity</p>";

@  $db = mysql_pconnect('localhost', 'root', ''); 
	  if (!$db)
  		{
     	echo "Error: Could not connect to database.  Please try again later.";
     	exit;
  		}
	  mysql_select_db('surfshop');
  	  $query = "select * from products";
  	  $result = mysql_query($query);
 	echo "<select name=item1>";
	while($nt=mysql_fetch_array($result))
		{
		  echo "<option value=$nt[itemname]>$nt[itemno] $nt[itemname] $nt[price] $nt[quantity] $nt[photo]</option>";
		}
	echo "</select> 
    <input name='quantity1' type='text' id='quantity1'><br/>";
	
	 $query = "select * from products";
  	  $result = mysql_query($query);
 	echo "<select name=item2>";
	while($nt=mysql_fetch_array($result))
		{
		  echo "<option value=$nt[itemname]>$nt[itemno] $nt[itemname] $nt[price] $nt[quantity] $nt[photo]</option>";
		}
	echo "</select> 
    <input name='quantity2' type='text' id='quantity2'><br/>";
	
	 $query = "select * from products";
  	  $result = mysql_query($query);
 	echo "<select name=item3>";
	while($nt=mysql_fetch_array($result))
		{
		  echo "<option value=$nt[itemname]>$nt[itemno] $nt[itemname] $nt[price] $nt[quantity] $nt[photo] </option>";
		}
	echo "</select> 
    <input name='quantity3' type='text' id='quantity3'><br/>";
	
//echo '<td><img src="data:picture/jpg;based64,'.base64_encode($row['image']).'"/></td';

$itemquery = "select * from products";
$itemresult = mysql_query($itemquery);

echo "<table>";
while ($row = mysql_fetch_array($itemresult)){
echo "<td>".$row['itemname']."</td>";
echo '<td><img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/></td>';
}
echo "</table>";

if(isset($_POST['price'])){ $price = $_POST['price']; } 
if(isset($_POST['price']))  $variable=$_POST['price'] ; $variable=NULL;
	
echo "<br>To place order click Submit
    <input type='submit' name='Submit' value='Submit'>
</form>";
?>
</body>
</html>
