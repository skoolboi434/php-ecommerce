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

<!-- Top Bar -->
  
  <nav class="topbar">
    <div class="container">
      <div class="topbar-container">
        <ul class="list-inline hidden-sm hidden-xs">
          <li><span class="text-primary">Have a question? </span> Call +120 558 7885</li>
        </ul>
        <ul class="topbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-usd mr-5"></i>USD<i class="fa fa-angle-down ml-5"></i>
            </a>
            <ul class="dropdown-menu w-100" role="menu">
              <li><a href="#"><i class="fa fa-eur mr-5"></i>EUR</a>
              </li>
              <li class=""><a href="#"><i class="fa fa-usd mr-5"></i>USD</a>
              </li>
              <li><a href="#"><i class="fa fa-gbp mr-5"></i>GBP</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <span class="hidden-xs"> French <i class="fa fa-angle-down ml-5"></i></span> </a>
            <ul class="dropdown-menu w-100" role="menu">
              <li>
                <a href="#">English</a>
              </li>
              <li class="">
                <a href="#">French</a>
              </li>
              <li>
                <a href="#">German</a>
              </li>
              <li>
                <a href="#">Spain</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">My Account<i class="fa fa-angle-down ml-5"></i></span> </a>
            <ul class="dropdown-menu w-150" role="menu">
              <li><a href="login.html">Login</a>
              </li>
              <li><a href="register.html">Create Account</a>
              </li>
              <li class="divider"></li>
              <li><a href="wishlist.html">Wishlist (5)</a>
              </li>
              <li><a href="cart.html">My Cart</a>
              </li>
              <li><a href="checkout.html">Checkout</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> 
              <i class="fa fa-shopping-basket mr-5"></i> 
              <span class="hidden-xs">Cart<sup class="text-primary"><?php echo $num_items_in_cart ?></sup>
              <i class="fa fa-angle-down ml-5"></i>
              </span> 
            </a>
            <ul class="dropdown-menu cart w-250" role="menu">
              <li>
                <form action="index.php?page=cart" method="post">
                  <table>
                      <thead>
                          <tr>
                              <td colspan="2">Product</td>
                              <td>Price</td>
                              <td>Quantity</td>
                              <td>Total</td>
                          </tr>
                      </thead>
                      <tbody>
                          <?php if (empty($products)): ?>
                          <tr>
                              <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                          </tr>
                          <?php else: ?>
                          <?php foreach ($products as $product): ?>
                          <tr>
                              <td class="img">
                                  <a href="index.php?page=product&id=<?=$product['id']?>">
                                      <img src="<?php echo htmlspecialchars($product['feat_img']); ?>" alt="" class="img-fluid">
                                  </a>
                              </td>
                              <td>
                                  <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['name']?></a>
                                  <br>
                                  <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove">Remove</a>
                              </td>
                              <td class="price">&dollar;<?=$product['price']?></td>
                              <td class="quantity">
                                  <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                              </td>
                              <td class="price">&dollar;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                          </tr>
                          <?php endforeach; ?>
                          <?php endif; ?>
                      </tbody>
                  </table>
                  <div class="subtotal">
                      <span class="text">Subtotal</span>
                      <span class="price">&dollar;<?=$subtotal?></span>
                  </div>
                  <div class="buttons">
                      <input type="submit" value="Update" name="update">
                      <input type="submit" value="Place Order" name="placeorder">
                  </div>
              </form>

              </li>
              <li>
                <div class="cart-footer"> <a href="#" class="pull-left"><i class="fa fa-cart-plus mr-5"></i>View
            Cart</a> <a href="#" class="pull-right"><i class="fa fa-shopping-basket mr-5"></i>Checkout</a> </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- End Top Bar -->

  <!-- Middle Top Bar -->

  <div class="middlebar">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 vertical-align text-left hidden-xs">
          <a href="javascript:void(0);">
            
          </a>
        </div>

        <div class="col-sm-7 vertical-align text-center">
          <form action="">
            <div class="row grid-space-1">
              <div class="col-sm-6">
                <input type="text" name="keyword" class="form-control input-lg" placeholder="Search">
              </div>

              <div class="col-sm-3">
                <!-- <select class="form-control input-lg" name="category">
                  <option value="all">All Categories</option>
                  <optgroup label="Mens">
                    <option value="shirts">Shirts</option>
                    <option value="coats-jackets">Coats & Jackets</option>
                    <option value="underwear">Underwear</option>
                    <option value="sunglasses">Sunglasses</option>
                    <option value="socks">Socks</option>
                    <option value="belts">Belts</option>
                  </optgroup>
                  <optgroup label="Womens">
                    <option value="bresses">Bresses</option>
                    <option value="t-shirts">T-shirts</option>
                    <option value="skirts">Skirts</option>
                    <option value="jeans">Jeans</option>
                    <option value="pullover">Pullover</option>
                  </optgroup>
                  <option value="kids">Kids</option>
                  <option value="fashion">Fashion</option>
                  <optgroup label="Sportwear">
                    <option value="shoes">Shoes</option>
                    <option value="bags">Bags</option>
                    <option value="pants">Pants</option>
                    <option value="swimwear">Swimwear</option>
                    <option value="bicycles">Bicycles</option>
                  </optgroup>
                  <option value="bags">Bags</option>
                  <option value="shoes">Shoes</option>
                  <option value="hoseholds">HoseHolds</option>
                  <optgroup label="Technology">
                    <option value="tv">TV</option>
                    <option value="camera">Camera</option>
                    <option value="speakers">Speakers</option>
                    <option value="mobile">Mobile</option>
                    <option value="pc">PC</option>
                  </optgroup>
                </select> -->
                <select class="form-control input-lg" id="exampleFormControlSelect1">
                  <option value="all">All Categories</option>
                  <optgroup label="Mens">
                  <option value="shirts">Shirts</option>
                  <option value="coats-jackets">Coats & Jackets</option>
                  <option value="underwear">Underwear</option>
                  <option value="sunglasses">Sunglasses</option>
                  <option value="socks">Socks</option>
                  <option value="belts">Belts</option>
                </optgroup>
                </select>
              </div>

              <div class="col-sm-3">
                <input type="submit" class="btn btn-default btn-block btn-lg" value="Search">
              </div>
            </div>
          </form>
        </div>

        <div class="col-sm-2 vertical-align header-items hidden-xs">
          <div class="header-item mr-5">
            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wishlist"> <i class="fa fa-heart"></i> <sub>32</sub> </a>
          </div>
          <div class="header-item">
            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"> <i class="fa fa-refresh"></i> <sub>2</sub> </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- End Middle Top Bar -->

  <nav class="navbar navbar-custom navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse p-md-0" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>