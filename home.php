<?php include 'header.php'?>
<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY created_at DESC');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get category names
$cat_names = $pdo->prepare('SELECT cat_name FROM categories');
$cat_names->execute();

$cat_name_list = $cat_names->fetchAll(PDO::FETCH_ASSOC);

// print_r($cat_name_list);
?>

<div class="cta-container mb-5">
  <div class="container">
    <div class="row">
      <?php foreach ($cat_name_list as $cat): ?>
      <div class="col-sm-6 col-md-4">
        <a class="btn-cta" href="index.php?page=category&category=<?=$cat['cat_name']?>">
          <h3 class="heading"><?=$cat['cat_name']?></h3>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="container">
  <div class="products">
    <div class="row">
      <?php foreach ($recently_added_products as $product): ?>
        <div class="col-sm-6 col-md-3">
          <div class="product-card">
            <div class="product-info mb-3">
              <div class="feat-img">
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
  </div>
</div>


<?php include 'footer.php'?>