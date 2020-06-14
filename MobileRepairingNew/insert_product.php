<?php 

include("db.php");

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
                          <label class="col-md-3 control-label"> Problem Id </label> 
                          <div class="col-md-6">
                              <input name="problems_id" type="text" class="form-control" >
                          </div>
                       </div>
                       <div class="form-group">
                          <label class="col-md-3 control-label"> Problem Name </label> 
                          <div class="col-md-6">
                              <input name="problem_name" type="text" class="form-control" >
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
    $prob_id=$_POST['problems_id'];
    $price=$_POST['price'];
    
    $insert_product="insert into problems (problems_id,problem_name,price) values ('$prob_id','$prob_name','$price')";
    
    $run_prod=mysqli_query($con,$insert_product);
     if($run_prod){
         echo "<script>alert('Product has been inserted successfully')</script>";
         echo "<script>window.opennnn('insert_product.php','_self')</script>";
     }
}
?>