<?php
if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);  // Clear the message after displaying it
}
header("Location: myCart.php")
?>
