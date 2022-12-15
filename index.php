<?php 
session_start();
// Include functions and connect to the database using PDO MySQL
include 'functions.php';
$pdo = pdo_connect_mysql();

// Page is set to home (home.php) by default, so when the visitor visits that will be the page they see.
$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
// Include and show the requested page
include $page . '.php';

?>
<?php

// include('config/db_connect.php');

// Write query for all pizas

// $sql = 'SELECT * FROM products ORDER BY created_at';

// Get results

// $result = mysqli_query($conn, $sql);

// Fetch rows as an array

// $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free results from memory

// mysqli_free_result($result);

// Close Connection

// mysqli_close($conn);

// Break content with commas into an array

// print_r(explode(',', $products[0]['top_list']));

?>