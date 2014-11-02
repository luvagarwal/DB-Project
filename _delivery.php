 <form method="get" action="">
    <div class="form-group">
      <h4 style="color:#095d58">Product Name</h4>
     <input type="text"class="form-control" name="product_name" id="customer-name" style="width:50em">
    </div>
    <div class="form-group">
      <h4 style="color:#095d58">Industry Name</h4>
      <input type="text"  rows="6"  cols="50" class="form-control" name="industry_name" id="industry" style="width:50em "></textarea> 
    </div>
    <div class="form-group">
      <h4 style="color:#095d58">No of Items</h4>
      <input type="text"  rows="6"  cols="50" class="form-control" name="no_items" id="items" style="width:50em "></textarea> 
    </div>
    <div class="form-group">
      <h4 style="color:#095d58">Total Paid</h4>
      <input type="text"  rows="6"  cols="50" class="form-control" name="price" id="price" style="width:50em "></textarea> 
    </div>
    <div class="form-group">
      <h4 style="color:#095d58"></h4>
      <input type="text"  rows="6"  cols="50" class="form-control" name="price" id="price" style="width:50em "></textarea> 
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>

<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "123123";

$conn = mysql_connect($dbhost,$dbuser,$dbpassword);

//selecting the database
mysql_select_db("APOLLO",$conn);
if(!conn)
{
	die('Could not connect: ' . mysql_error());
}


?>