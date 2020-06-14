<?php
    $active='cart';
    include("functions.php");
    require "connection.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['mail']))
        header("location: login.php");

    if(!isset($_POST['updateCart']) && isset($_SESSION['problem'])){
        $query = "insert into cart(user, pid, quantity) values('".$_SESSION['mail']."',".$_SESSION['problem'].",1)";
        mysqli_query($con, $query);
    }
    else{
        $query = "select * from cart where user = '".$_SESSION['mail']."' and status = 'false'";
        $res = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($res)){
            if($_POST['qt'.$row['pid']] == 0)
                mysqli_query($con, "delete from cart where user = '".$_SESSION['mail']."' AND pid = ".$row['pid']);
            else if($row['quantity'] != $_POST['qt'.$row['pid']]){
                $q2 = "update cart set quantity = ".$_POST['qt'.$row['pid']]." where user = '".$_SESSION['mail']."' AND pid = ".$row['pid'];
                mysqli_query($con, $q2);
            }
        }
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
    <body style="background-color:goldenrod;">
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
                    <li class="breadcrumb-item"><a href="index.php">Shop</a></li>
                    <!-- <li class="breadcrumb-item"><a href="index.php"><?php #$_SESSION['problem']; ?></a></li> -->
                    <li class="breadcrumb-item active" aria-current="page">Cart Item</li>
                </ol>
            </div>
        </div>
        <div id="cart" class="col-md-9" style="float:right;">
            <div class="box">
                
                       <div class="box-headline">
                        <div class="texttwo">
                            <h2>Cart Items</h2>
                        </div>
                        </div>
                        <?php
                        $query="select * from cart where user='".$_SESSION['mail']."'";
                        $cartDetails=mysqli_query($con,$query);
                        $count=0;
                        while($row = mysqli_fetch_array($cartDetails)){
                            $count = $count + $row['quantity'];
                        }
                        
                        ?>
                    <p class="text-muted">You currently <?php echo $count; ?> item(s) in your cart</p>
                    <div class="table-responsive">
                    <form action="item.php" method="post">
                        <table class="table">
                            <thead>
                               <tr class= "head">
                                   <th colspan="2">Your Problem(s)</th>
                                   <th>Quantity</th>
                                   <th>Unit Price</th>
                                   <th colspan="2">Sub-Total</th>
                               </tr> 
                            </thead>
                            <tbody>
                               <?php
                                // $total=0;
                                // while($row_cart=mysqli_fetch_array($run_cart)){
                                //     $pro_id=$row_cart['pid'];
                                //     $pro_qty=$row_cart['quantity'];
                                //     $get_products="select * from problems where problems_id='$pro_id'";
                                //     $run_problems=mysqli_query($con,$get_products);
                                //     while($row_problems=mysqli_fetch_array($run_problems)){
                                //         $pro_name=$row_problems['problem_name'];
                                //         $only_price=$row_problems['price'];
                                //         $subtotal=$row_problems['price']*$pro_qty;
                                //         $total=+$subtotal;
                                //         $_SESSION['problem_name']= $pro_name;
                                //     }
                                    
                                // }
                                   
                                    $query = "select * from cart where user = '".$_SESSION['mail']."' and status = 'false'";
                                    $cart = mysqli_query($con, $query);
                                    $total = 0;
                                    while($row_cart = mysqli_fetch_array($cart)){
                                        $problem = mysqli_fetch_array(mysqli_query($con, "select * from problems where problems_id = ".$row_cart['pid']));
                                        echo '<tr class="body"> <td> <a href="detail.php">'.$problem['problem_name'].'</a></td><td></td><td><input type="number" name = "qt'.$row_cart['pid'].'" value="'.$row_cart['quantity'].'"></td><td>'.$problem['price'].'</td><td>'.($problem['price']*$row_cart['quantity']).'</td></tr>';
                                        $total = $total + ($problem['price'] * $row_cart['quantity']);
                                    }
                                    $_SESSION['totalCartPrice'] = $total+20;
                                ?>
                            </tbody>
                            <tfoot>
                                   <tr>    
                                       <th colspan="5">Total</th>
                                       <th colspan="2">Rs.<?php echo $total;?>/-</th>
                                   </tr> 
                                   <tr>
                                        <td colspan="5"></td><td><div class="pull-right">
                                                     <div class="btn btn-success"><i class="fa fa-refresh"></i><input type="submit" name = "updateCart" class="btn btn-success" value="Update Cart"></div>
                                                    <!-- <i class="fa fa-refresh"></i> Update Cart</a> --></div></td>
                                    </tr>
                            </tfoot>
                        </table>
                        </form>
                    </div>
                    <div class="box-footer">
                           
                           <div class="pull-left">
                               
                               <a href="shop.php" class="btn btn-success"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-chevron-left"></i> Continue Shopping
                                   
                               </a>
                               
                           </div>
                           
                           <div class="pull-right">
                              <!-- <a href="#" class="btn btn-success">
                                  <i class="fa fa-refresh"></i> Update Cart</a> -->
                               <a href="order.php" class="btn btn-primary">
                                   
                                   Place Order <i class="fa fa-chevron-right"></i>
                                   
                               </a>
                               
                           </div>
                           
                       </div> 
            </div>
        </div>
            <div class="col-md-3">
               
               <div id="order-summary" class="box">
                   
                   <div class="box-header">
                       
                       <h3>Order Summary</h3>
                       
                   </div>
                   
                   <p class="text-muted">
                       
                       Shipping and additional costs are calculated based on value you have entered
                       
                   </p>
                   
                   <div class="table-responsive">
                       
                       <table class="table">
                           
                           <tbody>
                               
                               <tr>
                                   
                                   <td> Order Sub-Total </td>
                                   <th> <?php echo $total;?> </th>
                                   
                               </tr>
                               
                               <tr>
                                   
                                   <td> Shipping and Handling </td>
                                   <td> Rs.20/- </td>
                                   
                               </tr>
                               
                               <tr>
                                   
                                   <td> Tax </td>
                                   <th> Rs.0/- </th>
                                   
                               </tr>
                               
                               <tr class="total">
                                   
                                   <td> Total </td>
                                   <th> <?php echo'RS.'.($total+20).'/-'?> </th>
                                   
                               </tr>
                               
                           </tbody>
                           
                       </table>
                       
                   </div>
                   
               </div>
               
           </div>
        <!-- <?php
            #include("footer.php");
        ?> -->
        </div>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type = "text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
      
          
    
    </body>
</html>