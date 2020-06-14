<!DOCTYPE html>
<?php
  require "../connection.php";
  session_start();
  if(isset($_SESSION['mail']))
    session_destroy();


  $max = mysqli_fetch_array(mysqli_query($con, "select max(ono) as mo from orders"));
  for($i = 1; $i <= $max['mo']; $i++){
    if(isset($_POST['ac'.$i])){
      $ip_date = $_POST['pd'.$i];
      $date = date('Y-m-d H:i:s', strtotime($ip_date));
      mysqli_query($con, "update orders set status = 'Confirmed' where ono = '".$i."'");
      mysqli_query($con, "update orders set pDate = '".$date."' where ono = '".$i."'");
      break;
    }
    if(isset($_POST['dc'.$i])){
      mysqli_query($con, "update orders set status = 'Rejected' where ono = '".$i."'");
      break;
    }
  }

  $m = mysqli_fetch_array(mysqli_query($con, "select max(pid) as mp from newprob"));
  for($i = 1; $i <= $m['mp']; $i++){
    if(isset($_POST['npAc'.$i])){
      $comp = mysqli_fetch_array(mysqli_query($con, "select company from newprob where pid = ".$i));
      mysqli_query($con, "delete from newprob where pid=".$i);
      mysqli_query($con, "insert into problems(problem_name, price) values('".$_POST['np'.$i]."','".$_POST['pc'.$i]."')");
      $pid = mysqli_fetch_array(mysqli_query($con, "select max(problems_id) as pid from problems"));
      mysqli_query($con, "insert into PC(pid, company) values ('".$pid['pid']."','".$comp['company']."')");

    }
    if(isset($_POST['npDc'.$i])){
      mysqli_query($con, "delete from newprob where pid=".$i);
    }
  }

  
?>
<html>
    <head>
        <title>Mobile Reparing Admin Section</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="adminStyle.css"/>
        
    </head>
    <body onload=showModal() onfocus=goBack()>
       
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
            <div class=py-6>
                <div class="w-100 p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="adminIndex.php">Admin Home</a></li>
                    </ol>
                </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                 <!-- <div class="py-3"><h2 class="text">About Orders</h2></div> -->
                  
                  <!-- <?php
                    $query = "select * from orders where status = 'Waiting'";
                    $res = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($res)){
                      echo '<form action = "adminIndex.php" method="post">
                      <div class="px-4">
                      <a class="link" name = "ord'.$row['ono'].'" onclick=setModal(this)><h4>Order No: '.$row['ono'].'</h4></a>
                      
                    <input type ="date" name="pd'.$row['ono'].'" placeholder="enter picking date">
                    <input type="submit" class="btn btn-success mb-2" name = "ac'.$row['ono'].'" value="Accept">
                
                    <input type="submit" class="btn btn-danger mb-2" name = "dc'.$row['ono'].'" value="Decline"></div><br>
                    </form>
                      ';
                    }

                  ?> -->
                    <!-- <div class="form-group mb-2">
                        <a class="link" href="#myModal" data-toggle="modal"><h4>Order Link</h4></a>
                        
                      </div>
                      <div class="px-4">
                      <button type="submit" class="btn btn-success mb-2">Accept</button>
                      </div>
                  
                      <button type="submit" class="btn btn-danger mb-2">Decline</button> -->

                    <!-- <hr>
                </div>
                <div class="vertical"></div>
                <div class="col-md-8">
                  <div class="py-3"><h2 class="texttwo">About Other Problems</h2></div>
                  <?php
                    $query = "select * from newprob";
                    $res = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($res)){
                      echo '<form action="adminIndex.php" method="post">
                      <div class="form-group mx-sm-3 mb-2">
                      <input type="text" class="form-control" name="np'.$row['pid'].'" value="'.$row['name'].'">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                      <input type="text" class="form-control" name="pc'.$row['pid'].'" placeholder="Enter Price">
                    </div>
                    <div class="px-4">
                    <Input type="submit" class="btn btn-success mb-2" name="npAc'.$row['pid'].'" value="Accept">
                    <Input type="submit" class="btn btn-danger mb-2" name="npDc'.$row['pid'].'" value="Decline"></div></form>';
                    }

                  ?> -->

                      <!-- <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Problem">
                      </div>
                      <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control" id="inputPassword2" placeholder="Enter Price">
                      </div>
                      <div class="px-4">
                      <button type="submit" class="btn btn-success mb-2">Accept</button>
                      </div>
                      <button type="submit" class="btn btn-danger mb-2">Decline</button> -->
                   
                    <!-- <hr>
                </div>
                <div class="col-md-12">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                      <input type="button" value="Manage Problem" class="btn btn-info form-control" onClick="location.href='insert_product.php'">
                      <div class="py-3">
                          <input type="button" value="Manage Users" class="btn btn-info form-control" onClick="location.href='manage_users.php'">
                      </div>
                    </form>  
                </div>
              </div>
            </div> -->

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
                                    $un = mysqli_fetch_array(mysqli_query($con, "select user from orders where ono = ".$_SESSION['modalVal']));
                                    echo '<h6> user: '.$un['user'].'<br><hr>';
                                ?>
                                <table cellspacing="5" width="100%" cellpadding="5">
                                  <tr>
                                    <th> SN </th>
                                    <th> Problem </th>
                                    <th> Quantity </th>
                                    <th> Charge </th>
                                  </tr>
                                  <?php
                                    $qr1 = "select * from cart where ono = '".$_SESSION['modalVal']."'";
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
                                  ?>
                                </table>
                                </div>
                                <div class="modal-footer">
                                <a href="functions.php"><button type="button" class="btn btn-primary">OK</button></a>
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
            window.location.href("adminIndex.php");
          }
          
        </script>
        
    </body>
</html>