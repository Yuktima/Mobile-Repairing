<!DOCTYPE html>
<?php
    require "../connection.php";
    if(!isset($_SESSION))
      session_start();
    if(isset($_POST['login'])){
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        
        $query = "select * from admin where uname = '".$uname."' and pass = '".$pass."'";
        $res = mysqli_query($con, $query);
        if(mysqli_num_rows($res) != 0){
            $_SESSION['admin'] = 'true';
            header('location: adminIndex.php');
        }
        else
            echo "<script>alert('Invalid username or password');</script>";  
    }      
?>
<html>
    <head>
        <title>Admin Section</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="adminStyle.css"/>
    </head>
    <body style="background-color:goldenrod">
      <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <h3 class="navbar-brand">Admin Section</h3>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
        </nav>
        
       <div class=py-6>
            <div class="w-100 p-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </div>
        </div>
        
        <div class="text">
            <h2>Login</h2>
        </div>
        
        <div class="block">
            <div class="block-header">
              <h2>Login to your account</h2>
            </div>
            <form action="login.php" method="post">
            <div class="px-5">
               <div class="py-3">
                    <div class="form">
                        <label for="exampleInputEmail1">Username :</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "uname" placeholder="Enter email">
                        <label for="exampleInputPassword1">Password :</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password">
                    </div>
                </div>
            </div>
            <center>
                <input type="submit" class="btn btn-warning" name="login" value="Login">
            </center>
            </form>
        </div>
     
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>