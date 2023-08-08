<?php

$server   = 'localhost';
$username = 'root';
$password = '';
$database = 'shop_db';

$connection = mysqli_connect($server, $username, $password, $database) or die("Database connection failed!");

?>