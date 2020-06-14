<!DOCTYPE html>
<?php
    require "../connection.php";
    if(!isset($_SESSION))
        session_start();
?>
<html>
    <head>
        <title>Mobile Reparing Admin Section</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="adminStyletwo.css"/>
        
    </head>
    <body>
        
        <div class=py-6>
            <div class="w-100 p-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="adminIndex.php">Manage Users</a></li>
                </ol>
                </div>
        </div>
           <div class="col-md-12" style="text-align:center;">
               <table class="table table-bordered table-hover ">
                   <thead>
                <tr>
                    <th style="border: 1px inset black;">Customer Name</th>
                    <th style="border: 1px inset black;">Customer Email</th>
                    <th style="border: 1px inset black;">Customer Pincode</th>
                    <th style="border: 1px inset black;">Customer Mobile</th>
                    <th style="border: 1px inset black;"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $customer = mysqli_query($con, "select * from users");
                    $m = 1;
                    while($cus = mysqli_fetch_array($customer)){
                        echo '<tr>
                        <th style="border: 1px inset black;">'.$cus['name'].'</th>
                        
                        <td style="border: 1px inset black;">'.$cus['mail'].'</td>
                        <td style="border: 1px inset black;">'.$cus['pin'].'</td>
                        <td style="border: 1px inset black;">'.$cus['mobile'].'</td>
                        <td style="border: 1px inset black;"><form action="deluser.php" method="post">
                            <input type="text" value = "'.$cus['mail'].'" name = "dt'.$m.'" hidden>
                            <input type="submit" class="btn btn-success" name = "db'.$m.'" value = "Delete">
                        </form>
                        </td>
                    </tr>';
                    $m++;
                    }
                ?>  
                <!-- <tr>
                    <th style="border: 1px inset black;"></th>
                    
                    <td style="border: 1px inset black;"></td>
                    <td style="border: 1px inset black;"></td>
                    <td style="border: 1px inset black;"></td>
                    <td style="border: 1px inset black;"></td>
                    <td style="border: 1px inset black;"></td>
                    <td style="border: 1px inset black;"><button class="btn btn-success">Delete</button>
                    </td>
                </tr> -->
                
            </tbody>
               </table>
           </div>
            
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        
    </body>
</html>