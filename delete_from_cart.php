<?php
session_start();
require 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == 0) {
    $_SESSION['message'] = "You need to first login to access this page!";
    header("Location: Login/error.php");
    exit;
}

$bid = $_SESSION['id'];  // Get the logged-in user's ID

if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];  // Get the product ID to delete

    // Prepare SQL to delete the product from the cart
    $sql = "DELETE FROM mycart WHERE bid = '$bid' AND pid = '$pid'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Product removed from cart!";
    } else {
        $_SESSION['message'] = "Failed to remove product from cart!";
    }
    
    // Redirect to the cart page
    header("Location: cart.php");  // Redirect to the cart page to show updated cart
    exit;
} else {
    $_SESSION['message'] = "Invalid request!";
    header(header: "Location: cart.php");
    exit;
}
?>
