<?php
$db = mysqli_connect("localhost","root","123123", "APOLLO");
$user_name = $_GET['name'];
$query = "SELECT * from EMPLOYEE where user_name='$user_name'";
$results = $db->query($query);
echo $results->num_rows;
$db->close();
?>
