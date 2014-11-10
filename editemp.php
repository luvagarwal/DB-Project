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
			if(isset($_GET['employee_id'])){
				$query = "Select * from EMPLOYEE WHERE employee_id=".$_GET['employee_id'];
				$results = mysql_query($query);
				if(!$results)
				{
					die('Could not enter data: ' . mysql_error());
				}
				$row = mysql_fetch_array($results);	
			}
			if(isset($_POST['submit']))
			{
					$user_name = $_POST['user_name'];
					$first_name = $_POST['first_name'];
					$last_name = $_POST['last_name'];
					$date = $_POST['date'];
					$sex= $_POST['sex'];
					$date_joining = $_POST['date_joining'];
					$address = $_POST['address'];
					$salary = $_POST['salary'];
					$emp_type = $_POST['emp_type'];
					$phone_no = $_POST['phone_no'];
					$qualify = $_POST['qualify'];
					$file = $_FILES['image']['tmp_name'];
					$password = md5($_POST['password']);
					if(!isset($file))
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
							if(!$insert = mysql_query("UPDATE EMPLOYEE SET user_name='$user_name',first_name='$first_name',last_name='$last_name',imageType='{$imageProperties['mime']}',imageData='{$imgData}',dob='$date',sex='$sex',date_of_joining='$date_joining',address='$address',salary='$salary',employee_type='$emp_type',phone_no='$phone_no',qualification = '$qualify',password='$password',store_id=1 where employee_id=".$_GET['employee_id']))
							{
								echo "Problem entering the data";
							}
						}
						echo "<meta http-equiv='refresh' content='0;url=employees.php'>";
					}

			}
			
mysql_close($conn);

		?>
		<br>
		<br>
	  <a href="employees.php"><span class="glyphicon glyphicon-chevron-left" style="margin-left:2em"><b>Back</b></span> </a>
     <h2 style="color:#095d58;text-align:center;margin-top:-1em">Edit Profile</h2>

      <br>
<div id="form" style="width:50em;background-color:#f0f0f0;margin-left:16em;padding-top: 25px;padding-right: 25px ; padding-bottom: 25px;
    padding-left: 25px;border: 0px solid;box-shadow: 5px 5px 5px 2px #888888">
<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
      <h5 style="color:#095d58">First Name:</h5>
     <input type="text"class="form-control" name="first_name" id="first_name" style="width:30em" required value="<?php echo $row['first_name']; ?>">
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Last Name:</h5>
      <input type="text" class="form-control" name="last_name" id="Last_Name" style="width:30em " required value="<?php echo $row['last_name']; ?>">
    </div>
   <div class="form-group">
				<div class='input-group date' id='datetimepicker5'>
					<h5 style="color:#095d58"> Date of Birth: </h5>
					<input type='text' class="form-control" data-date-format="YYYY/MM/DD" name="date" required value="<?php echo $row['dob']; ?>">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
    <div class="form-group">
      <h5 style="color:#095d58">Sex:</h5>
      <input type="radio" name="sex" value="<?php echo $row['first_name']; ?>" checked> M<br>
		<input type="radio" name="sex" value > F<br>
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Date of Joining:</h5>
      <input type="text"  class="form-control" name="date_joining" id="date_joining" style="width:30em " required value="<?php echo $row['date_of_joining']; ?>">
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Address of Residence:</h5>
      <textarea type="text"  rows="6"  cols="50" class="form-control" name="address" id="address" style="width:30em " required value="<?php echo $row['address']; ?>"></textarea> 
    </div>


    <div class="form-group">
      <h5 style="color:#095d58">Salary:</h5>
      <input type="text"  class="form-control" name="salary" id="salary" style="width:30em " required value="<?php echo $row['salary']; ?>"> 
    </div>

   <div class="form-group">
      <h5 style="color:#095d58">Sex:</h5>
      <input type="radio" name="emp_type" value="m" checked> Manager<br>
		<input type="radio" name="emp_type" value="a" > Admin<br>
		<input type="radio" name="emp_type" value="e" >Employee<br>
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Phone No:</h5>
      <input type="text"  class="form-control" name="phone_no" id="phone_no" style="width:30em " required value="<?php echo $row['phone_no']; ?>"> 
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Qualifiations:</h5>
      <input type="text"  class="form-control" name="qualify" id="qualify" style="width:30em " required value="<?php echo $row['qualification']; ?>"> 
    </div>


    <div class="form-group">
      <h5 style="color:#095d58">Photo:</h5>
      <input type="file"  name="image" id="image" required> 
    </div>
    <br>

    <div class="form-group">
      <h4 style="color:grey">Login Credentials</h4>
    </div>


    <div class="form-group">
      <h5 style="color:#095d58">User Name:</h5>
     <input type="text" class="form-control" onkeyup=checkusername(this.value) name="user_name" id="user_name" style="width:30em" required value="<?php echo $row['user_name']; ?>"> 
    </div>
    <span id="available" style="display: none; color: green;"class="glyphicon glyphicon-ok"></span>
    <span id="notavailable" style="display: none; color: red"class="glyphicon glyphicon-remove"></span>
    <div class="form-group">
      <h5 style="color:#095d58">Password:</h5>
      <input type="password" class="form-control" name="password" id="password" style="width:30em " required> 
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Confirm Password:</h5>
      <input type="password" class="form-control" name="confirm_password" id="confirm_password" style="width:30em " required> 
    </div>

    <button type="submit" class="btn btn-default" name="submit">Save Changes</button>
  </form>
</div>




        <?php
            include 'footer.php';
            include 'includesjs.php';
        ?>
    </body>
</html>
