<?php
$name = "jflkfdl";
$db = mysqli_connect('localhost', 'root', '123123', 'APOLLO');
$query = "SELECT employee_type from EMPLOYEE where user_name='$name'";
$result = $db -> query($query);
echo "jdfjsdl";
if(mysql_num_rows($result) > 0){
    $result = $result -> fetch_array();
        echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="#">'.$result.'</a></li>';
}  
?>