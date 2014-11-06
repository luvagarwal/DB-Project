<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());

if(empty($_GET)){
	$query = "Select * from PRODUCT";
	$results = mysql_query($query);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}
	
	while($row = mysql_fetch_array($results))
	{
		echo "<div style='box-shadow: 1px 2px 2px 1px #888888;width:60em;background-color:#f0f0f0;margin-left:10em;height:20em;padding-right:20em;padding-top:2em'>";
		echo "<img src='imagePro.php?product_name=" .$row['product_name']. "' style='width:15em;height:15em;float:left;margin-top:-0.5em'/>";
		echo "<ul style='margin-left:25em;float:right;margin-left:-70em; list-style-type: none'><li><b style='color:#0000ff'>Product Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['product_name']."</li><br>";
		echo "<li><b style='color:#0000ff'>No of Items:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['no_of_items']."</li><br>";
		echo "<li><b style='color:#0000ff'>Manufacture Date:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['manufacture_date']."</li><br>";
		echo "<li><b style='color:#0000ff'>Expire Date:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['expire_date']."</li><br>";
		echo "<li><b style='color:#0000ff'>Procurrent Cost:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['procurrent_cost']."</li></ul></div><br>";
	}
}
else{
	$name = $_GET['name'];
	$query = "select * from PRODUCT where product_name LIKE '%$name%';";
	$results = mysql_query($query,$conn);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}

	while($row = mysql_fetch_array($results))
	{
		echo "<div style='box-shadow: 1px 2px 2px 1px #888888;width:60em;background-color:#f0f0f0;margin-left:10em;height:20em;padding-right:20em;padding-top:2em'>";
		echo "<img src='imagePro.php?product_name=" .$row['product_name']. "' style='width:15em;height:15em;float:left;margin-top:-0.5em'/>";
		echo "<ul style='margin-left:25em;float:right;margin-left:-70em; list-style-type: none'><li><b style='color:#0000ff'>Product Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['product_name']."</li><br>";
		echo "<li><b style='color:#0000ff'>No of Items:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['no_of_items']."</li><br>";
		echo "<li><b style='color:#0000ff'>Manufacture Date:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['manufacture_date']."</li><br>";
		echo "<li><b style='color:#0000ff'>Expire Date:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['expire_date']."</li><br>";
		echo "<li><b style='color:#0000ff'>Procurrent Cost:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b>".$row['procurrent_cost']."</li></ul></div><br>";

	
}

}
echo "</table>";
mysql_close($conn);
?>