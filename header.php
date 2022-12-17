<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Ecommerce</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>

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


<header class="main-header">
  <div class="top-contact-bar">
    <div class="phone-container">
      <span class="phone"><i class="fa-solid fa-phone"></i> (00)0000-0000</span>
    </div>
    <div class="social-container">
      <a href="#" class="social-link"><i class="fa-brands fa-facebook"></i></a>
      <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
      <a href="#" class="social-link"><i class="fa-brands fa-youtube"></i></a>
    </div>
  </div> <!-- End Top Contact Bar -->

  <div class="container">
    <div class="middle-container">
      <div class="logo-container">
        <a href="index.php">
          <strong class="logo">
            <i class="fa-solid fa-record-vinyl"></i>
          </strong>
        </a>
      </div>
      <label class="open-search" for="open-search">
        <i class="fa fa-search"></i>
        <input class="input-open-search" id="open-search" type="checkbox" name="menu" />
        <form class="search-container" action="index.php?page=search" method="POST">
          <button class="button-search"><i class="fas fa-search"></i></button>
          <input type="text" placeholder="What are you looking for?" class="input-search" name="search"/>
          </form>
      </label> <!-- End Search Bar -->
      <nav class="nav-content">
        <ul class="nav-content-list">
          <li class="nav-content-item account-login">
            <label class="open-menu-login-account" for="open-menu-login-account">

              <input class="input-menu" id="open-menu-login-account" type="checkbox" name="menu" />

              <i class="fas fa-user-circle"></i><span class="login-text">Hello, Sign in <strong>Create Account</strong></span> <span class="item-arrow"></span>

              <!-- submenu -->
              <ul class="login-list">
                <li class="login-list-item"><a href="https://www.cupcom.com.br/">My account</a></li>
                <li class="login-list-item"><a href="https://www.cupcom.com.br/">Create account</a></li>
                <li class="login-list-item"><a href="https://www.cupcom.com.br/">logout</a></li>
                </label>
              </ul>
          </li>
          <li class="nav-content-item"><a class="nav-content-link" href="https://www.cupcom.com.br/"><i class="fas fa-heart"></i></a></li>
          <li class="nav-content-item">
            <a class="nav-content-link" href="https://www.cupcom.com.br/">
              <i class="fas fa-shopping-cart"></i>
              <span class="cart-count"><?php echo $num_items_in_cart ?></span>
            </a>
          </li>
          <!-- call to action -->
        </ul>
      </nav>
    </div>
  </div>

  <nav class="nav-container">
    <div class="container">
      <div class="menu">
        <a href="index.php" class="is-active">Home</a>
        <a href="index.php?page=products">Products</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
      </div>
      <button class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </nav>
</header>