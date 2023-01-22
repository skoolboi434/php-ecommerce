<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>

<?php include 'header.php'?>
<div class="container pt-5">
  <?php if($product) : ?>
  <div class="row">
    <div class="col-md-6">
      <div class="product-gallery">
        <img src="imgs/<?php echo htmlspecialchars($product['product_image']); ?>" alt="" class="img-fluid">
      </div>
    </div>
    <div class="col-md-6">
      <div class="product-top-content">
        <h3 class="product-name"><?php echo htmlspecialchars($product['product_name']); ?></h3>
        <div class="sku-container ">
          <span class="small">Item #: <?php echo htmlspecialchars($product['item_num']); ?></span>
        </div>
          <ul class="tip-list">
            <?php foreach(explode(',', $product['top_list']) as $tl_item) : ?>
              <li>
                <?php echo htmlspecialchars($tl_item) ?>
              </li>
            <?php endforeach; ?>
          </ul>
          <a href="#" id="more-features">More Features</a>
          <h2 class="price">$<?php echo htmlspecialchars($product['price']); ?></h2>
          <div class="form-container">
            <form action="index.php?page=cart" method="post">
              <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
              <input type="hidden" name="product_id" value="<?=$product['id']?>">
              <input class="btn btn-danger" type="submit" value="Add To Cart">
            </form>
          </div>
      </div>
    </div>
  </div>
  <div class="product-bottom-content">
    <div class="descr-container mb-5">
      <?php if($product['info']) :?>
      <h2 class="heading">Description</h2>
      <p class="description"><?php echo htmlspecialchars($product['info']); ?></p>
      <?php endif; ?>
    </div>
    <?php if($product['features']) :?>
    <div class="features-container">
      <h2 class="heading">Features</h2>
      <ul class="feat-list">
        <?php foreach(explode(',', $product['features']) as $feat_item) : ?>
          <li>
            <?php echo htmlspecialchars($feat_item) ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>
  </div>
  <?php else : ?>
    <h1 class="error">Product does not exist.</h1>
  <?php endif; ?>
</div>

<?php include 'footer.php'?>