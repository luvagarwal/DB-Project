<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Edit Product Details</title>
        <?php include 'includes.php';?>
    </head>
    <body>
        <?php include 'header.php';?>
      
  		<?php
			$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
			mysql_select_db("APOLLO",$conn) or die(mysql_error());
			if(isset($_GET['product_name'])){
				$query = "Select * from PRODUCT WHERE product_name='".$_GET['product_name']."'";
				$results = mysql_query($query);
				if(!$results)
				{
					die('Could not enter data: ' . mysql_error());
				}
				$row = mysql_fetch_array($results);	
			}
			if(isset($_POST['submit']))
      { 
        $product_name = $_POST['product_name'];
        $store_id = 1;
        $no_of_items = $_POST['no_of_items'];
        $manufacture_date = $_POST['manufacture_date'];
        $expire_date= $_POST['expire_date'];
        $procurrent_cost = $_POST['procurrent_cost'];
        $file = $_FILES['image']['tmp_name'];
        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $imageProperties = getimagesize($_FILES['image']['tmp_name']);
        if($imageProperties == FALSE)
          echo "This is not an Image";
        else
        { 
          $query = "UPDATE PRODUCT SET product_name='$product_name',store_id=1,no_of_items=$no_of_items,manufacture_date='$manufacture_date',expire_date='$expire_date',procurrent_cost=$procurrent_cost,imageType='{$imageProperties['mime']}',imageData='{$imgData}' where product_name='".$_GET['product_name']."'";
          if(!$insert = mysql_query($query))
          { 
            echo "Problem entering the data";
          }
         echo "<meta http-equiv='refresh' content='0;url=products.php'>";
        }
      }
			
       mysql_close($conn);

		  ?>
		<br>
		<br>
	  <a href="products.php"><span class="glyphicon glyphicon-chevron-left" style="margin-left:2em"><b>Back</b></span></a>
    <h2 style="color:#095d58;text-align:center;margin-top:-1em">Edit Product Details</h2>

    <br>
<div id="form" style="width:50em;background-color:#f0f0f0;margin-left:16em;padding-top: 25px;padding-right: 25px ; padding-bottom: 25px;
    padding-left: 25px;border: 0px solid;box-shadow: 5px 5px 5px 2px #888888">
<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
      <h5 style="color:#095d58">Product Name:</h5>
     <input type="text"class="form-control" name="product_name" id="product_name" style="width:30em" required value="<?php echo $row['product_name']; ?>">
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">No of Items:</h5>
      <input type="text" class="form-control" name="no_of_items" id="no_of_items" style="width:30em" required value="<?php echo $row['no_of_items']; ?>">
    </div>
   <div class="form-group">
        <div class='input-group date' id='datetimepicker5'>
          <h5 style="color:#095d58">Manufacturing Date: </h5>
          <input type='text' class="form-control" data-date-format="YYYY/MM/DD" name="manufacture_date" required value="<?php echo $row['manufacture_date']; ?>">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
        </div>
      </div>
    <div class="form-group">
        <div class='input-group date' id='datetimepicker5'>
          <h5 style="color:#095d58">Expire Date: </h5>
          <input type='text' class="form-control" data-date-format="YYYY/MM/DD" name="expire_date" required value="<?php echo $row['expire_date']; ?>">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
        </div>
      </div>
    <div class="form-group">
      <h5 style="color:#095d58">Procurrent Cost:</h5>
      <input type="text"  class="form-control" name="procurrent_cost" id="procurrent_cost" style="width:30em" required value="<?php echo $row['procurrent_cost']; ?>">
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Photo:</h5>
      <input type="file"  name="image" id="image" > 
    </div>
    <br>

    <button type="submit" class="btn btn-default" name="submit">Save Changes</button>
  </form>
</div>
<br>
<br>



        <?php
            include 'footer.php';
            include 'includesjs.php';
        ?>
    </body>
</html>
