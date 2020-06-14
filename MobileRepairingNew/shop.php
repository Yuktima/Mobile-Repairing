<!DOCTYPE html>
<?php
  if(!isset($_SESSION))
    session_start();
  if(!isset($_SESSION['mail'])){
    echo '<script>alert("You have to login first!");</script>';
    header('location: login.php');
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
       <nav class="navbar navbar-expand-lg navbar navbar navbar-dark bg-dark navbar fixed-top navbar-dark bg-secondary mynav"> 

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
                    <li class="breadcrumb-item active" aria-current="page"><a href="shop.php">Shop</a></li>
                </ol>
            </div>
        </div>
        
        <div class="text" style="padding-bottom: 5px;">
            <h2>Shop</h2>
        </div>
        <div id="container-fluid one" class="px-5">
            <div class="card-deck">
              <div class="card">
                    <img src="Images/apple.png" class="card-img-top" alt="logo">
                    <div class="card-footer">
                        <a href="detail.php" name="Apple" onclick=setCompanySession(this)><h4>Apple</h4></a> 
                    </div>
              </div>
              <div class="card">
                <img src="Images/samsung.jpg" class="card-img-top" alt="image">
                <div class="card-footer">
                  <a href="detail.php" name="Samsung" onclick=setCompanySession(this)><h4>Samsung</h4></a>
                </div>
              </div>
              <div class="card">
                <img src="Images/oneplus.png" class="card-img-top" alt="image">
                <div class="card-footer">
                  <a href="detail.php" name="OnePlus" onclick=setCompanySession(this)><h4>OnePlus</h4></a>
                </div>
              </div>
            </div>
        </div>
        <div id="top" class="py-5">
            <div id="container-fluid two" class="px-5" >
                <div class="card-deck">
                  <div class="card">
                    <img src="Images/vivos.png" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Vivo" onclick=setCompanySession(this)><h4>Vivo</h4></a>
                    </div>
                  </div>
                  <div class="card">
                    <img src="Images/oppo.jpg" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Oppo" onclick=setCompanySession(this)><h4>Oppo</h4></a>
                    </div>
                  </div>
                  <div class="card">
                    <img src="Images/xiaomi.png" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Xiaomi" onclick=setCompanySession(this)><h4>Xiaomi</h4></a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div id="thirdtop">
            <div id="container-fluid two" class="px-5" >
                <div class="card-deck">
                  <div class="card">
                    <img src="Images/realme.png" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="RealMe" onclick=setCompanySession(this)><h4>RealMe</h4></a>
                    </div>
                  </div>
                  <div class="card">
                    <img src="Images/iqoo.jpg" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Iqoo" onclick=setCompanySession(this)><h4>Iqoo</h4></a>
                    </div>
                  </div>
                  <div class="card">
                    <img src="Images/honor.png" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Honor" onclick=setCompanySession(this)><h4>Honor</h4></a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div id="fourthtop" class="py-5">
            <div id="container-fluid two" class="px-5" >
                <div class="card-deck">
                  <div class="card">
                    <img src="Images/moto.png" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Motorola" onclick=setCompanySession(this)><h4>Motorola</h4></a>
                    </div>
                  </div>
                  <div class="card">
                    <img src="Images/poco.png" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Poco" onclick=setCompanySession(this)><h4>Poco</h4></a>
                    </div>
                  </div>
                  <div class="card">
                    <img src="Images/lg.png" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="LG" onclick=setCompanySession(this)><h4>LG</h4></a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div id="fifthtop" class="py-5">
            <div id="container-fluid two" class="px-5" >
                <div class="card-deck">
                  <div class="card">
                    <img src="Images/asus.png" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Asus" onclick=setCompanySession(this)><h4>Asus</h4></a>
                    </div>
                  </div>
                  <div class="card">
                    <img src="Images/sony.png" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Sony" onclick=setCompanySession(this)><h4>Sony</h4></a>
                    </div>
                  </div>
                  <div class="card">
                    <img src="Images/acer.png" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Acer" onclick=setCompanySession(this)><h4>Acer</h4></a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div id="sixtop" class="py-5">
            <div id="container-fluid two" class="px-5" >
                <div class="card-deck">
                  <div class="card">
                    <img src="Images/lenvo.png" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Lenovo" onclick=setCompanySession(this)><h4>Lenovo</h4></a>
                    </div>
                  </div>
                  <div class="card">
                    <img src="Images/panasonic.png" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Panasonic" onclick=setCompanySession(this)><h4>Panasonic</h4></a>
                    </div>
                  </div>
                  <div class="card">
                    <img src="Images/huawei.jpg" class="card-img-top" alt="image">
                    <div class="card-footer">
                      <a href="detail.php" name="Huawei" onclick=setCompanySession(this)><h4>Huawei</h4></a>
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
          function setCompanySession(val){
            jQuery.ajax({
              type: "POST",
              url: 'functions.php',
              dataType: 'json',
              data: {functionname: 'setSessionCompany', arguments: val.name},

              success: function () {
                alert("abc");
                window.location.replace('detail.php');
              }
            });
          }
        </script>
        
    </body>
</html>