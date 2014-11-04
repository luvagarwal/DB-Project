<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<script>

$(document).ready(function clickbutton(){
  $("button#toggle").click(function(){
    $('#form').toggle(1000);
  });
});

$(function () {
	$('#datetimepicker5').datepicker({
			pickTime: false
			});
		});


$(".date-picker").datepicker();

$(".date-picker").on("change", function () {
    var id = $(this).attr("id");
    var val = $("label[for='" + id + "']").text();
    $("#msg").text(val + " changed");
});
</script>

<!--<script src="jquery-1.6.2.min.js"></script>
<script src="jquery-ui-1.8.15.custom.min.js"></script>-->
<link rel="stylesheet" href="jquery/jqueryCalendar.css">
<script>
                jQuery(function() {
                                jQuery( "#date_joining" ).datepicker();
                });
                </script>



<button class="btn" id="toggle" style="margin-left:71em;margin-top:1em;border: 0px solid;box-shadow: 5px 3px 3px 2px #888888">Add Employee</button>
<div id="form" style="width:50em;display:none;background-color:#f0f0f0;margin-left:16em;padding-top: 25px;padding-right: 25px ; padding-bottom: 25px;
    padding-left: 25px;border: 0px solid;box-shadow: 5px 5px 5px 2px #888888">
<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
      <h5 style="color:#095d58">First Name:</h5>
     <input type="text"class="form-control" name="first_name" id="first_name" style="width:30em">
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Last Name:</h5>
      <input type="text" class="form-control" name="last_name" id="Last_Name" style="width:30em ">
    </div>
   <div class="form-group">
				<div class='input-group date' id='datetimepicker5'>
					<h5 style="color:#095d58"> Date of Birth: </h5>
					<input type='text' class="form-control" data-date-format="YYYY/MM/DD" name="date"/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
    <div class="form-group">
      <h5 style="color:#095d58">Sex:</h5>
      <input type="radio" name="sex" value="M" checked> M<br>
		<input type="radio" name="sex" value="F" > F<br>
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Date of Joining:</h5>
      <input type="text"  class="form-control" name="date_joining" id="date_joining" style="width:30em ">
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Address of Residence:</h5>
      <textarea type="text"  rows="6"  cols="50" class="form-control" name="address" id="address" style="width:30em "></textarea> 
    </div>


    <div class="form-group">
      <h5 style="color:#095d58">Salary:</h5>
      <input type="text"  class="form-control" name="salary" id="salary" style="width:30em "> 
    </div>

   <div class="form-group">
      <h5 style="color:#095d58">Sex:</h5>
      <input type="radio" name="emp_type" value="m" checked> Manager<br>
		<input type="radio" name="emp_type" value="a" > Admin<br>
		<input type="radio" name="emp_type" value="e" >Employee<br>
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Phone No:</h5>
      <input type="text"  class="form-control" name="phone_no" id="phone_no" style="width:30em "> 
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Qualifiations:</h5>
      <input type="text"  class="form-control" name="qualify" id="qualify" style="width:30em "> 
    </div>


    <div class="form-group">
      <h5 style="color:#095d58">Photo:</h5>
      <input type="file"  name="image" id="image" > 
    </div>
    <br>

    <div class="form-group">
      <h4 style="color:blue">Login Credentials</h4>
    </div>


    <div class="form-group">
      <h5 style="color:#095d58">User Name:</h5>
     <input type="text"class="form-control" name="user_name" id="user_name" style="width:30em">
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Password:</h5>
      <input type="password"  name="password" id="password" > 
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Confirm Password:</h5>
      <input type="password"  name="confirm_password" id="confirm_password" > 
    </div>

    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
</div>




<?php
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());

//Variables
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
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name = addslashes($_FILES['image']['name']);
	$image_size = getimagesize($_FILES['image']['tmp_name']);
	if($image_size == FALSE)
		echo "This is not an Image";
	else
	{
		if(!$insert = mysql_query("INSERT INTO EMPLOYEE VALUES ('','$user_name','$first_name','$last_name','$image_name','$date','$sex','$date_joining','$address','$salary','$emp_type','$phone_no','$qualify','$password')"))
		{
			echo "Problem entering the data";

		}
	}
}

}
$query = "Select * from EMPLOYEE";
$results = mysql_query($query,$conn);
if(!results)
{
	die('Could not enter data: ' . mysql_error());
}
?>
<br>
<br>
<hr>
<h2 style="color:#095d58;text-align:center"> Employee's List</h2>
<hr>
<table class='table table-hover' border="0" style="margin-left:2em;width:77em;border:1px solid ;box-shadow: 5px 3px 3px 2px #888888">
<thead style="color:white;text-align:center;background-color:#808080;font-weight:bold;">
<td>User Name</td>
<td>First Name</td>
<td>Last Name</td>
<td>Date</td>
<td>Sex</td>
<td>Date of Joining</td>
<td>Address</td>
<td>Salary</td>
<td>Employee Type</td>
<td>Phone No</td>
<td>Qualification</td>


</thead>

<?php

while($row = mysql_fetch_array($results))
{
	echo "<tr style='text-align:center'><td>".$row['user_name']."</td>";
	echo "<td>".$row['first_name']."</td>";
	echo "<td>".$row['last_name']."</td>";
	//echo "<td><img src='showimages.php?id=".$row['employee_id']."'></td>";
	echo "<td>".$row['dob']."</td>";
	echo "<td>".$row['sex']."</td>";
	echo "<td>".$row['date_of_joining']."</td>";
	echo "<td>".$row['address']."</td>";
	echo "<td>".$row['salary']."</td>";
	echo "<td>".$row['employee_type']."</td>";
	echo "<td>".$row['phone_no']."</td>";
	echo "<td>".$row['qualification']."</td></tr>";
}
echo "</table>";
mysql_close($conn);

?>


