<br>
<br>
<hr>
<h2 style="color:#095d58;text-align:center">Purchases by Cusomters</h2>
<hr>
<table class='table table-hover' border="0" style="margin-left:2em;width:77em;border:1px solid ;box-shadow: 1px 1px 1px 1px #888888">
<thead style="color:white;text-align:center;background-color:#808080;font-weight:bold;">
<td>Purchase Id</td>
<td>Customer Name</td>
<td>Date of Purchase</td>
<td>Payment Method</td>
<td>Product Name</td>
<td>Total Items</td>
<td>Total Price</td>
<td>Discount</td>
<td>Details</td>
</thead>



<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());

if(empty($_GET)){
	$query = "Select * from PURCHASE p join CUSTOMER c on (p.customer_id=c.customer_id)";
	$results = mysql_query($query,$conn);
	if(!results)
	{
		die('Could not enter data: ' . mysql_error());
	}
	
	while($row = mysql_fetch_array($results))
	{
		echo "<tr style='text-align:right'><td>".$row['purchase_id']."</td>";
		echo "<td>".$row['first_name'].$row['last_name']."</td>";
		echo "<td>".$row['date_of_purchase']."</td>";
		echo "<td>".$row['payment_method']."</td>";
		echo "<td>".$row['product_name']."</td>";
		echo "<td>".$row['total_items']."</td>";
		echo "<td>".$row['total_price']."</td>";
		echo "<td>".$row['discount']."</td>";
  		echo "<td><a href='showpurchase.php?id=".$row['purchase_id']."'>VIEW DETAILS</a></td></tr>";
	}
}
else{
	$name = $_GET['name'];
	$query = "Select * from PURCHASE p join CUSTOMER c on (p.customer_id=c.customer_id) WHERE first_name LIKE '%$name%' or last_name LIKE '%$name%'";
	$results = mysql_query($query,$conn);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}
	
	
	while($row = mysql_fetch_array($results))
	{
		echo "<tr style='text-align:center'><td>".$row['purchase_id']."</td>";
		echo "<td>".$row['first_name'].$row['last_name']."</td>";
		echo "<td>".$row['date_of_purchase']."</td>";
		echo "<td>".$row['payment_method']."</td>";
		echo "<td>".$row['product_name']."</td>";
		echo "<td>".$row['total_items']."</td>";
		echo "<td>".$row['total_price']."</td>";
		echo "<td>".$row['discount']."</td>";
  		echo "<td><a href='showpurchase.php?id=".$row['purchase_id']."'>VIEW DETAILS</a></td></tr>";
	
}

}
echo "</table>";
mysql_close($conn);
?>