<?php 
require "../connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Products
                
            </li>
        </ol>
    </div>
</div> 
<div class="row" style="padding-left:489px;">
    <div class="col-lg-12">
        <div class="panel panel-default">
           <div class="panel-heading">
               <h3 class="panel-title">
                   <i class="fa fa-money fa-fw"></i> Insert Problem 
               </h3>
           </div> 
           <div class="panel-body">
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                
                       <div class="form-group">
                          <label class="col-md-3 control-label"> Problem Name </label> 
                          <div class="col-md-6">
                              <input name="problem_name" type="text" class="form-control" >
                          </div>
                   </div>

                   <div class="form-group">
                          <label class="col-md-3 control-label"> Company Name </label> 
                          <div class="col-md-6">
                          <select name="company" class="form-control">
						    <option value="All">All</option>
						    <option value="Apple">Apple</option>
						    <option value="Samsung">Samsung</option>
						    <option value="OnePlus">Oneplus</option>

                            <option value="Vivo">Vivo</option>
						    <option value="Oppo">Oppo</option>
						    <option value="Xiaomi">Xiaomi</option>
						    <option value="RealMe">RealMe</option>

                            <option value="Iqoo">Iqoo</option>
						    <option value="Honor">Honor</option>
						    <option value="Motorola">Motorola</option>
						    <option value="Poco">Poco</option>

                            <option value="LG">LG</option>
						    <option value="Asus">Asus</option>
						    <option value="Sony">Sony</option>
						    <option value="Acer">Acer</option>

                            <option value="Lenove">Lenove</option>
						    <option value="Panasonic">Panasonic</option>
						    <option value="Huawei">Huawei</option>
					      </select>
                        </div>
                   </div>

                   <div class="form-group">
                      <label class="col-md-3 control-label"> Price </label> 
                      <div class="col-md-6">
                          <input name="price" type="text" class="form-control" required>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-6">
                          <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">
                      </div>
                   </div>
               </form>
           </div>
        </div>
    </div>
</div>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $prob_name=$_POST['problem_name'];
    $price=$_POST['price'];
    $com = $_POST['company'];
    
    $insert_product="insert into problems (problem_name,price) values ('$prob_name','$price')";
    
    $run_prod=mysqli_query($con,$insert_product);
     if($run_prod){
         $pid = mysqli_fetch_array(mysqli_query($con, "select max(problems_id) as pid from problems"));
         $setCom = "insert into PC(pid, company) values ('".$pid['pid']."', '".$com."')";
         mysqli_query($con, $setCom);
         echo "<script>alert('Product has been inserted successfully')</script>";
         echo "<script>window.opennnn('insert_product.php','_self')</script>";
     }
}
?>