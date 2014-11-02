<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
?>
<html lang="en">
    <head>
        <title>Appolo-Home</title>
        <?php include 'includes.php';?>
    </head>
    <body>
        <?php include 'header.php';?>
        <?php include '_delivery.php';?>
        <?php
            include 'footer.php';
            include 'includesjs.php';
        ?>
    </body>
</html>