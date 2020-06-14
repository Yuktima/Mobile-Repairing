<?php
    include("functions.php");
    require "connection.php";
    if(!isset($_SESSION)){
			session_start();
    }
    if(isset($_POST['saveProb'])){
      $query = "insert into newprob(name, company) values('".$_POST['prob']."', '".$_SESSION['company']."')";
      echo '<script>alert("Your problem is submitted for admin consideration! It will displayed in problem list after admin confirmation.");</script>';
      mysqli_query($con, $query);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mobile Reparing Shop</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
     <div class="designtwo">
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
                    <li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $_SESSION['company']; ?></li>
                </ol>
            </div>
        </div>
        
        <div class="textone">
            <h2>Problems In Mobile</h2>
        </div>
        <div class=px-3>
            <div class=py-4>
                <div class="list-group">
                 <?php
                  getPro();
                    ?>
                  <a href="#myModal" data-toggle="modal" class="list-group-item list-group-item-action">Other Problem</a>
                  
                  <div class="modal" tabindex="-1" role="dialog" id="myModal">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Other Problems</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="detail.php" method="post">
                          <div class="modal-body">
                            <input type="text" class="form-control" name="prob" aria-describedby="emailHelp" placeholder="Enter your problem">
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" name="saveProb" class="btn btn-primary" value="Save">
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        
        <?php
            include("footer.php");
        ?>
        </div>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
          function setProblemSession(val){
            jQuery.ajax({
              type: "POST",
              url: 'functions.php',
              dataType: 'json',
              data: {functionname: 'setSessionProblem', arguments: val.id},

              success: function () {
                alert("abc");
                window.location.replace('item.php');
              }
            });
          }
          
        </script>
     
    </body>
</html>