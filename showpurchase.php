<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Appolo-Home</title>
        <?php include 'includes.php';?>
    </head>
    <body>
        <?php include 'header.php';?>

<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());

if(isset($_GET['id']))
$id = $_GET['id'];
$query = "Select * from PURCHASE p join CUSTOMER c on (p.customer_id=c.customer_id) WHERE purchase_id=$id";
$results = mysql_query($query);
?>
<br>
<a href="purchase.php"><div style="margin-left:2em;margin-top:2em;background-color:#f0f0f0;width:3.5em;height:2em;border-radius:5px;padding-top:5px;padding-right:5px;padding-left:5px;padding-bottom:5px;box-shadow: 3px 3px 3px 2px #888888">Back</div></a>

<?php
while($row1 = mysql_fetch_array($results))
{
	echo "<h3 style='text-align:center;color:#399999;font-weight:bold' >Total items purchased by ".$row1['first_name']." ".$row1['last_name']. " on ".$row1['date_of_purchase']."</h3>";
	break;	
}

?>
<br>
<br>
<table class='table table-hover' border="0" style="margin-left:2em;width:77em;border:1px solid ;box-shadow: 3px 3px 3px 2px #888888">
<thead style="color:white;text-align:center;background-color:#808080;font-weight:bold;">
<td>Product Name</td>
<td>Total Items</td>
<td>Total Price</td>
<td>Discount</td>
</thead>
<?php
while($row = mysql_fetch_array($results))
{
	echo "<tr style='text-align:center'><td>".$row['product_name']."</td>";
	echo "<td>".$row['total_items']."</td>";
	echo "<td>".$row['total_price']."</td>";
	echo "<td>".$row['discount']."</td></tr>";
}

mysql_close($conn);
?>
        <?php
            include 'footer.php';
            include 'includesjs.php';
        ?>
    </body>
</html>

