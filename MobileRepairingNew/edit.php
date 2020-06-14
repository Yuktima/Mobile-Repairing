<!DOCTYPE html>
<!DOCTYPE html>
<?php
  require "connection.php";
  if(!isset($_SESSION))
    session_start();
  if(!isset($_SESSION['mail']))
    header('location: index.php');
  if(isset($_POST['editSub'])){
    $name = $_POST['name'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];
    $pin = $_POST['pin'];
    $mobile = $_POST['mobile'];

    mysqli_query($con, "update users set name = '".$name."', pin = '".$pin."', mobile = '".$mobile."', city='".$city."',state='".$state."',address='".$address."' where mail = '".$_SESSION['mail']."'");
    $_SESSION['name'] = $name;
    header('location: myAccount.php');
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
     <div class="designsix">
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
                    <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
                </ol>
            </div>
        </div>
        
        <div class="text">
            <h2>Edit Account</h2>
        </div>
        
        <div class="block" style="height:650px;">
          <div class="block-header">
              <h2>Edit Your Account</h2>
          </div>
    <form action="edit.php" method="post">
          <div class="px-5">
               <div class="py-3">
                    <div class="form">
                        <?php  $current = mysqli_fetch_array(mysqli_query($con, "select * from users where mail = '".$_SESSION['mail']."'")); ?>
                        <label for="exampleInputName">Your Name :</label>
                        <input type="text" class="form-control" id="username" aria-describedby="nameHelp" name="name" value="<?php echo $current['name']; ?>">
                        <label for="city">City :</label>
                        <input type="text" class="form-control" id="city" name = "city" aria-describedby="nameHelp" value="">
                        <label for="exampleInputName">State :</label>
                        <input type="text" class="form-control" id="state" name="state" aria-describedby="nameHelp" value="">
                        <label for="exampleInputName">Addrress :</label>
                        <input type="text" class="form-control" id="address" name = "address" aria-describedby="nameHelp" value="">
                        <label for="exampleInputName">Pin code :</label>
                        <input type="number" class="form-control" id="pin" name = "pin" aria-describedby="nameHelp" value="<?php echo $current['pin']; ?>">
                        <label for="exampleInputName">Mobile number :</label>
                        <input type="number" class="form-control" id="mobnum" name = "mobile" aria-describedby="nameHelp" value="<?php echo $current['mobile']; ?>">
                    </div>
                </div>
            </div>
                <div class="px-37">
                    <input type="submit" name = "editSub" value ="Submit" class="btn btn-warning">
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