<!DOCTYPE html>
<?php
  require "connection.php";
  if(!isset($_SESSION))
    session_start();
  if(isset($_SESSION['mail']))
    header('location: myAccount.php');
  if(isset($_POST['register'])){
      $name = $_POST['name'];
			$mail = $_POST['mail'];
			$pass = $_POST['pass'];
			$pin = $_POST['pin'];
			$mobile = $_POST['mobile'];
            $city = $_POST['city'];
			$state = $_POST['state'];
			$address = $_POST['address'];
			
      $query='INSERT INTO users(name, mail, password, pin, mobile,city,state,address) VALUES("'.$name.'","'.$mail.'","'.$pass.'","'.$pin.'","'.$mobile.'","'.$city.'","'.$state.'","'.$address.'")';
      #echo $query;
			if(mysqli_query($con,$query)){
				echo '<script>alert("Registeration successful\nLogin to check.");</script>';
				header("location: login.php");
			}else{
				echo '<script>alert("Something went wrong");</script>';
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
                  <button class="btn btn-light my-2 my-sm-0" type="button" id="button" onclick="window.location.href = 'item.php';">Cart Item <img src="Images/cartnew.png" alt="logo" class="logo"></button>
                </form>
              </div>
            </nav>

           <div class=py-6>
                <div class="w-100 p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
                    </ol>
                </div>
            </div>

            <div class="text">
                <h2>Register</h2>
            </div>

            <div class="block">
              <div class="block-header">
                  <h2>Register New Account</h2>
              </div>
              <form action="register.php" method="post">
                <div class="px-5">
                  <div class="py-3">
                    <div class="form">
                      <label for="exampleInputName">Your Name :</label>
                        <input type="text" class="form-control" name="name" id="username" aria-describedby="nameHelp" placeholder="Enter your name">
                        <label for="exampleInputEmail1">Email address :</label>
                        <input type="email" class="form-control" name="mail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <label for="exampleInputPassword1">Password :</label>
                        <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
                        <label for="city">City :</label>
                        <input type="text" class="form-control" name="city" aria-describedby="nameHelp" placeholder="Enter your city">
                        <label for="exampleInputName">State :</label>
                        <input type="text" class="form-control" name="state" aria-describedby="nameHelp" placeholder="Enter your state">
                        <label for="exampleInputName">Addrress :</label>
                        <input type="text" class="form-control" name="address" aria-describedby="nameHelp" placeholder="Enter your address">
                        <label for="exampleInputName">Pin code :</label>
                        <input type="number" class="form-control" name="pin" aria-describedby="nameHelp" placeholder="Enter your pincode">
                        <label for="exampleInputName">Mobile number :</label>
                        <input type="number" class="form-control" name="mobile" aria-describedby="nameHelp" placeholder="Enter your number">
                        </div>
                      </div>
                    </div>
                    <div class="px-37">
                      <input type="submit" class="btn btn-warning" name="register" value="Submit">
                    </div>
                </form>
                <hr>
                <center>
                    <div>
                      <h4> Already have an account?? </h4><a href="login.php"><button class="btn btn-warning">Login</button></a>
                    </div>
                </center>
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