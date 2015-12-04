<html>
<head>
  <h1>Surf Shop Order Form</h1>
</head>

<body>
 <?php
 // shows the code 
echo "<pre>\$_POST", print_r($_POST), "</pre>";

  $customerno=$_POST['customerno'];
  $item1=$_POST['item1'];
  $item2=$_POST['item2'];
  $item3=$_POST['item3'];
  $quantity1=$_POST['quantity1'];
  $quantity2=$_POST['quantity2'];
  $quantity3=$_POST['quantity3'];
  $price1=$_POST['price1'];
  $price2=$_POST['price2'];
  $price3=$_POST['price3'];

 
	$db = @mysql_pconnect('localhost', 'root', ''); 
if (!$db)
  {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  @mysql_select_db('surfshop');
  $query = "insert into orders(customerno) values ('$customerno')";
  $result = mysql_query($query);
  $query = "select * from orders where customerno = '$customerno' order by orderno desc";
  $result = mysql_query($query);
  $row = mysql_fetch_array($result);
  $orderno = $row['orderno'];
   
  /*$query = "insert into orderline (itemname,itemno,price,description,quantity) values ('$itemname','$itemno','$price','$description,'$quantity1')";*/
  $result = mysql_query($query);
  //$query = "update products set qtyinstock = (qtyinstock - $quantity1) where itemno = '$item1'";
  $result = mysql_query($query);

  $query = "select price from products where itemno = '$item1'";
  $result = mysql_query($query);
	if($result == false)
	{
		die(mysql_error());
	}
  $row = mysql_fetch_array($result);
  $price1 = $row['price'];
  $totalprice1 = $price1 * $quantity1;


  if (strcmp($quantity2,"")>0) 
  	{
	/*$query = "insert into orderline (itemname,itemno,price,description,quantity) values ('$itemname','$itemno','$price','$description,'$quantity2')";*/
  	$result = mysql_query($query);
	//$query = "update products set qtyinstock = (qtyinstock - $quantity2) where itemno = '$item2'";
    $result = mysql_query($query);
	$query = "select price from products where itemno = '$item2'";
  	$result = mysql_query($query);
  	$row = mysql_fetch_array($result);
  	$price2 = $row['price'];
  	$totalprice2 = $price2 * $quantity2;
	}
  else
	{
	$item2=" ";
	$price2=" ";
	}

	if (strcmp($quantity3,"")>0) 
  	{
	/*$query = "insert into orderline (itemname,itemno,price,description,quantity) values ('$itemname','$itemno','$price','$description,'$quantity2')";*/
  	$result = mysql_query($query);
	//$query = "update products set qtyinstock = (qtyinstock - $quantity3) where itemno = '$item3'";
    $result = mysql_query($query);
	$query = "select price from products where itemno = '$item3'";
  	$result = mysql_query($query);
  	$row = mysql_fetch_array($result);
  	$price3 = $row['price'];
  	$totalprice3 = $price3 * $quantity3;
	}
  else
	{
	$item3=" ";
	$price3=" ";
	}

	$total = $totalprice1+$totalprice2+$totalprice3;	
	$vat = $total * 0.175;
	$grandtotal = $total + $vat;

	
	$total = number_format($total,2);
	$vat = number_format($vat,2);
	$grandtotal = number_format($grandtotal,2);

echo "<form name='form1' method='post'>
Order Number $orderno </br>
Customer Number $customerno </br> </br>

</br>

<table border='1' width= '50%'>
	<tr>
		<th>Item Name</th>
		<th>Quantity</th>
		<th>Price</th>
	</tr>
	<tr>
		<td>$item1</td>
		<td>$quantity1</td>
		<td>$price1</td>
	</tr>
	<tr>
		<td>$item2</td>
		<td>$quantity2</td>
		<td>$price2</td>
	</tr>
	<tr>
		<td>$item3</td>
		<td>$quantity3</td>
		<td>$price3</td>
	</tr>
</table>
</br>


Total			      : $total </br>
VAT                   : $vat </br>
Grand Total           : $grandtotal </br></br>
<input name='button' type='button' onClick='window.print()' value='Print this slip'>
</form>"
?>
</body>
</html>
