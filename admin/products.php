<?php
    include '../connection.php';

    session_start();
    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:login.php');
    };

    if(isset($_POST['add_product'])){

        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_img/'.$image;
        $category = $_POST['category'];

        $select_product_name = mysqli_query($connection, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

        if(mysqli_num_rows($select_product_name) > 0){
            $message[] = 'product name already added';
        }else{
            $add_product_query = mysqli_query($connection, "INSERT INTO `products`(name, price, image, category) VALUES('$name', '$price', '$image', '$category')") or die('query failed');

            if($add_product_query){
                if($image_size > 2000000){
                    $message[] = 'image size is too large';
                }else{
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'product added successfully!';
                }
            }else{
                $message[] = 'product could not be added!';
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
   <title>Product</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link type="text/css" rel="stylesheet" href="admincss/adminstyles.css">
   <link type="text/css" rel="stylesheet" href="admincss/adminheader.css">
   <link type="text/css" rel="stylesheet" href="admincss/sidenavebar.css">
   <link type="text/css" rel="stylesheet" href="css/style.css">



</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>

    <div class="main">
        <div class="sidenavbar">
            <?php include 'sidenavbar.php';?>
        </div>

        <div class="content">
            <div class="quick">
                <div class="addproducts">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h3>add product</h3>
                        
                        <input type="text" name="name" class="box" placeholder="enter product name" required>
                        <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
                        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
                        
                        <select name="category" required>
                            <option value="novels" id="novels">Novels</option>
                            <option value="shortstories">Short Stories</option>
                            <option value="children">Childern</option>
                            <option value="fiction">Fiction</option>
                            <option value="education">Education</option>
                            <option value="translation">Translations</option>
                        </select>
                        <input type="submit" value="add product" name="add_product" class="btn">
                    </form>
                </div>

                <div class="otheroptions">

                </div>
            </div>
        </div>
    </div>


<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>