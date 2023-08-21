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
   <link type="text/css" rel="stylesheet" href="css/aboutus.css">
   
   

</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>

    <!--main body-->
    <div class="about">
        <img src="images/main4.jpg" alt="" class="image">

        <div class="content">
            <p>At our online bookstore, <br>We're passionate about connecting readers with the perfect books.<br> Discover literary treasures and embark on endless reading journeys <br>with us.</p>
        </div>
    </div>

    <div class="description_container">
        <div class="ourstory">
            <h2>Our Story</h2>
            <p>Founded by avid book lovers, The Bookstore was born out of a shared vision to create a haven for fellow book enthusiasts. 
            Our journey started with a simple idea: to connect readers with stories that have the ability to transport, inspire, and captivate. 
            Over the years, we've grown from a small online venture to a thriving community of readers and writers, all united by our love for the written word.</p>
        </div>

        <div class="ourstory">
            <h2>Why Choose Us?</h2>
            <p>We handpick each book that graces our virtual shelves, ensuring a diverse and captivating collection that spans genres, cultures, and eras. 
                Whether you're seeking a heartwarming romance, an edge-of-your-seat thriller, or an enlightening non-fiction read, you'll find it here.
                Explore our vast catalog from the comfort of your own home. With just a few clicks, your chosen books will be on their way to your doorstep.</p>
        </div>
    </div>

    <div class="description_container2">
        <img src="images/bookreader2.jpg" alt="">

        <div class="ourstory">
            <h2>Join Us in the Adventure:</h2>
            <p>Embark on a literary adventure with Bookstore. Whether you're seeking an escape from reality, a chance to learn something new,
                 or simply a moment of pure enjoyment, we're here to make it happen. Let's celebrate the written word together and discover the countless
                  worlds that await within the pages of a book.</p>
        </div>
    </div>

    


    <!--footer-->
    <?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>