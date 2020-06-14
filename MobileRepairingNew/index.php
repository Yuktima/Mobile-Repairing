<!DOCTYPE html>
<html>
    <head>
        <title>Mobile Reparing Shop</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" type="text/css" href="style.css?<?=filemtime('style.css');?>"/>
        
    </head>
    <body style="color:black;">
       <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark navbar fixed-top navbar-dark bg-dark mynav"> 
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
              <a href = "admin/login.php" class = "btn btn-primary"> Admin </a>
              <button class="btn btn-light my-2 my-sm-0" type="button" id="button" onclick="window.location.href = 'item.php';">Cart Item <img src="Images/cartnew.png" alt="logo" class="logo"></button>
            </form>
          </div>
        </nav>
        <div class="pimg1">
            <div class="ptext">
                <span class="border" style="background-color:black;">
                Repair Your Mobile
                </span>
            </div>
        </div>

          <section class="section section-light">
            <h2>Mobile Screen Replacement At Just 30 Minutes</h2>
            <p>
              Smartphone screens are brittle, and it's only a matter of time before you need your screen fixed or mobile screen replacement- our technicians have expertly repaired millions of screens over the years. There's literally not a problem in this site hasn't seen and solved. From iPhone screen replacement to any other mobile repairs that our customers need. Our professionally trained and vetted Technicians are experts and will meet you and provide Onsite Mobile Repair- at your home, office or anywhere whichever is convenient for you.
            </p>
          </section>

          <div class="pimg2">
            <div class="ptext">
              <span class="border trans">
                Why people trust this site?
              </span>
            </div>
          </div>

          <section class="section section-dark">
            <h2>Quality Assured Parts</h2>
            <p>
              This site uses either compatible or 100% Original parts to serve its customers for increasing the performance of your phones. Your smartphones deserve a quality of care and Yaantra understands all your attachment towards your phone. Customer satisfaction is our main priority and we mean it.
            </p>
          </section>

          <div class="pimg3">
            <div class="ptext">
              <span class="border trans">
                Need authentic mobile repair service:go on this site 
              </span>
            </div>
          </div>

          <section class="section section-dark">
            <h2>Certified Technicians</h2>
            <p>
              Don’t you think, apart from visiting mobile repair shops you should go for some worthy service providers where you can get professionally trained and vetted Technicians who are experts in repairing your devices? They will meet you and provide doorstep Mobile Repair- at your home, office or anywhere whichever is convenient for you.
            </p>
          </section>
          <div class="pimg1">
            <div class="ptext">
              
            </div>
          </div>
          
          <?php
            include("footer.php");
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        
    </body>
</html>