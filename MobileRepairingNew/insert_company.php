<?php 

include("db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Company </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Company
                
            </li>
        </ol>
    </div>
</div> 
<div class="row" style="padding-left:489px;">
    <div class="col-lg-12">
        <div class="panel panel-default">
           <div class="panel-heading">
               <h3 class="panel-title">
                   <i class="fa fa-money fa-fw"></i> Insert Company
               </h3>
           </div> 
           <div class="panel-body">
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                     <div class="form-group">
                          <label class="col-md-3 control-label"> Company Id </label> 
                          <div class="col-md-6">
                              <input name="company_id" type="text" class="form-control" >
                          </div>
                       </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Company Name </label> 
                      <div class="col-md-6">
                          <input name="company_name" type="text" class="form-control">
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Company logo </label> 
                      <div class="col-md-6">
                          <input name="company_logo" type="file" class="form-control">
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-6">
                          <input name="submit" value="Insert Company" type="submit" class="btn btn-primary form-control">
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
    $comp_id=$_POST['company_id'];
    $comp_name=$_POST['company_name'];
    $comp_logo=$_FILES['company_logo']['name'];
    $temp_name1=$_FILES['company_logo']['tmp_name'];
    move_uploaded_file($temp_name1,"Images/".$comp_logo);
    
    $insert_product="insert into companies (company_id,company_name,company_logo) values ('$comp_id','$comp_name','$comp_logo')";
    
    $run_prod=mysqli_query($con,$insert_product);
     if($run_prod){
         echo "<script>alert('Company has been inserted successfully')</script>";
         echo "<script>window.opennnn('insert_company.php','_self')</script>";
     }
}
?>