<title>Home</title>
<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }
    include 'includes.php';
    include 'header.php';
?>
<?php
    include 'footer.php';
    include 'includesjs.php';
?>