<?php
    require "../connection.php";
    $res = mysqli_num_rows(mysqli_query($con, "select * from users"));
    $i = 1;
    while($i <= $res){
        echo $res;
        echo $i;
        if(isset($_POST['db'.$i])){
            mysqli_query($con, "delete from cart where user = '".$_POST['dt'.$i]."'");
            mysqli_query($con, "delete from orders where user = '".$_POST['dt'.$i]."'");
            mysqli_query($con, "delete from users where mail = '".$_POST['dt'.$i]."'");
            header('location: manage_users.php');
        }
        $i++;
    }
?>