<?php
    include 'connection.php';

    session_start();
    $user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link type="text/css" rel="stylesheet" href="css/styles.css">
   <link type="text/css" rel="stylesheet" href="css/header.css">
   <link type="text/css" rel="stylesheet" href="css/footer.css">
   <link type="text/css" rel="stylesheet" href="css/cart.css">

</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>

    <!--main body-->
    <div class="heading">
        <h3>shopping cart</h3>
    </div>

    <div class="cart">

        <div class="cart_products_container">
            <h1 class="title">products added</h1>

            <div class="cart_container">
                <?php
                    $grand_total = 0;
                
                    $select_cart = mysqli_query($connection, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');

                    if(mysqli_num_rows($select_cart) > 0){
                        while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
                ?>
            
                <div class="cart_product">
                    <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
                
                    <img src="original/uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="" class="cart_product_image">
                
                    <div class="product_name"><?php echo $fetch_cart['name']; ?></div>
                
                    <div class="product_price">$<?php echo $fetch_cart['price']; ?>/-</div>
                
                    <form action="" method="post">
                        <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                        <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                        <input type="submit" name="update_cart" value="update" class="option-btn">
                    </form>
                
                    <div class="rowtotal"> 
                        sub total : <span>$<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-</span> </div>
                    </div>
      
                    <?php
                                $grand_total += $sub_total;
                            }
                        }else{
                            echo '<p class="empty">your cart is empty</p>';
                        }
                    ?>
                </div>

                <div style="margin-top: 2rem; text-align:center;">
                    <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all</a>
                </div>

            </div>

            <div class="cart_total_container">
            <div class="grandtotal">
                <p>grand total : <span>$<?php echo $grand_total; ?>/-</span></p>
                <div class="flex">
                        <a href="shop.php" class="continuebutton">continue shopping</a>
                        <a href="checkout.php" class="checkout <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
                </div>
            </div>
        </div>

        </div>

        

    </div>

    <!--footer-->
    <?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>