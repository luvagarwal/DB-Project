<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());

if(empty($_GET)){
	$query = "Select * from PRODUCT where store_id='".$_SESSION['store']."'";
	$results = mysql_query($query);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}
	
	while($row = mysql_fetch_array($results))
	{
			echo "<div id='".$row['product_name']."'  style='box-shadow: 1px 2px 2px 1px #888888;width:70em;background-color:#f0f0f0;margin-left:6em;height:18em;padding-right:20em;padding-top:2em'>";
		
		echo "<a href='editpro.php?product_name=".$row['product_name']."'><span class='glyphicon glyphicon-pencil' style='float:right;margin-right:-18em' >Edit</span></a>";

		echo "<img src='imagePro.php?product_name=" .$row['product_name']. "' style='width:14em;height:15em;float:left;margin-top:-0.5em'/>";
		echo "<table class='table table-hover' style='width:30em;float:right;margin-left:70em;margin-top:-16em; list-style-type: none'><tr><td colspan='2'><b style='color:#0000ff'>Product Name:</b></td><td>".$row['product_name']."</td></tr>";
		echo "<tr><td colspan='2'><b style='color:#0000ff'>No. of Items:</b></td><td>".$row['no_of_items']."</td></tr>";
		echo "<tr><td colspan='2'><b style='color:#0000ff'>Manufacture Date:</b></td><td>".$row['manufacture_date']."</td></tr>";
		echo "<tr><td colspan='2'><b style='color:#0000ff'>Expire Date:</b></td><td>".$row['expire_date']."</td></tr>";
		echo "<tr><td colspan='2'><b style='color:#0000ff'>Procurrent Cost:</b></td><td>".$row['procurrent_cost']."</td></tr></table>";
		echo "</div><br>";
	}
}
else{
	$name = $_GET['name'];
	session_start();
	$store = $_SESSION['store'];
	$query = "select * from PRODUCT where product_name LIKE '%$name%' and store_id=".$store;
	$results = mysql_query($query,$conn);
	if(!$results)
	{
		die('Could not enter data: ' . mysql_error());
	}

	while($row = mysql_fetch_array($results))
	{		echo "<div id='".$row['product_name']."'  style='box-shadow: 1px 2px 2px 1px #888888;width:70em;background-color:#f0f0f0;margin-left:6em;height:18em;padding-right:20em;padding-top:2em'>";
		
		echo "<a href='editpro.php?product_name=".$row['product_name']."'><span class='glyphicon glyphicon-pencil' style='float:right;margin-right:-18em'>Edit</span></a>";

		echo "<img src='imagePro.php?product_name=" .$row['product_name']. "' style='width:14em;height:15em;float:left;margin-top:-0.5em'/>";
		echo "<table class='table table-hover' style='width:30em;float:right;margin-left:70em;margin-top:-16em; list-style-type: none'><tr><td colspan='2'><b style='color:#0000ff'>Product Name:</b></td><td>".$row['product_name']."</td></tr>";
		echo "<tr><td colspan='2'><b style='color:#0000ff'>No. of Items:</b></td><td>".$row['no_of_items']."</td></tr>";
		echo "<tr><td colspan='2'><b style='color:#0000ff'>Manufacture Date:</b></td><td>".$row['manufacture_date']."</td></tr>";
		echo "<tr><td colspan='2'><b style='color:#0000ff'>Expire Date:</b></td><td>".$row['expire_date']."</td></tr>";
		echo "<tr><td colspan='2'><b style='color:#0000ff'>Procurrent Cost:</b></td><td>".$row['procurrent_cost']."</td></tr></table>";
		echo "</div><br>";

	
}

}
echo "</table>";
mysql_close($conn);
?>