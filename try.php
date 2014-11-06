<?php
//  variables for the connection
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());
if(isset($_POST['submit']))
{	
	$product_name = 'ds';
	$store_id = 1;
	$no_of_items = $_POST['no_of_items'];
	$manufacture_date = $_POST['manufacture_date'];
	$expire_date= $_POST['expire_date'];
	$procurrent_cost = $_POST['procurrent_cost'];
	$file = $_FILES['image']['tmp_name'];
	if(!$isset($file))
	{
		echo "Please enter a file";
	}
	else
	{	
		$imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$imageProperties = getimagesize($_FILES['image']['tmp_name']);
		if($imageProperties == FALSE)
			echo "This is not an Image";
		else
		{	
			if(!$insert = mysql_query("INSERT INTO PRODUCT VALUES ('$product_name',1,'$no_of_items','$manufacture_date','$expire_date','$procurrent_cost','{$imageProperties['mime']}','{$imgData}');"))
			{	echo "asasasa3";
				echo "Problem entering the data";
			}
		}
	}
	
}
mysql_close($conn);
?>
