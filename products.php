<?php
// The amounts of products to show on each page
$num_products_on_each_page = 24;
// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY created_at DESC LIMIT ?,?');
// bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of products
$total_products = $pdo->query('SELECT * FROM products')->rowCount();
?>

<?php include 'header.php'; ?>

<div class="products container">
  <h1>Products</h1>
  <p><?=$total_products?> Products</p>
  <div class="products-wrapper row">
      <?php foreach ($products as $product): ?>
      <div class="col-sm-12 col-md-3">
        <div class="product-card">
          <div class="product-info mb-3">
            <div class="feat-img mb-3">
              <img src="imgs/<?php echo htmlspecialchars($product['feat_img']); ?>" alt="" class="img-fluid">
            </div>
            <h5 class="title"><?=$product['name']?></h5>
            
            <h3 class="price">&dollar;<?=$product['price']?></h3>
          </div>
          <div class="btn-container">
            <a href="index.php?page=product&id=<?=$product['id']?>" class="btn btn-primary">Product Info</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
  </div>
  <div class="buttons">
      <?php if ($current_page > 1): ?>
      <a href="index.php?page=products&p=<?=$current_page-1?>">Prev</a>
      <?php endif; ?>
      <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
      <a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
      <?php endif; ?>
  </div>
</div>

<?php include 'footer.php'; ?>