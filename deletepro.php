<?php
$db = mysqli_connect("localhost","root","123123", "APOLLO");
$product_name = $_GET['name'];
$query = "DELETE from PRODUCT where product_name='$product_name'";
$results = $db->query($query);
$db->close();
?>