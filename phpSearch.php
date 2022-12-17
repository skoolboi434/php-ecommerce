<?php include 'header.php'; ?>

<?php 

$search = $_POST['search'];

$servername = "localhost";
$username = "admin";
$password = "password1234";
$db = "ecommerce";

$conn = new mysqli($servername, $username, $password, $db);

if($conn->connect_error) {
  die("Connection failed: ". $conn->connection_error);
}

$sql = "SELECT * FROM products WHERE name LIKE '%$search%'";

$result = $conn->query($sql);
?>

<div class="products container">
  <h1>Search: <?php echo $search; ?></h1>
  <div class="row">
    <?php if($result->num_rows > 0) : ?>
      <?php while($row = $result->fetch_assoc()) : ?>
        <div class="col-sm-6 col-md-4">
          <div class="product-card">
            <div class="product-info">
              <div class="feat-img">
                <img src="imgs/<?php echo htmlspecialchars($row['feat_img']); ?>" alt="" class="img-fluid">
              </div>
              <h5 class="title"><?php echo $row['name']; ?></h5>
              <h3 class="price">&dollar;<?php echo $row['price']; ?></h3>
            </div>
            <div class="btn-container">
              <a href="index.php?page=product&id=<?=$product['id']?>" class="btn btn-primary">Product Info</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
      <?php else : ?>
        <h3>No Products Available With The name : <?php echo $search; ?></h3>
    <?php endif; ?>
  </div>
</div>