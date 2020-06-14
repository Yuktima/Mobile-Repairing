<!DOCTYPE html>
<?php
  if(!isset($_SESSION))
    session_start();
  if(!isset($_SESSION['mail']))
    header('location: login.php');
?>
<html>
    <head>
        <title>Mobile Reparing Shop</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
     <div class="designfour">
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
             <div style="color:white;"><h5><i class="fa fa-user"></i> Hey, <?php echo $_SESSION['name']?></h5></div>
              <button class="btn btn-light my-2 my-sm-0" type="button" id="button" onclick="window.location.href = 'item.php';">Cart Item <img src="Images/cartnew.png" alt="logo" class="logo"></button>
            </form>
          </div>
        </nav>
        
       <div class=py-6>
            <div class="w-100 p-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </div>
        </div>
        
        <div class="text">
            <h2>My Account</h2>
        </div>
        
        <?php
            include("sidebar.php");
         ?>
         <div class="block-four">
             <?php
                if(isset($_GET['myOrder'])){
                    include("myOrder.php");
                }
             ?>
             <?php
                if(isset($_GET['payOffline'])){
                    include("payOffline.php");
                }
             ?>
              <?php
                if(isset($_GET['aboutedit'])){
                    include("aboutedit.php");
                }
              ?>
              <?php
                if(isset($_GET['aboutdelete'])){
                    include("aboutdelete.php");
                }
              ?>  
              <?php
                if(isset($_GET['delete'])){
                    include("delete.php");
                }
              ?>  
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