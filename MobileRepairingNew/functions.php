<?php 
#header('Content-Type: application/json');
// require "connection.php";
if(isset($_POST['functionname'])){
    if(!isset($_SESSION)){
        session_start();
    }
    
    if($_POST['functionname'] == 'setSessionCompany'){
        $_SESSION['company'] = $_POST['arguments'];
    }
    else if($_POST['functionname'] == 'setSessionProblem'){
        $_SESSION['problem'] = $_POST['arguments'];
    }
    
}
    

$db = mysqli_connect("localhost","root","","repairing_shop");

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
} 
    

function getPro(){
    require "connection.php";
    $getCompnayProblem = "select * from problems where problems_id in (select pid from PC where company = '".$_SESSION['company']."' or company = 'All')";
    #$get_products = "select * from problems order by 1 ASC LIMIT 0,8";
    
    $prob = mysqli_query($con, $getCompnayProblem);
    
    while($row=mysqli_fetch_array($prob)){
        
        $pro_id = $row['problems_id'];
        
        $pro_title = $row['problem_name'];
        
        $pro_price = $row['price'];
        
        echo"
            <a href='item.php?problems_id=$pro_id' class='list-group-item list-group-item-action' id='$pro_id' onclick=setProblemSession(this)>$pro_id. $pro_title</a>
        ";
    }
}

?>