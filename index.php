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
   <link type="text/css" rel="stylesheet" href="css/home.css">
   
   
</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>

    <!--main body-->
    <div class="main_image">
        <img src="images/main5.jpg" alt="" class="image1">
        <p class="content">Welcome to our virtual book haven, <br> where tales come alive. <br>Immerse yourself in a world of literary wonders, curated with care to ignite your imagination.</p>
    </div>
    
    <!--charactieristics -->
    <div class="characteristics">
        <div class="characterbox">
            <img src="moreicons/welfare.png" alt="">
            <h2>Social Responsibility</h2>
            <p>A portion of each purchase goes toward supporting literacy initiatives and promoting the love of reading worldwide.</p>
        </div>

        <div class="characterbox">
            <img src="moreicons/collection.png" alt="">
            <h2>Vast Collection</h2>
            <p>Explore our extensive collection spanning diverse genres, ensuring you find the perfect read to suit your taste and mood.</p>
        </div>

        <div class="characterbox">
            <img src="moreicons/gift.png" alt="">
            <h2>Gift Options</h2>
            <p>Share the joy of reading by gifting books to loved ones, with beautifully wrapped options and customizable notes available.</p>
        </div>

    </div>

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

    <!--about -->

    <div class="about">
        <img src="images/main2.jpg" alt="" class="main_image image2">

        <div class="content left">
            <h2>About Us</h2>
            <p>We're devoted to kindling your literary passions with a diverse collection that sparks imagination and curiosity. Discover literary treasures and embark on endless reading journeys with us</p>
            <a href="about.php"><span>Read More</span></a>
        </div>
    </div>

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

    <!--contact -->

    <div class="about">
        <img src="images/main3.jpg" alt="" class="main_image image3">

        <div class="content right">
            <h2>Connect With Us</h2>
            <p>We're thrilled to connect with fellow book enthusiasts! Have a question, suggestion, or just want to share your latest literary discovery? Reach out to us – let's converse and celebrate books together.</p>
            <a href="contact.php"><span>Contact Us</span></a>
        </div>
    </div>

    <!--footer-->
    <?php include 'footer.php'; ?>

<!-- js files -->

<script src="js/script.js"></script>
<script src="js/slidebar.js"></script>


</body>
</html>