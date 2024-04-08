<?php
   session_start();
   include_once "./config/dbconnect.php";

?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background: #fff; box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.1); top: 0; left: 0; right: 0;">
    
    <a class="navbar-brand ml-5" href="./adminpanel.php"> <img src="./images/LOGOrbg.png" width="80" height="80" alt="Swiss Collection" style="margin-right: 50px;">
    <a href=" " class="logo" style="color:#000000; font-size: 1.5rem; font-weight: bolder;"><i class="fas-fa-untensils" style="color:#a9130c;"></i>GASAA Pharmacy Admin Panel</a>  
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#000000;" aria-hidden="true"></i>
         </a>
          <?php
        } else {
            ?>
            <a href="" style="text-decoration:none;">
                    <i class="fa fa-arrow-left mr-5" style="font-size:30px; color:#000000;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>
