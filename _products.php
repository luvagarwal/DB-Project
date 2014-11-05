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

<!--<script src="jquery-1.6.2.min.js"></script>
<script src="jquery-ui-1.8.15.custom.min.js"></script>-->

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
		obj.open("GET", "searchpro.php?name="+val);
		obj.send();
	}
</script>

<?php
//  variables for the connection
$conn = mysql_connect("localhost","root","123123") or die(mysql_error());
mysql_select_db("APOLLO",$conn) or die(mysql_error());
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
		$query = "INSERT INTO PRODUCT VALUES ('$product_name',1,$no_of_items,'$manufacture_date','$expire_date',$procurrent_cost,'{$imageProperties['mime']}','{$imgData}');";
		if(!$insert = mysql_query($query))
		{	echo "asasasa3";
			echo "Problem entering the data";
		}
	}
}
mysql_close($conn);
?>

<button class="btn" id="toggle" style="margin-left:71em;margin-top:1em;border: 0px solid;box-shadow: 5px 3px 3px 2px #888888">Add Product</button>


<div class="form-group">
     <input type="text"class="form-control" onkeyup="search(this.value)" name="user_name" id="user_name" style="width:30em;margin-top:-2em;margin-left:2em;" placeholder="Search for a Employee....">
</div>
<button type="submit" class="btn btn-default" name="search" style="margin-left:33em;margin-top:-6.2em;box-shadow: 1px 1px 1px 1px #888888">Search</button>


<div id="form" style="width:50em;display:none;background-color:#f0f0f0;margin-left:16em;padding-top: 25px;padding-right: 25px ; padding-bottom: 25px;
    padding-left: 25px;border: 0px solid;box-shadow: 5px 5px 5px 2px #888888">
<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
      <h5 style="color:#095d58">Product Name:</h5>
     <input type="text"class="form-control" name="product_name" id="product_name" style="width:30em" >
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">No of Items:</h5>
      <input type="text" class="form-control" name="no_of_items" id="no_of_items" style="width:30em " >
    </div>
   <div class="form-group">
				<div class='input-group date' id='datetimepicker5'>
					<h5 style="color:#095d58">Manufacturing Date: </h5>
					<input type='text' class="form-control" data-date-format="YYYY/MM/DD" name="manufacture_date" >
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
    <div class="form-group">
				<div class='input-group date' id='datetimepicker5'>
					<h5 style="color:#095d58">Expire Date: </h5>
					<input type='text' class="form-control" data-date-format="YYYY/MM/DD" name="expire_date" >
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
    <div class="form-group">
      <h5 style="color:#095d58">Procurrent Cost:</h5>
      <input type="text"  class="form-control" name="procurrent_cost" id="procurrent_cost" style="width:30em " >
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Photo:</h5>
      <input type="file"  name="image" id="image" > 
    </div>
    <br>

    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
</div>



<br>
<hr>
<h2 style="color:#095d58;text-align:center">Products Available</h2>
<hr>
<br>
	
<div id="details">
<?php include "searchpro.php" ?>
</div>