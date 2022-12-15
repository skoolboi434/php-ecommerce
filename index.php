<?php 

include('config/db_connect.php');

// Write query for all pizas

$sql = 'SELECT * FROM products ORDER BY created_at';

// Get results

$result = mysqli_query($conn, $sql);

// Fetch rows as an array

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free results from memory

mysqli_free_result($result);

// Close Connection

mysqli_close($conn);

// Break content with commas into an array

// print_r(explode(',', $products[0]['top_list']));

?>

<?php include 'header.php'?>

<div class="container">
  
  <div class="row">
    <?php foreach($products as $product) : ?>
      <div class="col-sm-6 col-md-3">
        <div class="product-card">
          <div class="product-info mb-3">
            <h5 class="title"><?php echo htmlspecialchars($product['name']); ?></h5>
            
            <h3 class="price">$<?php echo htmlspecialchars($product['price']); ?></h3>
          </div>
          <div class="btn-container">
            <a href="details.php?id=<?php echo $product['id'] ?>" class="btn btn-primary">Product Info</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include 'footer.php'?>