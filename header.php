<?php
/*
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
*/
?>



<header>

   <div class="header1">
         <div class="socialmedia1">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>

         <div class=loginregister>
            <a href="login.php">login</a> |
            <a href="register.php">register</a> 
         </div>  
   </div>

   <div class="header2">
         <div class="mainlogo_container">
            <a href="index.php"><img src="moreicons/logo.png" alt=""></a>
            <a href="index.php" class="company">BookStore</a>
         </div>

         <nav class="navigation_bar">
            <span class="page"><a href="index.php">HOME</a></span>
            <span class="page"><a href="about.php">ABOUT</a></span>
            <span class="page"><a href="shop.php">SHOP</a></span>
            <span class="page"><a href="contact.php">CONTACT</a></span>
         </nav>

         <div class="navigation_icon_container">
            <div class="navigation_icon">
               <a href="search.php" class="fas fa-search"></a>
            </div>

            <div class="navigation_icon">
               <span class="fas fa-user"></span>
            </div>

            <!--number of items added to cart by the user who has logged in
            <?php
               $select_cart_number = mysqli_query($connection, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            -->

            <div class="navigation_icon">
               <a href="cart.php">
                  <i class="fas fa-shopping-cart"></i>
                  <span>(<?php echo $cart_rows_number; ?>)</span>
               </a>
            </div>

         </div>

         <!--

         <div class="">
            <?php 
               echo $_SESSION['user_name']; 
            ?>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>

-->
   </div>

</header>