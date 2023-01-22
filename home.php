<?php include 'header.php'?>
<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT products.id, products.product_image, products.product_name, products.price FROM products ORDER BY created_at DESC');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get category names
$cat_names = $pdo->prepare('SELECT cat_name FROM categories');
$cat_names->execute();

$cat_name_list = $cat_names->fetchAll(PDO::FETCH_ASSOC);

// print_r($recently_added_products);

?>


<div class="cta-container mt-5 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-4 mb-sm-3">
        <a class="btn-cta" href="index.php?page=category-controllers&category=controllers" name="controllers">
          <h3 class="heading">Controllers &amp; Interfaces</h3>
        </a>
      </div>

      <div class="col-sm-12 col-md-4 mb-sm-3">
        <a class="btn-cta" href="index.php?page=category-turntables&category=turntables">
          <h3 class="heading">Turntables</h3>
        </a>
      </div>

      <div class="col-sm-12 col-md-4">
        <a class="btn-cta" href="index.php?page=category-mixers&category=mixers">
          <h3 class="heading">Mixers</h3>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="container mb-3">
  <div class="products">
    <div class="heading-container text-center">
      <h3 class="heading">Featured Products</h3>
      <hr>
    </div>
    <div class="row">
      <?php foreach ($recently_added_products as $product): ?>
        <div class="col-sm-6 col-md-3">
          <div class="product-card">
            <div class="product-info mb-3">
              <div class="feat-img">
                <img src="imgs/<?php echo htmlspecialchars($product['product_image']); ?>" alt="" class="img-fluid">
              </div>
              <h5 class="title"><?=$product['product_name']?></h5>
              
              <h3 class="price">&dollar;<?=$product['price']?></h3>
            </div>
            <div class="btn-container">
              <a href="index.php?page=product&id=<?=$product['id']?>" class="btn btn-primary">Product Info</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>


<?php include 'footer.php'?>