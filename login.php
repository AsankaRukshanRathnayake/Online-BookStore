<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css" type="text/css">
   <link rel="stylesheet" href="css/header.css" type="text/css">
   <link rel="stylesheet" href="css/footer.css" type="text/css">
   <link rel="stylesheet" href="css/login.css" type="text/css">

</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>

    
    <?php
        /*
        if(isset($message)){
            foreach($message as $message){
                echo '
                    <div class="message">
                    <span>'.$message.'</span>
                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                </div>
                ';
            }
        }
        */
    ?>

    <div class="login_form_container">

        <form name="loginform" action="" method="post">
            <h3>login now</h3>
            <input type="email" name="email" placeholder="enter your email" required class="box">
            <input type="password" name="password" placeholder="enter your password" required class="box">
            <input type="submit" name="submit" value="login now" class="btn">
            <p>don't have an account? <a href="register.php">register now</a></p>
        </form>

    </div>

    <!--footer-->
    <?php include 'footer.php'; ?>

</body>
</html>