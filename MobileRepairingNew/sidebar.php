<div class="block-three">
    <div class="block-three-header">
            <h1 class="textual"><?php echo $_SESSION['name'] ?></h1>
        <hr class="new1">
    </div>
    <div class="pannel-body">
        <ul class="stack"><br><br><br><br>
             <li class="<?php if(isset($_GET['myOrder'])){echo "active";}?>">
                  <a href="MyAccount.php?myOrder" class="link">
                   <i class="fa fa-list"></i>
                    My Order
                  </a>
              </li>
              <br>
              <li class="<?php if(isset($_GET['aboutedit'])){echo "active";}?>">
                  <a href="MyAccount.php?aboutedit" class="link">
                   <i class="fa fa-pencil"></i>
                    Edit Account
                  </a>
              </li>
              <br>
              <li class="<?php if(isset($_GET['aboutdelete'])){echo "active";}?>">
                  <a href="MyAccount.php?aboutdelete" class="link">
                   <i class="fa fa-user"></i>
                    Change Password
                  </a>
              </li>
              <br>
              <li class="<?php if(isset($_GET['delete'])){echo "active";}?>">
                  <a href="MyAccount.php?delete" class="link">
                   <i class="fa fa-trash-o"></i>
                    Delete Account
                  </a>
              </li>
              <br>
              <li>
                  <a href="logout.php" class="link">
                   <i class="fa fa-sign-out"></i>
                    Log Out
                  </a>
              </li>
              
          </ul>
    </div>
</div>