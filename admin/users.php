<?php
    include '../connection.php';

    session_start();
    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:login.php');
    };

    /* Delete user */
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($connection, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
        header('location:users.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link type="text/css" rel="stylesheet" href="admincss/adminstyles.css">
   <link type="text/css" rel="stylesheet" href="admincss/adminheader.css">
   <link type="text/css" rel="stylesheet" href="admincss/sidenavebar.css">
   <link type="text/css" rel="stylesheet" href="css/style.css">
   <link type="text/css" rel="stylesheet" href="css/users.css">



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
                $select_users = mysqli_query($connection, "SELECT * FROM `users` order by `user_type`") or die('query failed');

                if(mysqli_num_rows($select_users) > 0){
            ?>
                <table border=1>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>

                    <?php
                        while($fetch_users = mysqli_fetch_assoc($select_users)){
                    ?>

                    <tr>
                        <td><?php echo $fetch_users['id']; ?></td>
                        <td><?php echo $fetch_users['user_type']; ?></td>
                        <td><?php echo $fetch_users['name']; ?></td>
                        <td><a href="mailto:<?php echo $fetch_users['email']; ?>"><?php echo $fetch_users['email']; ?></a></td>
                        <td><a href="users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete</a></td>
                    </tr>

                    <?php
                        };
                    ?>
            </table>

            <?php
                }else{
                    echo "No Users Found.";
                }
            ?>
        </div>
    </div>


<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>