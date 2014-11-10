<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Edit Customer</title>
        <?php include 'includes.php';?>
    </head>
    <body>
        <?php include 'header.php';?>
      
  		<?php
			$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
			mysql_select_db("APOLLO",$conn) or die(mysql_error());
			if(isset($_GET['customer_id'])){
				$query = "Select * from CUSTOMER WHERE customer_id=".$_GET['customer_id'];
				$results = mysql_query($query);
				if(!$results)
				{
					die('Could not enter data: ' . mysql_error());
				}
				$row = mysql_fetch_array($results);	
			}
			if(isset($_POST['submit']))
			{
					$customer_id = $_POST['customer_id'];
          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $address = $_POST['address'];
          $sex= $_POST['sex'];
          $phone_no = $_POST['phone_no'];
          $doctor_id = 1;
          $query = "UPDATE CUSTOMER SET customer_id=$customer_id,first_name='$first_name',last_name='$last_name',address='$address',sex='$sex',phone_no='$phone_no',doctor_id=$doctor_id WHERE customer_id=".$_GET['customer_id'];
				  if(!$insert = mysql_query($query))
							{
								echo "Problem entering the data";
							}
						
						echo "<meta http-equiv='refresh' content='0;url=customers.php'>";
					

			}
			
mysql_close($conn);

		?>
		<br>
		<br>
	  <a href="customers.php"><span class="glyphicon glyphicon-chevron-left" style="margin-left:2em"><b>Back</b></span> </a>
     <h2 style="color:#095d58;text-align:center;margin-top:-1em">Edit Profile</h2>

      <br>
<div id="form" style="width:50em;background-color:#f0f0f0;margin-left:16em;padding-top: 25px;padding-right: 25px ; padding-bottom: 25px;
    padding-left: 25px;border: 0px solid;box-shadow: 5px 5px 5px 2px #888888">
<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
      <h5 style="color:#095d58">Customer ID:</h5>
     <input type="text"class="form-control" name="customer_id" id="customer_id" style="width:30em" required value="<?php echo $row['customer_id']; ?>">
    </div>
    
    <div class="form-group">
      <h5 style="color:#095d58">First Name:</h5>
      <input type="text" class="form-control" name="first_name" id="first_name" style="width:30em " required value="<?php echo $row['first_name']; ?>">
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Last Name:</h5>
      <input type="text" class="form-control" name="last_name" id="last_name" style="width:30em " required value="<?php echo $row['last_name']; ?>">
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Address of Residence:</h5>
      <textarea type="text"  rows="6"  cols="50" class="form-control" name="address" id="address" style="width:30em " required value="<?php echo $row['address']; ?>"></textarea> 
    </div>
    
    <div class="form-group">
      <h5 style="color:#095d58">Sex:</h5>
      <input type="radio" name="sex" value="M" checked> M<br>
    <input type="radio" name="sex" value="F" > F<br>
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Phone No:</h5>
      <input type="text"  class="form-control" name="phone_no" id="phone_no" style="width:30em " required value="<?php echo $row['phone_no']; ?>"> 
    </div>
    <button type="submit" class="btn btn-default" name="submit">Submit</button>
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
