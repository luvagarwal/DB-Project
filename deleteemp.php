<?php
$db = mysqli_connect("localhost","root","123123", "APOLLO");
$user_name = $_GET['name'];
$query = "DELETE from EMPLOYEES where user_name='$user_name'";
$results = $db->query($query);
$db->close();
?>