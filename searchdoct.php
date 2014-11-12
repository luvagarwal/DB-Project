<table class='table table-hover' border="0" style="margin-left:2em;width:77em;border:1px solid ;box-shadow: 1px 1px 1px 1px #888888">
<thead style="color:white;text-align:center;background-color:#808080;font-weight:bold;">
<td>FIRST NAME</td>
<td>LAST NAME</td>
<td>HOSPITAL NAME</td>
<td>PHONE NO</td>
<td>ADDRESS</td>
<td>EDIT/DELETE</td>
</thead>

<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());

if(empty($_GET)){
	$query = "Select * from DOCTOR D JOIN HOSPITAL H ON (D.hospital_id = H.hospital_id)";
	$results = mysql_query($query);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}

	while($row = mysql_fetch_array($results))
	{
		echo "<tr style='text-align:center' id='".$row['doctor_id']."'><td>".$row['first_name']."</td>";
		echo "<td>".$row['last_name']."</td>";
		echo "<td>".$row['hospital_name']."</td>";
		echo "<td>".$row['phone_no']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td><a href='editdoct.php?doctor_id=".$row['doctor_id']."'><span class='glyphicon glyphicon-pencil'>Edit&nbsp  </span></a><input type='submit' class='btn btn-default' value='Delete' onclick=deletedoct('".$row['doctor_id']."')></td></tr>";

	}
}
else{
	$name = $_GET['name'];
	$query = "Select * from DOCTOR D JOIN HOSPITAL H ON (D.hospital_id = H.hospital_id) WHERE first_name LIKE '%$name%' or last_name LIKE '%$name%' or hospital_name LIKE '%$name%'";
	$results = mysql_query($query,$conn);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}

	while($row = mysql_fetch_array($results))
	{
		echo "<tr style='text-align:center' id='".$row['doctor_id']."'><td>".$row['first_name']."</td>";
		echo "<td>".$row['last_name']."</td>";
		echo "<td>".$row['hospital_name']."</td>";
		echo "<td>".$row['phone_no']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td><a href='editdoct.php?doctor_id=".$row['doctor_id']."'><span class='glyphicon glyphicon-pencil' >Edit&nbsp  </span></a><input type='submit' class='btn btn-default' value='Delete' onclick=deletedoct('".$row['doctor_id']."')></td></tr>";
	
}

}
echo "</table>";
mysql_close($conn);
?>