<?php

$server   = 'localhost';
$username = 'root';
$password = '';
$database = 'bookstore';

$connection = mysqli_connect($server, $username, $password, $database) or die("Database connection failed!");

?>