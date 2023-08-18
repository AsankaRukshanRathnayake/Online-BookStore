<?php
    include '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link type="text/css" rel="stylesheet" href="../css/styles.css">
   <link type="text/css" rel="stylesheet" href="../css/header.css">
   <link type="text/css" rel="stylesheet" href="css/sidenavebar.css">
   <link type="text/css" rel="stylesheet" href="css/style.css">
   <link type="text/css" rel="stylesheet" href="css/dashboard.css">



</head>
<body>

    <!--header-->
    <?php include 'header.php'; ?>

    <div class="main">
        <div class="sidenavbar">
            <?php include 'sidenavbar.php';?>
        </div>

        <div class="content">
            <div class="summary_container">
                <div class="summary_box">
                    <table>
                        <tr>
                            <td>Total No. of Orders :</td>
                            <td>
                                <?php 
                                $select_orders = mysqli_query($connection, "SELECT * FROM `orders`") or die('query failed');
                                $number_of_orders = mysqli_num_rows($select_orders);
                                echo $number_of_orders; 
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Completed :</td>
                            <td>
                                <?php 
                                    $select_orders = mysqli_query($connection, "SELECT * FROM `orders` where payment_status='pending'") or die('query failed');
                                    $number_of_orders = mysqli_num_rows($select_orders);
                                    echo $number_of_orders; 
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Pending :</td>
                            <td>
                                <?php 
                                    $select_orders = mysqli_query($connection, "SELECT * FROM `orders` where payment_status='completed'") or die('query failed');
                                    $number_of_orders = mysqli_num_rows($select_orders);
                                    echo $number_of_orders; 
                                ?>
                            </td>
                        </tr>
                    </table>

                </div>




                <div class="summary_box">
                    <table>
                        <tr>
                            <td>Total Amount of Payments :</td>
                            <td>
                                <?php
                                    $total_payments_amount = 0;
                                    
                                    $select_total_payments = mysqli_query($connection, "SELECT total_price FROM `orders`") or die('query failed');
                                    
                                    if(mysqli_num_rows($select_total_payments) > 0){
                                        while($fetch_completed = mysqli_fetch_assoc($select_total_payments)){
                                            $total_price = $fetch_completed['total_price'];
                                            $total_payments_amount += $total_price;
                                        };
                                    };
                                    
                                    echo $total_payments_amount; ?>/-
                            </td>
                        </tr>

                        <tr>
                            <td>Total Completed Payments :</td>
                            <td>
                                <?php
                                    $total_payments_amount = 0;
                                    
                                    $select_total_payments = mysqli_query($connection, "SELECT total_price FROM `orders` where payment_status='completed'") or die('query failed');
                                    
                                    if(mysqli_num_rows($select_total_payments) > 0){
                                        while($fetch_completed = mysqli_fetch_assoc($select_total_payments)){
                                            $total_price = $fetch_completed['total_price'];
                                            $total_payments_amount += $total_price;
                                        };
                                    };
                                    
                                    echo $total_payments_amount; ?>/-
                            </td>
                        </tr>

                        <tr>
                            <td>Total Pendings :</td>
                            <td>
                                <?php
                                    $total_payments_amount = 0;
                                    
                                    $select_total_payments = mysqli_query($connection, "SELECT total_price FROM `orders` where payment_status='pending'") or die('query failed');
                                    
                                    if(mysqli_num_rows($select_total_payments) > 0){
                                        while($fetch_completed = mysqli_fetch_assoc($select_total_payments)){
                                            $total_price = $fetch_completed['total_price'];
                                            $total_payments_amount += $total_price;
                                        };
                                    };
                                    
                                    echo $total_payments_amount; ?>/-
                            </td>
                        </tr>
                    </table>

                </div>



                <div class="summary_box">
                    <table>
                        <tr>
                            <td>Users :</td>
                            <td>
                                <?php 
                                    $select_users = mysqli_query($connection, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
                                    $number_of_users = mysqli_num_rows($select_users);
                                    
                                    echo $number_of_users;
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Products :</td>
                            <td>
                                <?php 
                                    $select_products = mysqli_query($connection, "SELECT * FROM `products`") or die('query failed');
                                    $number_of_products = mysqli_num_rows($select_products);
                                    
                                    echo $number_of_products; ?>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>

                </div>

            </div>

        </div>
    </div>


<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>