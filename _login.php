<?php
$name = $_GET['name'];
$db = mysqli_connect('localhost', 'root', '123123', 'APOLLO');
$query = "SELECT employee_type from EMPLOYEE where user_name='$name'";
$result = $db -> query($query);
if($result->num_rows > 0){
    $result = $result -> fetch_array();
    if($result[0]=='a'){
        $query = "SELECT store_name from STORE";
        $result = $db -> query($query);
        while($row=$result->fetch_array()){
            echo "<option value=".$row['store_name'].">".$row['store_name']."</option>";
        }
    }
    else{
        $query = "SELECT store_id from EMPLOYEE where user_name='$name'";
        $result = $db -> query($query);
        if($result->num_rows > 0){
            $row = $result -> fetch_array();
            $query = "SELECT store_name from STORE where store_id=".$row['store_id'];
            $result = $db -> query($query);
            $row = $result -> fetch_array();
            echo "<option value=".$row['store_name'].">".$row['store_name']."</option>";
        }
    }
}
?>