<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="jquery/jqueryCalendar.css">
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
		obj.open("GET", "searchdoct.php?name="+val);
		obj.send();
	}
	function deletedoct(val){
    obj = new XMLHttpRequest();
    obj.onreadystatechange=function(){
      if(obj.readyState==4 && obj.status==200){
        document.getElementById(val).style='display: none;';
      }
    }
    obj.open("GET", "deletedoct.php?name="+val);
    obj.send();    
  }
</script>

<?php
//  variables for the connection
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());
if(isset($_POST['submit']))
{	
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$phone_no = $_POST['phone_no'];
	$address = $_POST['address'];
	$hospital_id = $_POST['hospital_id'];
	$sex = $_POST['sex'];
	$qualification = $_POST['qualification'];	
	$query = "INSERT INTO DOCTOR (first_name,last_name,phone_no,address,hospital_id,sex,qualification) VALUES ('$first_name','$last_name','$phone_no','$address',$hospital_id,'$sex','qualification');";
	if(!$insert = mysql_query($query))
	{	
		echo "Problem entering the data";
	}
}

mysql_close($conn);
?>

<button class="btn" id="toggle" style="margin-left:71em;margin-top:1em;border: 0px solid;box-shadow: 5px 3px 3px 2px #888888">Add a Doctor</button>


<div class="form-group">
     <input type="text"class="form-control" onkeyup="search(this.value)" name="user_name" id="user_name" style="width:30em;margin-top:-2em;margin-left:2em;" placeholder="Search for a Doctor....">
</div>
<button type="submit" class="btn btn-default" name="search" style="margin-left:33em;margin-top:-6.2em;box-shadow: 1px 1px 1px 1px #888888">Search</button>


<div id="form" style="width:50em;display:none;background-color:#f0f0f0;margin-left:16em;padding-top: 25px;padding-right: 25px ; padding-bottom: 25px;
    padding-left: 25px;border: 0px solid;box-shadow: 5px 5px 5px 2px #888888">
<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
      <h5 style="color:#095d58">First Name:</h5>
     <input type="text"class="form-control" name="first_name" id="first_name" style="width:30em" >
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Last Name:</h5>
      <input type="text" class="form-control" name="last_name" id="last_name" style="width:30em " >
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Contact No:</h5>
      <input type="text"  class="form-control" name="phone_no" id="phone_no" style="width:30em " >
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Address:</h5>
     <textarea rows="2" cols="50" type="text"  class="form-control" name="address" id="address" style="width:30em " ></textarea> 
    </div>
    <br>
	<div class="form-group">
      <h5 style="color:#095d58">Hospital Id:</h5>
     <input rows="2" cols="50" type="text"  class="form-control" name="hospital_id" id="hospital_id" style="width:30em " > 
    </div>
    <br>
    <div class="form-group">
      <h5 style="color:#095d58">Sex:</h5>
      <input type="radio" name="sex" value="M" checked> M<br>
		<input type="radio" name="sex" value="F" > F<br>
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Qualification:</h5>
     <input rows="2" cols="50" type="text"  class="form-control" name="qualification" id="qualification" style="width:30em " > 
    </div>
    <br>


    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
</div>



<hr>
<h2 style="color:#095d58;text-align:center"> The Doctors  Prescribed by the Customers </h2>
<hr>
<div id="details">
<?php include "searchdoct.php" ?>
</div>
