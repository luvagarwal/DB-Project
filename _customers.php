<br>
<br>
<br>
<hr>
<h2 style="color:#095d58;text-align:center"> Customers </h2>
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
$query = mysql_query("SELECT * FROM CUSTOMER",$conn);
if(! $query )
{
  die('Could not enter data: ' . mysql_error());
}
?>
<table class='table table-hover' border="0" style="margin-left:2em;width:77em;border:1px solid ;box-shadow: 5px 3px 3px 2px #888888">
<thead style="color:white;text-align:center;background-color:#808080;font-weight:bold;"><td>FIRST NAME</td><td>LAST NAME</td><td>PHONE NO</td><td>address</td></thead>
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