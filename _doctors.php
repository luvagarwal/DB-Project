<br>
<br>
<br>
<hr>
<h2 style="color:#095d58;text-align:center"> The Doctors  Prescribed by the Customers </h2>
<hr>
<br>
<br>
<br>
<?php
// REQUIRED VARIABLES FOR CONNECTION

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "123123";
// CONNECTING TO DATABASE
$conn = mysql_connect($dbhost,$dbuser,$dbpassword);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
// SELECTING THE DATABASE

mysql_select_db("APOLLO",$conn);

//QUERY and DISPLAY  DATABASE
$query = mysql_query("SELECT * FROM DOCTOR",$conn);
if(! $query )
{
  die('Could not enter data: ' . mysql_error());
}
?>
<table class='table table-hover'><tr style="color:#0087C3;text-align:center"><td>FIRST NAME</td><td>LAST NAME</td><td>PHONE NO</td><td>address</td></tr>
<?php
while($row = mysql_fetch_array($query))
{
	echo "<tr style='text-align:center'><td>".$row['first_name']."</td>";
	echo "<td>".$row['last_name']."</td>";
	echo "<td>".$row['phone_no']."</td>";
	echo "<td>".$row['address']."</td></tr>";
}

echo "</table>";

//CLOSE CONNECTION
mysql_close($conn);
?>
