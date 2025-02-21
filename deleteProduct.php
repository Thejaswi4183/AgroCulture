<?php
  session_start();
  require 'db.php';

  // Ensure the user is logged in
  if (!isset($_SESSION['id'])) {
      header("Location: login.php");
      exit();
  }

  // Check if product ID is provided for deletion
  if (!isset($_GET['pid'])) {
      $_SESSION['message'] = "No product selected for deletion!";
      header("Location: market.php");
      exit();
  }

  $pid = $_GET['pid'];
  $fid = $_SESSION['id'];  // User ID from session

  // Delete product from the database
  $sql = "DELETE FROM fproduct WHERE pid = '$pid' AND fid = '$fid'";
  $result = mysqli_query($conn, $sql);

  if (!$result) {
      $_SESSION['message'] = "Error deleting product!";
      header("Location: Login/error.php");
      exit();
  }

  $_SESSION['message'] = "Product deleted successfully!";
  header("Location: manageProducts.php");
  exit();
?>
