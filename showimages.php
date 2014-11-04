
<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());

$id =$_GET['id'];	
$sql="SELECT * FROM EMPLOYEE WHERE employee_id={$id}";
$query=mysql_query($sql,$conn);
while($row=mysql_fetch_assoc($query))
{
$image=$row['image'];
}
header('content-type: image/jpg');
echo $image;
mysql_close($conn);
?>
