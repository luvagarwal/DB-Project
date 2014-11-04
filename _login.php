<?php
$name = $_GET['name'];
$db = mysqli_connect('localhost', 'root', '123123', 'APOLLO');
$query = "SELECT employee_type from EMPLOYEE where user_name='$name'";
$result = $db -> query($query);
if($result->num_rows > 0){
    $result = $result -> fetch_array();
    if($result[0]=='a'){
        $query = "SELECT store_id from STORE";
        $result = $db -> query($query);
        for($i=0;$i<sizeof($result);$i++){
            echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="#">'.$result[$i].'</a></li>';
        }
    }
    else{
        $query = "SELECT store_id from EMPLOYEE where user_name='$name'";
        $result = $db -> query($query);
        if($result->num_rows > 0){
            $result = $result -> fetch_array();
            echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="#">'.$result[0].'</a></li>';
        }
    }
}  
?>