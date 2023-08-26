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
   <title>Search</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link type="text/css" rel="stylesheet" href="css/styles.css">
   <link type="text/css" rel="stylesheet" href="css/header.css">
   <link type="text/css" rel="stylesheet" href="css/search.css">
   <link type="text/css" rel="stylesheet" href="css/footer.css">
   <link type="text/css" rel="stylesheet" href="css/home.css">
   
</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>

    <!--main body-->
    <div class="search-container">
        <form action="" method="POST">
            <input type="text" name="searchinput" placeholder="Enter to search" class="">
            <input type="submit" name="search" value="Search" class="">
        </form>

        <div class="search_result">
            <?php
                if(isset($_POST['search'])){
                    $item = $_POST['searchinput'];

                    $itemlist = mysqli_query($connection, "SELECT * FROM `products` WHERE name LIKE '%{$item}%' OR category LIKE '%{$item}%'");
                    if(mysqli_num_rows($itemlist)>0){
                        while($fetch_product=mysqli_fetch_assoc($itemlist)){
                            ?>
                                <form action="" method="POST">
                                    <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="" class="image">
                                    <div class="name"><?php echo $fetch_product['name']; ?></div>
                                    <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
                                    <input type="number"  class="qty" name="product_quantity" min="1" value="1">
                                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                    <input type="submit" class="btn" value="add to cart" name="add_to_cart">
                                </form>

                            <?php
                        }
                    }
                    else{
                        echo "not found";
                    }
                }
            ?>
        </div>
    </div>

    <!--footer-->
    <?php include 'footer.php'; ?>

<!-- js files -->

<script src="js/script.js"></script>
<script src="js/slidebar.js"></script>


</body>
</html>