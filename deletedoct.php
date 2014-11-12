<?php
$db = mysqli_connect("localhost","root","123123", "APOLLO");
$user_name = $_GET['name'];
$query = "DELETE from DOCTOR where doctor_id=".$_GET['name'];
$results = $db->query($query);
$db->close();
?>