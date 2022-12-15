<?php 
include 'config/db_connect.php';

// Check GET request id params
if(isset($_GET['id'])){

  $id = mysqli_real_escape_string($conn, $_GET['id']);

  // make sql
  $sql = "SELECT * From products WHERE id = $id";

  // Get query results
  $result = mysqli_query($conn, $sql);

  // fetch result in array format
  $product = mysqli_fetch_assoc($result);

  mysqli_free_result($result);

  mysqli_close($conn);


}

?>

<?php include 'header.php'?>
<div class="container">
  <?php if($product) : ?>
  <div class="row">
    <div class="col-md-6">
      <div class="product-gallery"></div>
    </div>
    <div class="col-md-6">
      <div class="product-top-content">
        <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
          <ul class="tip-list">
            <?php foreach(explode(',', $product['top_list']) as $tl_item) : ?>
              <li>
                <?php echo htmlspecialchars($tl_item) ?>
              </li>
            <?php endforeach; ?>
          </ul>
          <a href="#" id="more-features">More Features</a>
          <h2 class="price">$<?php echo htmlspecialchars($product['price']); ?></h2>
      </div>
    </div>
  </div>
  <div class="product-bottom-content">
    <div class="descr-container">
      <h2 class="heading">Description</h2>
      <p class="description"><?php echo htmlspecialchars($product['info']); ?></p>
    </div>
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
  </div>
  <?php else : ?>
    <h1 class="error">Product does not exist.</h1>
  <?php endif; ?>
</div>

<?php include 'footer.php'?>