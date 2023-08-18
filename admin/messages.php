<?php
    include '../connection.php';

    session_start();
    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:login.php');
    };

    /* Delete message */

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($connection, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
        header('location:messages.php');
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Messages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link type="text/css" rel="stylesheet" href="../css/styles.css">
   <link type="text/css" rel="stylesheet" href="../css/header.css">
   <link type="text/css" rel="stylesheet" href="css/sidenavebar.css">
   <link type="text/css" rel="stylesheet" href="css/style.css">
   <link type="text/css" rel="stylesheet" href="css/messages.css">



</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>

    <div class="main">
        <div class="sidenavbar">
            <?php include 'sidenavbar.php';?>
        </div>

        <div class="content">
            <?php
                $select_message = mysqli_query($connection, "SELECT * FROM `message`") or die('query failed');
                if(mysqli_num_rows($select_message) > 0){
                    while($fetch_message = mysqli_fetch_assoc($select_message)){
            ?>
                <div class="message_container">
                    <div class="message_details">
                        From : <?php echo $fetch_message['name']; ?> 
                        ( User : <?php echo $fetch_message['user_id']; ?> ) &nbsp; &nbsp;
                        email: <a href="<?php echo $fetch_message['email']; ?>"><?php echo $fetch_message['email']; ?></a> <br>
                        Phone : <?php echo $fetch_message['number']; ?>
                        
                        <a href="messages.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">
                            delete message
                        </a>
                    </div>

                    <div class="message">
                        <p> message : <span><?php echo $fetch_message['message']; ?></span> </p>
                    </div>
                </div>
            
            <?php
                    };
                }else{
                    echo '<p class="empty">you have no messages!</p>';
                }
            ?>
        </div>
    </div>


<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>