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
   <link type="text/css" rel="stylesheet" href="css/about.css">
   

</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>

    <!--main body-->
    About Lorem ipsum...

    <!--footer-->
    <?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>