<br>
<br>
<br>
<hr>
<h2 style="color:#095d58;text-align:center"> Products Available</h2>
<hr>
<br>

<?php
// Required variables for the connection
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "123123";

// Connecting to the database
$conn = mysql_connect($dbhost,$dbuser,$dbpassword);

//selecting the database
mysql_select_db("APOLLO",$conn);
if(!conn)
{
	die('Could not connect: ' . mysql_error());
}

//quering the database and showing the results
$query = "Select * from PRODUCT";
$results = mysql_query($query,$conn);
if(!results)
{
	die('Could not enter data: ' . mysql_error());
}
?>

<table class='table table-hover' border="0" style="margin-left:2em;width:77em;border:1px solid ;box-shadow: 5px 3px 3px 2px #888888">
<thead style="color:white;text-align:center;background-color:#808080;font-weight:bold;">
<td>Product Name</td>
<td>No of Items</td>
<td>Manufacture Date</td>
<td>Expiry Date</td>
<td>Procurrent Cost</td>
</thead>

<?php
while($row = mysql_fetch_array($results))
{
	echo "<tr style='text-align:center'><td>".$row['product_name']."</td>";
	echo "<td>".$row['no_of_items']."</td>";
	echo "<td>".$row['manufacture_date']."</td>";
	echo "<td>".$row['expire_date']."</td>";
	echo "<td>".$row['procurrent_cost']."</td>";
}
echo "</table>";
mysql_close($conn);
?>