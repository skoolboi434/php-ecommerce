<?php 

// Connect to DB

$conn = mysqli_connect('localhost', 'admin', 'password1234', 'ecommerce');

// Check connection

if(!$conn){
  echo 'Connection error: ' . mysqli_connect_error();
}

?>