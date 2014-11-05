
<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());
if(isset($_GET['image_id']))
{
$id =addslashes($_GET['id']);	
$sql="SELECT * FROM EMPLOYEE WHERE user_name=$id";
$query=mysql_query($sql,$conn);
$row = mysql_fetch_array($result);
header("Content-type: " . $row["imageType"]);
 echo $row["imageData"];
}
mysql_close($conn);
?>
