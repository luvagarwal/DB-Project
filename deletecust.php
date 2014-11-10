<?php
$db = mysqli_connect("localhost","root","123123", "APOLLO");
$employee_id = $_GET['name'];
$query = "DELETE from CUSTOMER where customer_id=".$employee_id;
$results = $db->query($query);
$db->close();
?>