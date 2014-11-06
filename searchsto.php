<table class='table table-hover' border="0" style="margin-left:2em;width:77em;border:1px solid ;box-shadow: 1px 1px 1px 1px #888888">
<thead style="color:white;text-align:center;background-color:#808080;font-weight:bold;">
<td>Store Name</td>
<td>Address</td>
<td>Established On</td>
<td>Contact No</td>
<td>Start Time</td>
</thead>



<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());

if(empty($_GET)){
	$query = "Select * from STORE";
	$results = mysql_query($query);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}
	
	while($row = mysql_fetch_array($results))
	{
		echo "<tr style='text-align:center'><td>".$row['store_name']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['established_on']."</td>";
		echo "<td>".$row['contact_no']."</td>";
		echo "<td>".$row['start_time']."</td></tr>";
	}
}
else{
	$name = $_GET['name'];
	$query = "select * from STORE where store_name LIKE '%$name%';";
	$results = mysql_query($query,$conn);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}

	while($row = mysql_fetch_array($results))
	{
		echo "<tr style='text-align:center'><td>".$row['store_name']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['established_on']."</td>";
		echo "<td>".$row['contact_no']."</td>";
		echo "<td>".$row['start_time']."</td></tr>";

	
}

}
echo "</table>";
mysql_close($conn);
?>