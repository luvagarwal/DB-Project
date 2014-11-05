<?php
$db = mysqli_connect("localhost","root","123123", "APOLLO");
$user_name = $_GET['name'];
$query = "DELETE from EMPLOYEE where user_name='$user_name'";
echo "$query";
$results = $db->query($query);
$db->close();
?>