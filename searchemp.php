<table class='table table-hover' border="0" style="margin-left:2em;width:77em;border:1px solid ;box-shadow: 1px 1px 1px 1px #888888">
<thead style="color:white;text-align:center;background-color:#808080;font-weight:bold;">
<td>Photo</td>
<td>User Name</td>
<td>First Name</td>
<td>Last Name</td>
<td>Date</td>
<td>Sex</td>
<td>Date of Joining</td>
<td>Address</td>
<td>Salary</td>
<td>Employee Type</td>
<td>Phone No</td>
<td>Qualification</td>
</thead>


<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());

if(empty($_GET)){
	$query = "Select * from EMPLOYEE";
	$results = mysql_query($query);
	
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}
	
	while($row = mysql_fetch_array($results))
	{
		echo "<tr><td><img src='imageView.php?image_id=" .$row['employee_id']. "' style='width:100px;height:80px;'/></td>";
		echo "<td>".$row['user_name']."</td>";
		echo "<td>".$row['first_name']."</td>";
		echo "<td>".$row['last_name']."</td>";
		echo "<td>".$row['dob']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td>".$row['date_of_joining']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['salary']."</td>";
		echo "<td>".$row['employee_type']."</td>";
		echo "<td>".$row['phone_no']."</td>";
		echo "<td>".$row['qualification']."</td></tr>";
	}
}
else{
	$name = $_GET['name'];
	$query = "select * from EMPLOYEE where user_name LIKE '%$name%' or first_name LIKE '%$name%' or last_name LIKE '%$name%';";
	$results = mysql_query($query,$conn);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}

	while($row = mysql_fetch_array($results))
	{
		echo "<tr><td><img src='imageView.php?image_id=" .$row['employee_id']. "'  style='width:100px;height:80px;'/></td>";
		echo "<td>".$row['user_name']."</td>";
		echo "<td>".$row['first_name']."</td>";
		echo "<td>".$row['last_name']."</td>";
		//echo "<td><img src='showimages.php?id=".$row['employee_id']."'></td>";
		echo "<td>".$row['dob']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td>".$row['date_of_joining']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['salary']."</td>";
		echo "<td>".$row['employee_type']."</td>";
		echo "<td>".$row['phone_no']."</td>";
		echo "<td>".$row['qualification']."</td></tr>";
	
}

}
echo "</table>";
mysql_close($conn);
?>
