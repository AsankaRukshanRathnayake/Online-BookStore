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



<header class="header">

   <div class="header2">
      <div class="header2_container">
         <div class="mainlogo_container">
            <a href="index.php" class="mainlogo">
               BookStore
            </a>
         </div>

         <nav class="navigation_bar">
            <a href="admin.php">DASHBOARD</a>
            <a href="products.php">PRODUCTS</a>
            <a href="orders.php">ORDERS</a>
            <a href="users.php">USERS</a>
            <a href="messages.php">MESSAGES</a>
         </nav>

         <div class="navigation_icon_container">

            <div class="navigation_icon">
               <a href="search_page.php" class="fas fa-search"></a>
            </div>

            <div class="navigation_icon">
               <span class="fas fa-user" id="user-btn"></span>
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
   </div>

</header>