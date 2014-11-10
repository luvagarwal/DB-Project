<table class='table table-hover' border="0" style="margin-left:2em;width:77em;border:1px solid ;box-shadow: 1px 1px 1px 1px #888888">
<thead style="color:white;text-align:center;background-color:#808080;font-weight:bold;">
<td>Customer Id</td>
<td>First Name</td>
<td>Last Name</td>
<td>Address</td>
<td>Sex</td>
<td>Contact No</td>
<td>Edit/Delete</td>
</thead>



<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());

if(empty($_GET)){
	$query = "Select * from CUSTOMER";
	$results = mysql_query($query);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}
	
	while($row = mysql_fetch_array($results))
	{
		echo "<tr style='text-align:center' id='".$row['customer_id']."' ><td>".$row['customer_id']."</td>";
		echo "<td>".$row['first_name']."</td>";
		echo "<td>".$row['last_name']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td>".$row['phone_no']."</td>";
		echo "<td><a class='btn btn-default' href='editcust.php?customer_id=".$row['customer_id']."'><span class='glyphicon glyphicon-pencil'>Edit</span></a><input type='submit' class='btn btn-default' value='Delete' onclick=deletecust('".$row['customer_id']."')></td></tr>";
	}
}
else{
	$name = $_GET['name'];
	$query = "select * from CUSTOMER where first_name LIKE '%$name%' OR last_name LIKE '%$name%';";
	$results = mysql_query($query,$conn);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}

	while($row = mysql_fetch_array($results))
	{
		echo "<tr style='text-align:center' id='".$row['customer_id']."' ><td>".$row['customer_id']."</td>";
		echo "<td>".$row['first_name']."</td>";
		echo "<td>".$row['last_name']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td>".$row['phone_no']."</td>";
		echo "<td><a class='btn btn-default' href='editcust.php?customer_id=".$row['customer_id']."'><span class='glyphicon glyphicon-pencil'>Edit</span></a><input type='submit' class='btn btn-default' value='Delete' onclick=deletecust('".$row['customer_id']."')></td></tr>";
	
}

}
echo "</table>";
mysql_close($conn);
?>