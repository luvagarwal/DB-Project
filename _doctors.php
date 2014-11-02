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
<table class='table table-hover'><tr><td>FIRST NAME</td><td>LAST NAME</td><td>PHONE NO</td><td>address</td></tr>
<?php
while($row = mysql_fetch_array($query))
{
	echo "<tr><td>".$row['first_name']."</td>";
	echo "<td>".$row['last_name']."</td>";
	echo "<td>".$row['phone_no']."</td>";
	echo "<td>".$row['address']."</td></tr>";
}

echo "</table>";

//CLOSE CONNECTION
mysql_close($conn);
?>
