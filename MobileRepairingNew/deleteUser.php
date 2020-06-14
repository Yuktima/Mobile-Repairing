<?php
    require "connection.php";
    if(!isset($_SESSION))
        session_start();
    if(!isset($_SESSION['mail']))
        header('location: index.php');
    
    mysqli_query($con, "delete from cart where user = '".$_SESSION['mail']."'");
    mysqli_query($con, "delete from orders where user = '".$_SESSION['mail']."'");
    mysqli_query($con, "delete from users where mail = '".$_SESSION['mail']."'");
    header('location: logout.php');
?>