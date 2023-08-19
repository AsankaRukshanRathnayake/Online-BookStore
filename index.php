<?php
    include 'connection.php';
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
   <link type="text/css" rel="stylesheet" href="css/home.css">

</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>

    <!--main body-->
    <img src="images/main1.png" alt="" class="main_image">

    <div class="products_section">
        <h1>New Arrivals</h1>

        <?php
              $select_products = mysqli_query($connection, "SELECT * FROM `products` where new='1'") or die('query failed');
                
              if(mysqli_num_rows($select_products) > 0){
        ?>

        <div class="container">
            <button class="prev-button" disabled>Previous</button>
            
            <div class="slider-container">
                <div class="slider">

                    <?php while($fetch_products = mysqli_fetch_assoc($select_products)){ ?>
                              <div class="card">
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
                              </div>
                    <?php } ?>
                </div>
            </div>

            <button class="next-button">Next</button>
        </div>

        <?php
              }else{
                    echo '<p class="empty">no products added yet!</p>';
              }
        ?>
    </div>

      <?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="js/slidebar.js"></script>


</body>
</html>