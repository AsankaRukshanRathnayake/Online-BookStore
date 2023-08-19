<div class="admin_details_container">
    <img src="../moreicons/admin.png" alt="">

    <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
    <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
    <a href="logout.php" class="delete-btn">logout</a>

</div>

<div class="quick_links_container">
    <div class="admin_link"><a href="products.php">Add Products</a></div>
    <div class="admin_link"><a href="orders.php">View Orders</a></div>
    <div class="admin_link"><a href="messages.php">View Message</a></div>
    <div class="admin_link"><a href="users.php">See User</a></div>
</div>



