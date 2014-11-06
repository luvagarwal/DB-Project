<!--<table class='table table-hover' border="0" style="margin-left:2em;width:77em;border:1px solid ;box-shadow: 1px 1px 1px 1px #888888">
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
</thead>-->


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

		echo "<div id='".$row['user_name']."' style='box-shadow: 1px 2px 2px 1px #888888;width:60em;background-color:#f0f0f0;margin-left:10em;height:20em;padding-right:20em;padding-top:2em'>";
		echo "<input type='submit' class='btn btn-default' value='Delete' style='float:right;margin-right:-19em' onclick=deleteemp('".$row['user_name']."')>";
		echo "<img src='imageView.php?image_id=" .$row['employee_id']. "' style='width:12em;height:15em;float:left;margin-top:-0.5em'/>";
		echo "<ul style='margin-left:25em;float:right;margin-left:-70em; list-style-type: none'><li><b style='color:#0000ff'>User Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['user_name']."<li>";
		echo "<li><b style='color:#0000ff'>First Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['first_name']."</li>";
		echo "<li><b style='color:#0000ff'>Last Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['last_name']."</li>";
		echo "<li><b style='color:#0000ff'>Date of Birth:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['dob']."</li>";
		echo "<li><b style='color:#0000ff'>Sex:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['sex']."</li>";
		echo "<li><b style='color:#0000ff'>Date of Joining:&nbsp&nbsp&nbsp</b>".$row['date_of_joining']."</li>";
		echo "<li><b style='color:#0000ff'>Address:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['address']."</li>";
		echo "<li><b style='color:#0000ff'>Salary:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['salary']."</li>";
		echo "<li><b style='color:#0000ff'>Employee Type:&nbsp&nbsp&nbsp</b>".$row['employee_type']."</li>";
		echo "<li><b style='color:#0000ff'>Phone No:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['phone_no']."</li>";
		echo "<li><b style='color:#0000ff'>Qualification:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['qualification']."</li></ul>";
		echo "</div><br>";
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
		echo "<div id='".$row['user_name']."' style='box-shadow: 1px 2px 2px 1px #888888;width:60em;background-color:#f0f0f0;margin-left:10em;height:20em;padding-right:20em;padding-top:2em'>";
		echo "<input type='submit' class='btn btn-default' value='Delete' style='float:right;margin-right:-19em' onclick=deleteemp('".$row['user_name']."')>";
		echo "<img src='imageView.php?image_id=" .$row['employee_id']. "' style='width:12em;height:15em;float:left;margin-top:-0.5em'/>";
		echo "<ul style='margin-left:25em;float:right;margin-left:-70em; list-style-type: none'><li><b style='color:#0000ff'>User Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['user_name']."<li>";
		echo "<li><b style='color:#0000ff'>First Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['first_name']."</li>";
		echo "<li><b style='color:#0000ff'>Last Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['last_name']."</li>";
		echo "<li><b style='color:#0000ff'>Date of Birth:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['dob']."</li>";
		echo "<li><b style='color:#0000ff'>Sex:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['sex']."</li>";
		echo "<li><b style='color:#0000ff'>Date of Joining:&nbsp&nbsp&nbsp</b>".$row['date_of_joining']."</li>";
		echo "<li><b style='color:#0000ff'>Address:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['address']."</li>";
		echo "<li><b style='color:#0000ff'>Salary:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['salary']."</li>";
		echo "<li><b style='color:#0000ff'>Employee Type:&nbsp&nbsp&nbsp</b>".$row['employee_type']."</li>";
		echo "<li><b style='color:#0000ff'>Phone No:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['phone_no']."</li>";
		echo "<li><b style='color:#0000ff'>Qualification:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['qualification']."</li></ul>";
		echo "</div><br>";

	
}

}
echo "</table>";
mysql_close($conn);
?>
