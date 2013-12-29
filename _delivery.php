<?php
if(isset($_POST['industry_id'])){
  $db = mysqli_connect('localhost', 'root', '123123', 'APOLLO');
  if(!$db)
  {
    die('Could not connect: ' . mysql_error());
  }
  session_start();
  $query1 = "insert into DELIVERY(industry_id, product_name, total_items, total_paid, store_id)
            values(".$_POST['industry_id'].", '".$_POST['name']."', ".$_POST['num'].", ".$_POST['price'].",".$_SESSION['store'].");";
  $query2 = "update PRODUCT set no_of_items=no_of_items+".$_POST['num']." where product_name='".$_POST['name']."' ";
  $db->query($query1);
  $db->query($query2);
}
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

$(document).ready(function clickbutton(){
  $("button#toggle").click(function(){
    $('#form').toggle(1000);
  });
});

</script>

<button class="btn" id="toggle" style="margin-left:71em;margin-top:1em;border: 0px solid;box-shadow: 5px 3px 3px 2px #888888">Take Delivery</button>
<div id="form" style="width:50em;display:none;background-color:#f0f0f0;margin-left:16em;padding-top: 25px;padding-right: 25px ; padding-bottom: 25px;
    padding-left: 25px;border: 0px solid;box-shadow: 5px 5px 5px 2px #888888">
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
      <h5 style="color:#095d58">Industry Id:</h5>
     <input type="text"class="form-control" name="industry_id" style="width:30em" required>
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Product Name:</h5>
      <input type="text" class="form-control" name="name" style="width:30em" required>
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">No Of Items:</h5>
      <input type="text" class="form-control" name="num" style="width:30em" required>
    </div>
    <div class="form-group">
      <h5 style="color:#095d58">Total Price:</h5>
      <input type="text" class="form-control" name="price" style="width:30em" required>
    </div>

    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
</div>


<hr>
<h2 style="color:#095d58;text-align:center">Recent Deliveries</h2>
<hr>
<table class='table table-hover' border="0" style="margin-top:2em;margin-left:2em;width:77em;border:1px solid ;box-shadow: 1px 1px 1px 1px #888888">
<thead style="color:white;text-align:center;background-color:black;font-weight:bold;">
<td>Industry Name</td>
<td>Product Name</td>
<td>Total Items</td>
<td>Total Paid</td>
<td>Time of Delivery</td>
</thead>

<?php
$db = mysqli_connect('localhost', 'root', '123123', 'APOLLO');
if(!$db)
{
  die('Could not connect: ' . mysql_error());
}
$query = "select * from DELIVERY D JOIN INDUSTRY I ON (D.industry_id=I.industry_id)";
$result = $db->query($query);
while($row = $result->fetch_array()){
   echo "<tr style='text-align:center'><td>".$row['industry_name']."</td>";
    echo "<td>".$row['product_name']."</td>";
    echo "<td>".$row['total_items']."</td>";
    echo "<td>".$row['total_paid']."</td>";
    echo "<td>".$row['time_of_delivery']."</td></tr>";
    
}
echo "</table>";
?>