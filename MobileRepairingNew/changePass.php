<!DOCTYPE html>
<?php
  require "connection.php";
  if(!isset($_SESSION))
    session_start();

  if(!isset($_SESSION['mail']))
    header('location: index.php');

  if(isset($_POST['updatePass'])){
    $ap = mysqli_fetch_array(mysqli_query($con, "select password from users where mail = '".$_SESSION['mail']."'"));
    if($ap['password'] == $_POST['op']){
      if($_POST['np'] == $_POST['cp']){
        mysqli_query($con, "update users set password = '".$_POST['np']."' where mail = '".$_SESSION['mail']."'");
        echo '<script>alert("password updated successfully");</script>';
        header('location: myAccount.php');
      }
    }
  }
?>
<html>
    <head>
        <title>Mobile Reparing Shop</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
     <div class="designseven">
      <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark navbar fixed-top navbar-dark bg-secondary mynav"> 

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="shop.php">Shop</a>
              </li>
                <li class="nav-item active">
                <a class="nav-link" href="register.php">Register</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="MyAccount.php">My Account</a>
              </li>
                <li class="nav-item active">
                <a class="nav-link" href="contactUs.php">Contact Us</a>
              </li>               
            </ul>
            <form class="form-inline my-2 my-lg-0">
             <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
             <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
              <button class="btn btn-light my-2 my-sm-0" type="click" id="button">Cart Item <img src="Images/cartnew.png" alt="logo" class="logo"></button>
            </form>
          </div>
        </nav>
        
       <div class=py-6>
            <div class="w-100 p-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </div>
        </div>
        
        <div class="text">
            <h2>Password</h2>
        </div>
        
        <div class="block-seven">
          <div class="block-header">
              <h2>Change Your Account Password</h2>
          </div>
          <form action="changePass.php" method="post">
          <div class="px-5">
               <div class="py-3">
                    <div class="form">
                        <label for="exampleInputName">Your Old Password :</label>
                        <input type="password" class="form-control" id="username" aria-describedby="nameHelp" name = "op" placeholder="Old Password">
                        <label for="exampleInputEmail1">Your New Password :</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name = "np" placeholder="New Password">
                        <label for="exampleInputPassword1">Confirm Your New Password :</label>
                        <input type="password" class="form-control" name = "cp" id="exampleInputPassword1" placeholder="New Password">
                    </div>
                </div>
            </div>
                <div class="px-37">
                    <input type="submit" class="btn btn-warning" name="updatePass" value="Update">
                </div>

          </form>
    </div>
        
        
        
        <?php
            include("footer.php");
        ?>
        </div>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>