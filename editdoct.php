<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Edit Employee</title>
        <?php include 'includes.php';?>
    </head>
    <body>
        <?php include 'header.php';?>
      
  		<?php
			$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
			mysql_select_db("APOLLO",$conn) or die(mysql_error());
			if(isset($_GET['doctor_id'])){
				$query = "Select * from DOCTOR WHERE doctor_id=".$_GET['doctor_id'];
				$results = mysql_query($query);
				if(!$results)
				{
					die('Could not enter data: ' . mysql_error());
				}
				$row = mysql_fetch_array($results);	
			}
			if(isset($_POST['submit']))
			{
					$first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $phone_no = $_POST['phone_no'];
          $address = $_POST['address'];
          $hospital_id = $_POST['hospital_id'];
          $sex = $_POST['sex'];
          $qualification = $_POST['qualification'];

					if(!$insert = mysql_query("UPDATE DOCTOR SET first_name='$first_name',last_name='$last_name',phone_no='$phone_no',address='$address',hospital_id=$hospital_id ,sex='$sex',qualification='$qualification' where doctor_id=".$_GET['doctor_id']))
						{
								echo "Problem entering the data";
						}
						
						echo "<meta http-equiv='refresh' content='0;url=doctors.php'>";
			

			}
			
mysql_close($conn);

		?>
		<br>
		<br>
	  <a href="doctors.php"><span class="glyphicon glyphicon-chevron-left" style="margin-left:2em"><b>Back</b></span> </a>
     <h2 style="color:#095d58;text-align:center;margin-top:-1em">Edit Profile</h2>

      <br>
<div id="form" style="width:50em;background-color:#f0f0f0;margin-left:16em;padding-top: 25px;padding-right: 25px ; padding-bottom: 25px;
    padding-left: 25px;border: 0px solid;box-shadow: 5px 5px 5px 2px #888888">
<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
      <h5 style="color:#095d58">First Name:</h5>
     <input type="text"class="form-control" name="first_name" id="first_name" style="width:30em" value="<?php echo $row['first_name']; ?>">
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Last Name:</h5>
      <input type="text" class="form-control" name="last_name" id="last_name" style="width:30em " value="<?php echo $row['last_name']; ?>">
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Contact No:</h5>
      <input type="text"  class="form-control" name="phone_no" id="phone_no" style="width:30em " value="<?php echo $row['phone_no']; ?>">
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Address:</h5>
     <textarea rows="2" cols="50" type="text"  class="form-control" name="address" id="address" style="width:30em " value="<?php echo $row['address']; ?>" ></textarea> 
    </div>
    <br>
  <div class="form-group">
      <h5 style="color:#095d58">Hospital Id:</h5>
     <input rows="2" cols="50" type="text"  class="form-control" name="hospital_id" id="hospital_id" style="width:30em " value="<?php echo $row['hospital_id']; ?>" > 
    </div>
    <br>
    <div class="form-group">
      <h5 style="color:#095d58">Sex:</h5>
      <input type="radio" name="sex" value="M" checked> M<br>
    <input type="radio" name="sex" value="F" > F<br>
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Qualification:</h5>
     <input rows="2" cols="50" type="text"  class="form-control" name="qualification" id="qualification" style="width:30em "  value="<?php echo $row['qualification']; ?>"> 
    </div>
    <br>


    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
</div>

        <?php
            include 'footer.php';
            include 'includesjs.php';
        ?>
    </body>
</html>
