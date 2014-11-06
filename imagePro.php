<?php
	$conn = mysql_connect("localhost", "root", "123123");
    mysql_select_db("APOLLO") or die(mysql_error());
    if(isset($_GET['product_name'])) {
        $sql = "SELECT * FROM EMPLOYEE WHERE employee_id=".addslashes($_GET['product_name']);
		$result = mysql_query($sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());
		$row = mysql_fetch_array($result);
		header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
	}
	mysql_close($conn);
?>
