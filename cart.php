<?php
    include 'connection.php';

    session_start();
    $user_id = $_SESSION['user_id'];

    /*When the user is not logged in, redirects to login page*/ 
    if(!isset($user_id)){
        header('location:login.php');
    }

    if(isset($_POST['update_cart'])){
        $cart_id = $_POST['cart_id'];
        $cart_quantity = $_POST['cart_quantity'];
        mysqli_query($connection, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
        $message[] = 'cart quantity updated!';
    }
     
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($connection, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
        header('location:cart.php');
    }

    if(isset($_GET['delete_all'])){
        mysqli_query($connection, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        header('location:cart.php');
     }
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
    <div class="cart">

        <div class="cart_products_container">
            <h2 class="title">My Cart</h2>
            
                <?php

                $grand_total = 0;
                
                $select_cart = mysqli_query($connection, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');

                if(mysqli_num_rows($select_cart) > 0){
                    ?>
                    <table border="1">
                <tr>
                    <th>Book</th>
                    <th>Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>SubTotal</th>
                    <th></th>
                </tr>
                <?php
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
                ?>

                <tr>
                    <td><img class="product_image" src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt=""></td>
                    <td><div class="product_name"><?php echo $fetch_cart['name']; ?></div></td>
                    <td><div class="product_price">Rs.<?php echo $fetch_cart['price']; ?>/-</div></td>

                    <form action="" method="post">
                        <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                    <td><input type="number" min="1" max="99" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                    <input type="submit" name="update_cart" value="Update" class="update"></td>
                    </form>

                    <td>
                        <div class="rowtotal"> 
                            <span>Rs.<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-</span> </div>
                        </div>
                    </td>

                    <td><a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fa fa-trash" onclick="return confirm('delete this from cart?');"></a></td>
                    
                </tr>

                <?php
                $grand_total += $sub_total;
                    }
                }else{
                    echo '<p class="empty">your cart is empty</p>';
                }
            ?>
            </table>
            


            <div style="margin-top: 2rem; text-align:center;">
                <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all</a>
            </div>

        </div>

        <div class="cart_total_container">
            <div class="grandtotal">
                <p>Grand Total</p>
                <span>Rs.<?php echo $grand_total; ?>/-</span>
            </div>
                    
            <div class="flex">
                <a href="checkout.php" class="checkout <?php echo ($grand_total > 1)?'':'disabled'; ?>">Proceed to Checkout</a>
            </div>
        </div>

    </div>

    <!--footer-->
    <?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>