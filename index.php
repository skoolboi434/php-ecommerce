<?php 

// Connect to DB

$conn = mysqli_connect('localhost', 'admin', 'password1234', 'ecommerce');

// Check connection

if(!$conn){
  echo 'Connection error: ' . mysqli_connect_error();
}

// Write query for all pizas

$sql = 'SELECT * FROM products';

// Get results

$result = mysqli_query($conn, $sql);

// Fetch rows as an array

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free results from memory

mysqli_free_result($result);

// Close Connection

mysqli_close($conn);

?>

<?php include 'header.php'?>

<div class="container">
  <?php print_r($products); ?>
</div>

<?php include 'footer.php'?>