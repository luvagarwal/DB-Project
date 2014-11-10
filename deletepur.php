<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());
$purchase_id = $_GET['id'];

$query = "SELECT no_of_items FROM PRODUCT where product_name='$product_name'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$resultant_items = $row['no_of_items'] - $total_items;
$query = "UPDATE PRODUCT SET no_of_items=".$resultant_items." WHERE product_name='$product_name'";
mysql_query($query); 

$query = "DELETE from PURCHASE where purchase_id=".$purchase_id;
$results = mysql_query($query); 
mysql_close($conn);
?>