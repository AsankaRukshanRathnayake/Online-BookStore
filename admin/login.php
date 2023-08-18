<?php
    include '../connection.php';

    session_start();

    if(isset($_POST['submit'])){

        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $pass = mysqli_real_escape_string($connection, md5($_POST['password']));

        $select_users = mysqli_query($connection, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

        if(mysqli_num_rows($select_users) > 0){

            $row = mysqli_fetch_assoc($select_users);

            if($row['user_type'] == 'admin'){

                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                header('location:admin.php');

            }else{
                $message[] = 'incorrect email or password!';
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
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/styles.css" type="text/css">
   <link rel="stylesheet" href="../css/login.css" type="text/css">

</head>
<body>
  
    <?php
        
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
        
    ?>

    <div class="login_form_container">
        
        <form action="" method="post">
            <h3>LOGIN</h3>

            <input type="email" name="email" placeholder="enter your email" required class="loginfield">
            <input type="password" name="password" placeholder="enter your password" required class="loginfield">

            <input type="submit" name="submit" value="Login Now" class="loginbutton">

            <p>
                Don't have an account? <br>
                <a href="register.php">Click here to Register</a>
            </p>
        </form>

    </div>

</body>
</html>