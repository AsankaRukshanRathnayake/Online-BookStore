<?php
    include 'connection.php';
    session_start();
    if (isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }
?>

<?php
    if(isset($_POST['send'])){
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $number = $_POST['phonenumber'];
        $msg = mysqli_real_escape_string($connection, $_POST['message']);
     
        $select_message = mysqli_query($connection, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
     
        if(mysqli_num_rows($select_message) > 0){
           $message[] = 'message sent already!';
        }else{
           mysqli_query($connection, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
           $message[] = 'message sent successfully!';
        }
     
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
   <link type="text/css" rel="stylesheet" href="css/contact.css">

</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>

    <!--main body-->
    <div class="contact_form_container">
        <form action="" method="post" name="contactform">
            <h3>Contact Us</h3>

            <input type="text" name="name" required placeholder="enter your name" class="contact_field">
            <input type="email" name="email" required placeholder="enter your email" class="contact_field">
            <input type="text" name="phonenumber" required placeholder="enter your phone number" class="contact_field">
            <textarea name="message"  placeholder="enter your message" id="" cols="30" rows="10" class="contact_field"></textarea>
            <input type="submit" value="send message" name="send" class="sendmessage">
   </form>

    </div>

    <!--footer-->
    <?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>