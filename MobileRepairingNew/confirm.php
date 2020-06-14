<!DOCTYPE html>
<?php
  require "connection.php";
  if(!isset($_SESSION))
    session_start();
  if(!isset($_SESSION['mail']))
    header('location: index.php');
  if(!isset($_POST['pay']) && !isset($_POST['confirm']))
    header('location: myAccount.php?myOrder');

  if(isset($_POST['confirm'])){
    mysqli_query($con, "insert into payments(ono, invoice, amount, mode, transactionID, date) values('".$_POST['ono']."', '".$_POST['invoice']."', '".$_POST['amount']."', '".$_POST['mode']."', '".$_POST['ref_no']."', '".date('Y-m-d H:i:s', strtotime($_POST['date']))."')");
    mysqli_query($con, "update orders set status = 'paid' where ono = '".$_POST['ono']."'");
    header('location: myAccount.php?myOrder');
  }

  $order = mysqli_fetch_array(mysqli_query($con, "select * from orders where ono = '".$_POST['order']."'"));

  function getinvoice($on){
    return '#'.date('m').date('d').$on;
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
     <div class="designfive">
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
                    <li class="breadcrumb-item active" aria-current="page">Payment</li>
                </ol>
            </div>
        </div>
        
        <div class="text">
            <h2>Payment</h2>
        </div>
        
         <div class="block-five">
            <div class="block-four-header">
             <h3 style="padding-left:450px;">Please confirm your payment</h3>
             <hr style="width:141%;border-color:inherit;">
            </div>
                 <form action="confirm.php" method="post" enctype="multipart/form-data">
                        <div class="form">
                           <div class="form-group">  
                             <label class="invoice">Invoice:</label>
                             <input type="text" value="<?php echo $order['ono']; ?>" name="ono" hidden>
                              <input type="text" class="form-control" name="invoice" value="<?php echo getinvoice($order['ono']); ?>" readonly>
                           </div>

                           <div class="form-group">
                             <label>Amount Sent:</label>
                              <input type="text" class="form-control" name="amount" value = "<?php echo ($order['price']+20); ?>" readonly> 
                           </div>

                           <div class="form-group"> 
                             <label> Select Payment Mode: </label>
                              <select name="mode" class="form-control" required>
                                  <option>------ </option> 
                                  <option> Credit/Debit Card </option>
                                  <option> Netbanking </option>
                                  <option> Paytm Wallet </option>
                                  <option> UPI </option>
                                  <option> G-Pay </option>

                              </select>
                           </div>

                           <div class="form-group">
                             <label> Transaction / Reference ID: </label>
                              <input type="text" class="form-control" name="ref_no" required>
                           </div>

                           <div class="form-group">
                             <label> Payment Date: </label>
                              <input type="date" class="form-control" name="date" required>
                           </div>
                        </div>
                           <div class="text-center">
                               <input type="submit" value="Confirm Payment" name="confirm" class="btn btn-primary btn-lg">
                                  
                              
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