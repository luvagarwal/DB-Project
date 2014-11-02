<br>
<br>
<br>
<hr>
<h2 style="color:#095d58;text-align:center"> Feedbacks by the Customers </h2>
<hr>
<br>
<br>
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
$query = "Select * from FEEDBACK f join CUSTOMER c on (f.customer_id=c.customer_id)";
$results = mysql_query($query,$conn);
if(!results)
{
	die('Could not enter data: ' . mysql_error());
}
?>
<table class='table table-hover'>
<thead style="color:#0087C3;text-align:center">
<td>CUSTOMER</td>
<td>TIME</td>
<td>FEEDBACK</td>
</thead>

<?php
while($row = mysql_fetch_array($results))
{
	echo "<tr style='text-align:center'><td>".$row['first_name']."</td>";
	echo "<td>".$row['time_of_feedback']."</td>";
	echo "<td>".$row['feedback_body']."</td></tr>";
}
echo "</table>";
mysql_close($conn);
?>