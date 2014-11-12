<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />

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


<script>
	function search(val){
		obj = new XMLHttpRequest();
		obj.onreadystatechange=function(){
			if(obj.readyState==4 && obj.status==200){
				resphtml = obj.responseText;

				document.getElementById("details").innerHTML=resphtml;
			}
		}
		obj.open("GET", "searchemp.php?name="+val);
		obj.send();
	}
  function deleteemp(val){
    obj = new XMLHttpRequest();
    obj.onreadystatechange=function(){
      if(obj.readyState==4 && obj.status==200){
        document.getElementById(val).style='display: none;';
      }
    }
    obj.open("GET", "deleteemp.php?name="+val);
    obj.send();    
  }
  function checkusername(val){
    obj = new XMLHttpRequest();
    obj.onreadystatechange=function(){
      if(obj.readyState==4 && obj.status==200){
        resphtml = obj.responseText;
        if(resphtml==0){
          document.getElementById("available").style='color: green;float:right; margin-right:14em; margin-top:-3em;';
          document.getElementById("notavailable").style='display: none;';
        }
        else{
          document.getElementById("available").style='display: none;';
          document.getElementById("notavailable").style='color: red;  color: red;float:right; margin-right:14em; margin-top:-3em;';
        }
      }
    }
    obj.open("GET", "checkusername.php?name="+val);
    obj.send();    
  }

  function conformpass()
  {
    pass = document.getElementById("password").value;
    conform_pass = document.getElementById('confirm_password').value;
    if(pass==conform_pass)
    {
      document.getElementById('validate_pass').innerHTML = "Passwords match";
      document.getElementById('not_validate_pass').innerHTML = "";

    } 
    else
    {
      document.getElementById('not_validate_pass').innerHTML = "Passwords do not match";
      document.getElementById('validate_pass').innerHTML = "";

    }
  }
</script>
<?php
session_start();
if($_SESSION['type']!='e')
  echo '<button class="btn" id="toggle" style="margin-left:71em;margin-top:1em;border: 0px solid;box-shadow: 5px 3px 3px 2px #888888">Add Employee</button>';
?>

<div class="form-group">
     <input type="text"class="form-control" onkeyup="search(this.value)" name="user_name" id="user_name" style="width:30em;margin-top:2em;margin-left:2em;" placeholder="Search for a Employee....">
</div>
<button type="submit" class="btn btn-default" name="search" style="margin-left:33em;margin-top:-6.2em;box-shadow: 1px 1px 1px 1px #888888">
  <span class="glyphicon glyphicon-search"></span>
  Search
</button>


<div id="form" style="width:50em;display:none;background-color:#f0f0f0;margin-left:16em;padding-top: 25px;padding-right: 25px ; padding-bottom: 25px;
    padding-left: 25px;border: 0px solid;box-shadow: 5px 5px 5px 2px #888888">
<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
      <h5 style="color:#095d58">First Name:</h5>
     <input type="text"class="form-control" name="first_name" id="first_name" style="width:30em" required>
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Last Name:</h5>
      <input type="text" class="form-control" name="last_name" id="Last_Name" style="width:30em " required>
    </div>
   <div class="form-group">
				<div class='input-group date' id='datetimepicker5'>
					<h5 style="color:#095d58"> Date of Birth: </h5>
					<input type='date' class="form-control" data-date-format="YYYY/MM/DD" name="date" style="width:30em" required>
					
				</div>
			</div>
    <div class="form-group">
      <h5 style="color:#095d58">Sex:</h5>
      <input type="radio" name="sex" value="M" checked> M<br>
		<input type="radio" name="sex" value="F" > F<br>
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Date of Joining:</h5>
      <input type="text"  class="form-control" name="date_joining" id="date_joining" style="width:30em " required>
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Address of Residence:</h5>
      <textarea type="text"  rows="6"  cols="50" class="form-control" name="address" id="address" style="width:30em " required></textarea> 
    </div>


    <div class="form-group">
      <h5 style="color:#095d58">Salary:</h5>
      <input type="text"  class="form-control" name="salary" id="salary" style="width:30em " required> 
    </div>

   <div class="form-group">
      <h5 style="color:#095d58">Employee Type:</h5>
      <?php
      session_start();
      if($_SESSION['type']=='a'){
        echo '<input type="radio" name="emp_type" value="m" > Manager<br>';
        echo '<input type="radio" name="emp_type" value="a" > Admin<br>';
      }
      ?>
		  <input type="radio" name="emp_type" value="e" >Employee<br>
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Phone No:</h5>
      <input type="text"  class="form-control" name="phone_no" id="phone_no" style="width:30em " required> 
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Qualifiations:</h5>
      <input type="text"  class="form-control" name="qualify" id="qualify" style="width:30em " required> 
    </div>


    <div class="form-group">
      <h5 style="color:#095d58">Photo:</h5>
      <input type="file"  name="image" id="image" required> 
    </div>
    <br>

    <div class="form-group">
      <h4 style="color:orange">Login Credentials</h4>
    </div>


    <div class="form-group">
      <h5 style="color:#095d58">User Name:</h5>
     <input type="text" class="form-control" onkeyup=checkusername(this.value) name="user_name" id="user_name" style="width:30em" required>
    </div>
    <span id="available" style="display: none; color: green;"class="glyphicon glyphicon-ok"></span>
    <span id="notavailable" style="display: none; color: red"class="glyphicon glyphicon-remove"></span>
    <div class="form-group">
      <h5 style="color:#095d58">Password:</h5>
      <input type="password" class="form-control" name="password" id="password" style="width:30em " required> 
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Confirm Password:</h5>
      <input type="password" class="form-control" name="confirm_password" id="confirm_password" style="width:30em " required onkeyup="conformpass()"> 
    </div>
    <div id="validate_pass" style="float:right;margin-top:-3em;margin-right:6em;color:green"></div>
    <div id="not_validate_pass" style="float:right;margin-top:-3em;margin-right:4em;color:red"></div>


    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
</div>




<?php
session_start();
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
  $store = $_SESSION['store'];

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
		if(!$insert = mysql_query("INSERT INTO EMPLOYEE VALUES ('','$user_name','$first_name','$last_name','{$imageProperties['mime']}','{$imgData}','$date','$sex','$date_joining','$address','$salary','$emp_type','$phone_no','$qualify','$password',$store)"))
		{
			echo "Problem entering the data";
		}
	}
}
mysql_close($conn);
}
?>
<br>
<br>
<hr>
<h2 style="color:#095d58;text-align:center"> Employee's List</h2>
<hr>

<div id="details">
<?php include "searchemp.php" ?>
</div>
