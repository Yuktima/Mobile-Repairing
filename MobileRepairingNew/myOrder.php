<?php
    require "connection.php";
    if(!isset($_SESSION))
        session_start();
    $res = mysqli_query($con, "select * from orders where user = '".$_SESSION['mail']."'");
?>
<div class="block-four-header">
    <center>
        <h2>My Orders</h2>
        <p class="lead">Your order on one place</p>
    </center>
    <hr style="width:160%;border-color:inherit;">
</div>
   <div class="newtable">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="border: 1px inset black;">SN:</th>
                    <th style="border: 1px inset black;">Total Amount:</th>
                    <th style="border: 1px inset black;">Order No:</th>
                    <th style="border: 1px inset black;">Order Date:</th>
                    <th style="border: 1px inset black;">Picking Date:</th>
                    <th style="border: 1px inset black;">Status:</th>
                    <th style="border: 1px inset black;">View Order:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    $date = '---';
                    $color = '#f8de7e';
                    while($row = mysqli_fetch_array($res)){
                        $color = '#f8de7e';
                        if($row['status'] != 'Confirmed'){ 
                            $date = '---';
                            if($row['status'] == 'Rejected'){
                                $color = 'Red';
                            }
                            if($row['status'] == 'paid'){
                                $date = $row['pDate'];
                                $color = "#32cd32";
                            }
                        }
                        else{
                            $date = $row['pDate'];
                            $color = '#90ee90';
                        }
                        echo '<tr style="background-color: '.$color.';">
                            <th style="border: 1px inset black;">'.$i.'</th>
                            <td style="border: 1px inset black;">'.$row['price'].'</td>
                            <td style="border: 1px inset black;">'.$row['ono'].'</td>
                            <td style="border: 1px inset black;">'.$row['oDate'].'</td>
                            <td style="border: 1px inset black;">'.$date.'</td>
                            <td style="border: 1px inset black;">'.$row['status'].'</td>
                            <td style="border: 1px inset black;">
                                <form action="viewOrd.php" method="post">
                                    <input type="text" value="'.$row['status'].'" name="st'.$row['ono'].'" hidden>
                                    <input type="submit" class="btn btn-primary btn-sm" name="or'.$row['ono'].'" value="View Order">
                                </form>
                            </td>
                        </tr>';
                        $i = $i+1;
                    }

                ?>
                <!-- <tr>
                    <th style="border: 1px inset black;">#1</th>
                    
                    <td style="border: 1px inset black;">Rs.80/-</td>
                    <td style="border: 1px inset black;">363986</td>
                    <td style="border: 1px inset black;">2</td>
                    <td style="border: 1px inset black;">10-01-2018</td>
                    <td style="border: 1px inset black;">Unpaid</td>
                    <td style="border: 1px inset black;">
                        <a href="confirm.php" target="_blank" class="btn btn-primary btn-sm">Confirm Paid</a>
                    </td>
                </tr>
                <tr>
                    <th style="border: 1px inset black;">#1</th>
                    
                    <td style="border: 1px inset black;">Rs.80/-</td>
                    <td style="border: 1px inset black;">363986</td>
                    <td style="border: 1px inset black;">2</td>
                    <td style="border: 1px inset black;">10-01-2018</td>
                    <td style="border: 1px inset black;">Unpaid</td>
                    <td style="border: 1px inset black;">
                        <a href="confirm.php" target="_blank" class="btn btn-primary btn-sm">Confirm Paid</a>
                    </td>
                </tr>
                <tr>
                    <th style="border: 1px inset black;">#1</th>
                    
                    <td style="border: 1px inset black;">Rs.80/-</td>
                    <td style="border: 1px inset black;">363986</td>
                    <td style="border: 1px inset black;">2</td>
                    <td style="border: 1px inset black;">10-01-2018</td>
                    <td style="border: 1px inset black;">Unpaid</td>
                    <td style="border: 1px inset black;">
                        <a href="confirm.php" target="_blank" class="btn btn-primary btn-sm">Confirm Paid</a>
                    </td>
                </tr> -->
            </tbody>
        </table>
        </div>
    </div>

