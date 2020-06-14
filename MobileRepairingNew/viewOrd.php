<?php
    session_start();
    require "connection.php";
    $mo = mysqli_fetch_array(mysqli_query($con, "select max(ono) as mo from orders"));
?>
<html>
    <head>
        <title>Order Details</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="adminStyle.css"/>
        
    </head>
    <body onload=showModal()>
       
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <h3 class="navbar-brand">Admin Section</h3>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
                <form class="form-inline">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
                </form>
        </nav>
        <div class="modal" tabindex="-1" role="dialog" id="myModal" ontoggle = goBack()>
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Order Details:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body" id = "modDet">
                                <?php 
                                    
                                    echo '<h6> user: '.$_SESSION['name'].'<br><hr>';
                                ?>
                                <table cellspacing="5" width="100%" cellpadding="5">
                                  <tr>
                                    <th> SN </th>
                                    <th> Problem </th>
                                    <th> Quantity </th>
                                    <th> Charge </th>
                                  </tr>
                                  <?php
                                    $status = "Waiting";
                                    $orno = 0;
                                    for($i = 1; $i <= $mo['mo']; $i++){
                                        if(isset($_POST['or'.$i])){
                                          $status = $_POST['st'.$i];
                                          $orno = $i;

                                          if($status == "paid"){
                                            $invoice = mysqli_fetch_array(mysqli_query($con, "select * from payments where ono = ".$i));
                                            echo '<div><hr> <b>Invoice number: '.$invoice['invoice'].' |  Total amount paid: '.$invoice['amount'].'<b><hr> </div>';
                                          }
                                    $qr1 = "select * from cart where ono = '".$i."'";
                                    $res1 = mysqli_query($con, $qr1);
                                    $j = 1;
                                    while($row1 = mysqli_fetch_array($res1)){
                                      $problem = mysqli_fetch_array(mysqli_query($con, "select * from problems where problems_id = ".$row1['pid']));
                                      echo '<tr>
                                        <td> '.$j.' </td>
                                        <td> '.$problem['problem_name'].' </td>
                                        <td> '.$row1['quantity'].' </td>
                                        <td> '.($row1['quantity'] * $problem['price']).'/- </td>
                                      </tr>';
                                      $j++;
                                    }
                                }
                            }
                                  ?>
                                </table>
                                </div>
                                <div class="modal-footer">
                                <?php
                                    if($status == 'Confirmed'){
                                      echo '<form action="confirm.php" method="post">
                                        <input type="text" name="order" value="'.$orno.'" hidden>
                                        <input type="submit" class="btn btn-primary" name="pay" value="Proceed to checkout">
                                        </form>';
                                    }
                                    if($status == 'paid'){
                                      echo '<div class = "btn btn-success" onclick=window.print()>Print Invoice</div>';
                                    }
                                ?>
                                <a href="myAccount.php?myOrder"><button type="button" class="btn btn-primary">OK</button></a>
                              </div>
                            </div>
                          </div>
                        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <script>
          function showModal(){
            $("#myModal").modal("show");
          }
          function goBack(){
            window.location.href("myAccount.php?myOrder");
          }
          
        </script>
        
    </body>
</html>