<hr>
<h2 style="color:#095d58;text-align:center">Purchases by Cusomters</h2>
<hr>
<table class='table table-hover' border="0" style="margin-left:6em;width:70em;border:1px solid ;box-shadow: 1px 1px 1px 1px #888888">
<thead style="color:white;text-align:center;background-color:#808080;font-weight:bold;">
<td>Purchase Id</td>
<td>Customer Name</td>
<td>Date of Purchase</td>
<td>Grand Total</td>
<td>Total Discount</td>
<td>Details</td>
<td>Delete</td>
</thead>

<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());

if(empty($_GET)){
	$query = "Select purchase_id, first_name, date_of_purchase, SUM(total_price) AS Grand_Total , sum(discount) as Total_discount from PURCHASE p join CUSTOMER c on (p.customer_id=c.customer_id) GROUP BY purchase_id";
	$results = mysql_query($query,$conn);

	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}
	
	while($row = mysql_fetch_array($results))
	{
		echo "<tr style='text-align:center' id='".$row['purchase_id']."'><td>".$row['purchase_id']."</td>";
		echo "<td>".$row['first_name'].$row['last_name']."</td>";
		echo "<td>".$row['date_of_purchase']."</td>";
		echo "<td>".$row['Grand_Total']."</td>";
		echo "<td>".$row['Total_discount']."</td>";
  		echo "<td><a href='showpurchase.php?id=".$row['purchase_id']."'>VIEW DETAILS</a></td>";
  		echo "<td><input type='submit' class='btn btn-default' value='Delete' onclick=deletepur('".$row['purchase_id']."')></td></tr>";
	}
}
else{
	$name = $_GET['name'];
	$query = "Select purchase_id, first_name, date_of_purchase, SUM(total_price) AS Grand_Total , sum(discount) as Total_discount from PURCHASE p join CUSTOMER c on (p.customer_id=c.customer_id) WHERE first_name LIKE '%$name%' or last_name LIKE '%$name%' GROUP BY purchase_id";
	$results = mysql_query($query,$conn);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}
	
	
	while($row = mysql_fetch_array($results))
	{
		echo "<tr style='text-align:center' id='".$row['purchase_id']."'><td>".$row['purchase_id']."</td>";
		echo "<td>".$row['first_name'].$row['last_name']."</td>";
		echo "<td>".$row['date_of_purchase']."</td>";
		echo "<td>".$row['Grand_Total']."</td>";
		echo "<td>".$row['Total_discount']."</td>";
  		echo "<td><a href='showpurchase.php?id=".$row['purchase_id']."'>VIEW DETAILS</a></td>";
  		echo "<td><input type='submit' class='btn btn-default' value='Delete' onclick=deletepur('".$row['purchase_id']."')></td></tr>";
	
}

}
echo "</table>";
mysql_close($conn);
?>