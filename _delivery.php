<?php
if(isset($_POST['industry_id'])){
  $db = mysqli_connect('localhost', 'root', '123123', 'APOLLO');
  if(!$db)
  {
    die('Could not connect: ' . mysql_error());
  }
  $query1 = "insert into DELIVERY(industry_id, product_name, total_items, total_paid)
            values(".$_POST['industry_id'].", '".$_POST['name']."', ".$_POST['num'].", ".$_POST['price'].");";
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

<?php
$db = mysqli_connect('localhost', 'root', '123123', 'APOLLO');
if(!$db)
{
  die('Could not connect: ' . mysql_error());
}
$query = "select * from DELIVERY";
$result = $db->query($query);
while($row = $result->fetch_array()){
    echo "<div style='box-shadow: 1px 2px 2px 1px #888888;
          width:77em;background-color:#f0f0f0;margin-left:2em;height:32em;padding-right:
          20em;padding-top:2em'>";
    echo "<table class='table table-hover' style='width:40em;float:right;margin-left:70em;
          margin-top:-17em; list-style-type: none'><tr><td colspan='2'><b style='color:
          #0000ff'>Product Name:</b></td><td>".$row['product_name']."</td></tr>";
    echo "<tr><td colspan='2'><b style='color:#0000ff'>No Items:&nbsp&nbsp&nbsp</b></td>
          <td>".$row['total_items']."</td></tr>";
    echo "<tr><td colspan='2'><b style='color:#0000ff'>Industry ID:&nbsp&nbsp&nbsp</b></td>
          <td>".$row['industry_id']."</td></tr>";
    echo "<tr><td colspan='2'><b style='color:#0000ff'>Total Price:&nbsp&nbsp&nbsp</b></td>
          <td>".$row['total_paid']."</td></tr>";
    echo "</table>";
    echo "</div><br>";
}

?>