
<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());

$id = mysql_real_escape_string($_GET['id']);	
$sql="SELECT * FROM EMPLOYEE WHERE employee_id = '1'";
$query=mysql_query($sql,$conn);
while($row=mysql_fetch_assoc($query))
{
$image=$row['image'];
}
header('content-type: image/jpeg');
echo $image;
mysql_close($conn);
?>
