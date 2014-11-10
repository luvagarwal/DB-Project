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
<script src="jquery-1.6.2.min.js"></script>
<script src="jquery-ui-1.8.15.custom.min.js"></script>
<link rel="stylesheet" href="jquery/jqueryCalendar.css">
<script>
        jQuery(function(
            jQuery( "#date" ).datepicker();
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
    obj.open("GET", "searchpur.php?name="+val);
    obj.send();
  }

  function deletepur(val){
    obj = new XMLHttpRequest();
    obj.onreadystatechange=function(){
      if(obj.readyState==4 && obj.status==200){
        document.getElementById(val).style='display: none;';
      }
    }
    obj.open("GET", "deletepur.php?id="+val);
    obj.send();    
  }
</script>

<button class="btn" id="toggle" style="margin-left:70em;margin-top:2em">Place A New order</button>

<div class="form-group">
     <input type="text"class="form-control" onkeyup="search(this.value)" name="user_name" id="user_name" style="width:30em;margin-top:-2em;margin-left:2em;" placeholder="Search for a Employee....">
</div>
<button type="submit" class="btn btn-default" name="search" style="margin-left:33em;margin-top:-6.2em;box-shadow: 1px 1px 1px 1px #888888">Search</button>

<div id="form" style="width:50em;display:none;background-color:#f0f0f0;margin-left:20em;padding-top: 25px;padding-right: 25px ; padding-bottom: 25px;
    padding-left: 25px;">
<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
      <h5 style="color:#095d58">Purchase Id:</h5>
     <input type="text"class="form-control" name="purchase_id" id="purchase_id" style="width:30em" required>
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Customer Id:</h5>
      <input type="text" class="form-control" name="customer_id" id="customer_id" style="width:30em " required>
    </div>
   <div class="form-group">
				<div class='input-group date' id='datetimepicker5'>
					<h5 style="color:#095d58"> Date of Purchase: </h5>
					<input type="date" class="form-control" data-date-format="YYYY/MM/DD" name="date" id="date" required />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
    <div class="form-group">
      <h5 style="color:#095d58">Payment Method</h5>
      <input type="radio" name="payment_method" value="Cash" checked> Cash<br>
		<input type="radio" name="payment_method" value="Credit Card" > Credit Card<br>
    <input type="radio" name="payment_method" value="Debit Card" > Debit Card<br>
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Product Name:</h5>
      <input type="text"  class="form-control" name="product_name" id="product_name" style="width:30em" required>
    </div>

    <div class="form-group">
      <h5 style="color:#095d58">Total Items:</h5>
      <input type="text"  rows="6"  cols="50" class="form-control" name="total_items" id="total_items" style="width:30em" required> 
    </div>


    <div class="form-group">
      <h5 style="color:#095d58">Total Price:</h5>
      <input type="text"  class="form-control" name="total_price" id="total_price" style="width:30em" required> 
    </div>

 
    <div class="form-group">
      <h5 style="color:#095d58">Discount:</h5>
      <input type="text"  class="form-control" name="discount" id="discount" style="width:30em" required> 
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
	$purchase_id = $_POST['purchase_id'];
	$customer_id = $_POST['customer_id'];
	$date = $_POST['date'];
	$payment_method= $_POST['payment_method'];
	$product_name = $_POST['product_name'];
	$total_items = $_POST['total_items'];
	$total_price = $_POST['total_price'];
	$discount = $_POST['discount'];

		if(!$insert = mysql_query("INSERT INTO PURCHASE VALUES ($purchase_id,$customer_id,'$date','$payment_method','$product_name',$total_items,$total_price,$discount)"))
		{
			echo "Problem entering the data";

		}
    else
    {
      $query = "SELECT no_of_items FROM PRODUCT where product_name='$product_name'";
      $result = mysql_query($query);
      $row = mysql_fetch_array($result);
      $resultant_items = $row['no_of_items'] - $total_items;
      $query = "UPDATE PRODUCT SET no_of_items=".$resultant_items." WHERE product_name='$product_name'";
      mysql_query($query); 
    }

}
mysql_close($conn);
?>

<div id="details">
<?php include "searchpur.php" ?>
</div>
