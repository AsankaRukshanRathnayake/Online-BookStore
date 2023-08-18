<?php
    include '../connection.php';

    session_start();
    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:login.php');
    };

    /* Delete order */
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($connection, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
        header('location:orders.php');
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

   <link type="text/css" rel="stylesheet" href="../css/styles.css">
   <link type="text/css" rel="stylesheet" href="../css/header.css">
   <link type="text/css" rel="stylesheet" href="css/sidenavebar.css">
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
                $select_orders = mysqli_query($connection, "SELECT * FROM `orders`") or die('query failed');

                if(mysqli_num_rows($select_orders) > 0){
            ?>
                <table border=1>
                    <tr>
                        <th>ID</th>
                        <th>Placed on</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Total Products</th>
                        <th>Total Price</th>
                        <th>Payment Method</th>
                        <th></th>
                    </tr>

                    <?php
                        while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                    ?>

                    <tr>
                        <td><?php echo $fetch_orders['user_id']; ?></td>
                        <td><?php echo $fetch_orders['placed_on']; ?></td>
                        <td><?php echo $fetch_orders['name']; ?></td>
                        <td><a href="mailto:<?php echo $fetch_orders['email']; ?>"><?php echo $fetch_orders['email']; ?></a></td>
                        <td><?php echo $fetch_orders['address']; ?></td>
                        <td><?php echo $fetch_orders['number']; ?></td>
                        <td><?php echo $fetch_orders['total_products']; ?></td>
                        <td><?php echo $fetch_orders['total_price']; ?></td>
                        <td><?php echo $fetch_orders['method']; ?></td>
    
                        <td><a href="orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a></td>
                    </tr>

                    <?php
                        };
                    ?>
            </table>

            <?php
                }else{
                    echo "no orders placed yet";
                }
            ?>
        </div>
    </div>


<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>