<!DOCTYPE html>
<html>
    <head>
        <title>Mobile Reparing Shop</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
     <div class="designthree">
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
              <button class="btn btn-light my-2 my-sm-0" type="button" id="button" onclick="window.location.href = 'item.php';">Cart Item <img src="Images/cartnew.png" alt="logo" class="logo"></button>
            </form>
          </div>
        </nav>
        
       <div class=py-6>
            <div class="w-100 p-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </div>
        </div>
        
        <div class="text">
            <h2>Contact Us</h2>
        </div>
        <div class="col-md-12">
        <div class="block-two">
            <div class="block-two-header">
              <h2>Feel Free to Contact Us</h2>
                <p class="text-mute">
                    If you have any question,fell free to contact us.Our Customer Service work 24/7.
                </p>
            </div>
            <div class="w-50 p-3">
              <form action="contactUs.php" method="post" class="styling" style="font-family: 'Lobster', cursive;">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                    </div>
                        <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="name">
                </div>

                <div class="input-group mb-3">
                    <input type="email" class="form-control" aria-label="email" aria-describedby="basic-addon2" name="email">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">@example.com</span>
                        </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Subject</span>
                    </div>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="subject">
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Message</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="message"></textarea>
                </div>
                    <div class="px-15">
                        <div class="py-4">
                            <input name="submit" value="Send Message" type="submit" class="btn btn-warning">
                        </div>
                    </div>
              </form>
              <?php 
                       
                       if(isset($_POST['submit'])){
                           
                           /// Admin receives message with this ///
                           
                           $sender_name = $_POST['name'];
                           
                           $sender_email = $_POST['email'];
                           
                           $sender_subject = $_POST['subject'];
                           
                           $sender_message = $_POST['message'];
                           
                           $receiver_email = "yuktima05@gmail.com";
                           
                           mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);
                           
                           /// Auto reply to sender with this ///
                           
                           $email = $_POST['email'];
                           
                           $subject = "Welcome to my website";
                           
                           $msg = "Thanks for sending us message. ASAP we will reply your message";
                           
                           $from = "yuktima05@gmail.com";
                           
                           mail($email,$subject,$msg,$from);
                           
                           echo "<script>alert('Your message send successfully')</script>";
                           
                       }
                       
                       ?>
        </div>
            <div class = "vertical"></div>
            <div class="block-right-header">

                <h2>Contact Details</h2>
                    <p class="text-mute">
                       
                        Our information to contact whenever you want

                    </p>
                    <div class= "tabling">
                        <table class="table">

                               <tbody>

                                   <tr>

                                       <td><i class="fa fa-location-arrow" style="font-size:24px"></i></td>
                                       <th>Address: 455 Martinson, Los Angeles</th>

                                   </tr>
                                   <tr>
                                       <td><i class="fa fa-envelope-open" style="font-size:24px"></i> </td>
                                       <td>Email: business@gmail.com</td>

                                   </tr>
                                   <tr>

                                       <td><i class="fa fa-phone" style="font-size:24px"></i></td>
                                       <th>Phone: 123-456-7890</th>

                                   </tr>

                                   <tr>

                                       <td><i class='fa fa-building' style='font-size:24px'></i></td>
                                       <th>Working Hours: Monday-Friday, 8am-6pm </th>

                                   </tr>
                               </tbody>

                           </table>
                       </div>
            </div>
          </div>
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