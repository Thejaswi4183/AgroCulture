<?php
session_start();
require 'db.php';
if (!isset($_SESSION['logged_in']) or $_SESSION['logged_in'] != 1) {
  $_SESSION['message'] = "You have to Login to view this page!";
  header("Location: Login/error.php");
}

$fid = $_SESSION['id'];  // User ID from session

// Fetch products for the logged-in user (based on fid)
$sql = "SELECT * FROM fproduct WHERE fid = '$fid'";
$result = mysqli_query($conn, $sql);

if (!$result) {
  $_SESSION['message'] = "Error fetching products!";
  header("Location: Login/error.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Manage Products: <?php echo $_SESSION['Username']; ?></title>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link rel="stylesheet" href="login.css" />
  <script src="js/jquery.min.js"></script>
  <script src="js/skel.min.js"></script>
  <script src="js/skel-layers.min.js"></script>
  <script src="js/init.js"></script>
  <link rel="stylesheet" href="/css/skel.css" />
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/style-xlarge.css" />
  <link rel="stylesheet" href="indexfooter.css" />

</head>

<body>
  <?php require 'menu.php'; ?>

  <section id="one" class="wrapper style1 align-center">
    <div class="container">
      <h2>Manage Your Products</h2>
      <table class="table table-bordered">
        <thead class="bg-info">
          <tr>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="bg-primary text-light">
          <?php
          // Check if the user has any products
          if (mysqli_num_rows($result) > 0) {
            while ($product = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $product['product'] . "</td>";
              echo "<td>" . $product['pcat'] . "</td>";
              echo "<td>" . $product['price'] . "</td>";
              echo "<td>
                            <a href='updateProduct.php?pid=" . $product['pid'] . "' class='btn btn-warning'>Edit</a>
                            <a href='deleteProduct.php?pid=" . $product['pid'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a>
                          </td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='4'>You have no products listed.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.scrolly.min.js"></script>
  <script src="assets/js/jquery.scrollex.min.js"></script>
  <script src="assets/js/skel.min.js"></script>
  <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>
</body>
<!-- Footer -->
<footer class="footer-distributed" style="background-color:black" id="aboutUs">
  <center>
    <h1 style="font: 35px calibri;">About Us</h1>
  </center>
  <div class="footer-left">
    <h3 style="font-family: 'Times New Roman', cursive;">AgroCulture &copy; </h3>
    <br />
    <p style="font-size:20px;color:white">Your product Our market !!!</p>
    <br />
  </div>

  <div class="footer-center">
    <div>
      <i class="fa fa-map-marker"></i>
      <p style="font-size:20px">Agro Culture Fam</p>
    </div>
    <div>
      <i class="fa fa-phone"></i>
      <p style="font-size:20px">9731859761</p>
    </div>
    <div>
      <i class="fa fa-envelope"></i>
      <p style="font-size:20px"><a href="mailto:agroculture@gmail.com" style="color:white">thejaswi4uns@gmail.com</a>
      </p>
    </div>
  </div>

  <div class="footer-right">
    <p class="footer-company-about" style="color:white">
      <span style="font-size:20px"><b>About AgroCulture</b></span>
      AgroCulture is e-commerce trading platform for grains & grocerries...
    </p>
    <div class="footer-icons">
      <a href="#"><i style="margin-left: 0;margin-top:5px;" class="fa fa-facebook"></i></a>
      <a href="#"><i style="margin-left: 0;margin-top:5px" class="fa fa-instagram"></i></a>
      <a href="#"><i style="margin-left: 0;margin-top:5px" class="fa fa-youtube"></i></a>
    </div>
  </div>

</footer>

</html>