<?php
    include 'connection.php';
    session_start();
    if (isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
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
   <link type="text/css" rel="stylesheet" href="css/shopping.css">
   
   
</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>
  
    <!-- new arrivals -->
    <div class="products_section">
        <h1>New Arrivals</h1>

        <div class="card-slider">
            <?php
                $select_products = mysqli_query($connection, "SELECT * FROM `products` where new='1'") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
            ?>
            
            <button class="prev-button" disabled><i class="fas fa-angle-left"></i></button>

            <div class="slider-container">
                <div class="slider">
                    <?php while($fetch_products = mysqli_fetch_assoc($select_products)){ ?>
                        <div class="card">
                            <form action="" method="post" class="product">
                                <img class="product_image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                                <div class="product_name"><?php echo $fetch_products['name']; ?></div>
                                <div class="product_price">$<?php echo $fetch_products['price']; ?>/-</div>
        
                                <input type="number" min="1" name="product_quantity" value="1" max="100" class="product_quantity">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                <input type="submit" value="add to cart" name="add_to_cart" class="addtocart">
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        
            <button class="next-button"><i class="fas fa-angle-right"></i></button>
            
            <?php  }else{ echo '<p class="empty">no products added yet!</p>'; } ?>
        </div>
    </div>

    <!--Novels -->
    <div class="products_section">
        <h1>Novels</h1>

        <div class="card-slider">
            <?php
                $select_products = mysqli_query($connection, "SELECT * FROM `products` where category='novels'") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
            ?>
            
            <button class="prev-button" disabled><i class="fas fa-angle-left"></i></button>

            <div class="slider-container">
                <div class="slider">
                    <?php while($fetch_products = mysqli_fetch_assoc($select_products)){ ?>
                        <div class="card">
                            <form action="" method="post" class="product">
                                <img class="product_image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                                <div class="product_name"><?php echo $fetch_products['name']; ?></div>
                                <div class="product_price">$<?php echo $fetch_products['price']; ?>/-</div>
        
                                <input type="number" min="1" name="product_quantity" value="1" max="100" class="product_quantity">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                <input type="submit" value="add to cart" name="add_to_cart" class="addtocart">
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        
            <button class="next-button"><i class="fas fa-angle-right"></i></button>
            
            <?php  }else{ echo '<p class="empty">no products added yet!</p>'; } ?>
        </div>
    </div>

        <!--Children -->
        <div class="products_section">
        <h1>Children</h1>

        <div class="card-slider">
            <?php
                $select_products = mysqli_query($connection, "SELECT * FROM `products` where category='children'") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
            ?>
            
            <button class="prev-button" disabled><i class="fas fa-angle-left"></i></button>

            <div class="slider-container">
                <div class="slider">
                    <?php while($fetch_products = mysqli_fetch_assoc($select_products)){ ?>
                        <div class="card">
                            <form action="" method="post" class="product">
                                <img class="product_image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                                <div class="product_name"><?php echo $fetch_products['name']; ?></div>
                                <div class="product_price">$<?php echo $fetch_products['price']; ?>/-</div>
        
                                <input type="number" min="1" name="product_quantity" value="1" max="100" class="product_quantity">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                <input type="submit" value="add to cart" name="add_to_cart" class="addtocart">
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        
            <button class="next-button"><i class="fas fa-angle-right"></i></button>
            
            <?php  }else{ echo '<p class="empty">no products added yet!</p>'; } ?>
        </div>
    </div>

    <!--Fiction -->
    <div class="products_section">
        <h1>Fiction</h1>

        <div class="card-slider">
            <?php
                $select_products = mysqli_query($connection, "SELECT * FROM `products` where category='fiction'") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
            ?>
            
            <button class="prev-button" disabled><i class="fas fa-angle-left"></i></button>

            <div class="slider-container">
                <div class="slider">
                    <?php while($fetch_products = mysqli_fetch_assoc($select_products)){ ?>
                        <div class="card">
                            <form action="" method="post" class="product">
                                <img class="product_image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                                <div class="product_name"><?php echo $fetch_products['name']; ?></div>
                                <div class="product_price">$<?php echo $fetch_products['price']; ?>/-</div>
        
                                <input type="number" min="1" name="product_quantity" value="1" max="100" class="product_quantity">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                <input type="submit" value="add to cart" name="add_to_cart" class="addtocart">
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        
            <button class="next-button"><i class="fas fa-angle-right"></i></button>
            
            <?php  }else{ echo '<p class="empty">no products added yet!</p>'; } ?>
        </div>
    </div>

        <!--Education -->
        <div class="products_section">
        <h1>Education</h1>

        <div class="card-slider">
            <?php
                $select_products = mysqli_query($connection, "SELECT * FROM `products` where category='education'") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
            ?>
            
            <button class="prev-button" disabled><i class="fas fa-angle-left"></i></button>

            <div class="slider-container">
                <div class="slider">
                    <?php while($fetch_products = mysqli_fetch_assoc($select_products)){ ?>
                        <div class="card">
                            <form action="" method="post" class="product">
                                <img class="product_image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                                <div class="product_name"><?php echo $fetch_products['name']; ?></div>
                                <div class="product_price">$<?php echo $fetch_products['price']; ?>/-</div>
        
                                <input type="number" min="1" name="product_quantity" value="1" max="100" class="product_quantity">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                <input type="submit" value="add to cart" name="add_to_cart" class="addtocart">
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        
            <button class="next-button"><i class="fas fa-angle-right"></i></button>
            
            <?php  }else{ echo '<p class="empty">no products added yet!</p>'; } ?>
        </div>
    </div>


    <!--Short Stories -->
    <div class="products_section">
        <h1>Short Stories</h1>

        <div class="card-slider">
            <?php
                $select_products = mysqli_query($connection, "SELECT * FROM `products` where category='shortstories'") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
            ?>
            
            <button class="prev-button" disabled><i class="fas fa-angle-left"></i></button>

            <div class="slider-container">
                <div class="slider">
                    <?php while($fetch_products = mysqli_fetch_assoc($select_products)){ ?>
                        <div class="card">
                            <form action="" method="post" class="product">
                                <img class="product_image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                                <div class="product_name"><?php echo $fetch_products['name']; ?></div>
                                <div class="product_price">$<?php echo $fetch_products['price']; ?>/-</div>
        
                                <input type="number" min="1" name="product_quantity" value="1" max="100" class="product_quantity">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                <input type="submit" value="add to cart" name="add_to_cart" class="addtocart">
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        
            <button class="next-button"><i class="fas fa-angle-right"></i></button>
            
            <?php  }else{ echo '<p class="empty">no products added yet!</p>'; } ?>
        </div>
    </div>

    <!--Translations-->
    <div class="products_section">
        <h1>Translations</h1>

        <div class="card-slider">
            <?php
                $select_products = mysqli_query($connection, "SELECT * FROM `products` where category='translation'") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
            ?>
            
            <button class="prev-button" disabled><i class="fas fa-angle-left"></i></button>

            <div class="slider-container">
                <div class="slider">
                    <?php while($fetch_products = mysqli_fetch_assoc($select_products)){ ?>
                        <div class="card">
                            <form action="" method="post" class="product">
                                <img class="product_image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                                <div class="product_name"><?php echo $fetch_products['name']; ?></div>
                                <div class="product_price">$<?php echo $fetch_products['price']; ?>/-</div>
        
                                <input type="number" min="1" name="product_quantity" value="1" max="100" class="product_quantity">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                <input type="submit" value="add to cart" name="add_to_cart" class="addtocart">
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        
            <button class="next-button"><i class="fas fa-angle-right"></i></button>
            
            <?php  }else{ echo '<p class="empty">no products added yet!</p>'; } ?>
        </div>
    </div>

    <!--Discount-->

    <div class="products_section">
        <h1>Discount</h1>

        <div class="card-slider">
            <?php
                $select_products = mysqli_query($connection, "SELECT * FROM `products` where discount='100'") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
            ?>
            
            <button class="prev-button" disabled><i class="fas fa-angle-left"></i></button>

            <div class="slider-container">
                <div class="slider">
                    <?php while($fetch_products = mysqli_fetch_assoc($select_products)){ ?>
                        <div class="card">
                            <form action="" method="post" class="product">
                                <img class="product_image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                                <div class="product_name"><?php echo $fetch_products['name']; ?></div>
                                <div class="product_price">$<?php echo $fetch_products['price']; ?>/-</div>
        
                                <input type="number" min="1" name="product_quantity" value="1" max="100" class="product_quantity">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                <input type="submit" value="add to cart" name="add_to_cart" class="addtocart">
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        
            <button class="next-button"><i class="fas fa-angle-right"></i></button>
            
            <?php  }else{ echo '<p class="empty">no products added yet!</p>'; } ?>
        </div>
    </div>
    <!--footer-->
    <?php include 'footer.php'; ?>

<!-- js files -->

<script src="js/script.js"></script>
<script src="js/slidebar.js"></script>


</body>
</html>