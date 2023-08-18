<?php
    include 'connection.php';
    
    session_start();
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['add_to_cart'])){
        if(!isset($user_id)){
            header('location:login.php');
        }
        else{
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];
     
            $check_cart_numbers = mysqli_query($connection, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
     
            if(mysqli_num_rows($check_cart_numbers) > 0){
                $message[] = 'already added to cart!';
            }else{
                mysqli_query($connection, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
                $message[] = 'product added to cart!';
            }

        }
     
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link type="text/css" rel="stylesheet" href="css/styles.css">
   <link type="text/css" rel="stylesheet" href="css/header.css">
   <link type="text/css" rel="stylesheet" href="css/footer.css">
   <link type="text/css" rel="stylesheet" href="css/shop.css">

</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>

    <!--main body-->
    <div class="shopping_container">
        <h1 class="title">latest products</h1>

        <div class="products_container">

            <?php
                $select_products = mysqli_query($connection, "SELECT * FROM `products`") or die('query failed');
                
                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_products = mysqli_fetch_assoc($select_products)){
            ?>

            <form action="" method="post" class="product">
                <img class="product_image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                <div class="product_name"><?php echo $fetch_products['name']; ?></div>
                <div class="product_price">$<?php echo $fetch_products['price']; ?>/-</div>
        
                <input type="number" min="1" name="product_quantity" value="1" class="product_quantity">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                <input type="submit" value="add to cart" name="add_to_cart" class="addtocart">
            </form>
   
            <?php
                    }
                }else{
                    echo '<p class="empty">no products added yet!</p>';
                }
            ?>

        </div>
    </div>

    <!--footer-->
    <?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>