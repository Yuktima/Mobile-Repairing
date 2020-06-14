<?php
    require "connection.php";
    if(!isset($_SESSION))
        session_start();

    $count = mysqli_num_rows(mysqli_query($con, "select * from cart where user = '".$_SESSION['mail']."' AND status='false'"));
    if($count != 0){
    $query = "insert into orders(user, oDate, status, price) values('".$_SESSION['mail']."', NOW(), 'Waiting', ".$_SESSION['totalCartPrice'].")";
    mysqli_query($con, $query);
    }

    $ono = mysqli_fetch_array(mysqli_query($con, "select max(ono) as mo from orders"));
    $query = "update cart set ono = ".$ono['mo']." where user = '".$_SESSION['mail']."' AND status='false'";
    mysqli_query($con, $query);
    
    $query = "update cart set status = 'true_".$ono['mo']."' where user = '".$_SESSION['mail']."' AND status='false'";
    mysqli_query($con, $query);
    header("location: myAccount.php?myOrder");
?>