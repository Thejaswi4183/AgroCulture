<?php
session_start();
require 'db.php';

// Ensure the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: Login/login.php");
    exit();
}

// Check if product ID (pid) is provided for editing
if (!isset($_GET['pid'])) {
    $_SESSION['message'] = "No product selected for editing!";
    header("Location: market.php");
    exit();
}

$pid = $_GET['pid'];
$fid = $_SESSION['id'];  // User ID from session

// Fetch product details from the database
$sql = "SELECT * FROM fproduct WHERE pid = '$pid' AND fid = '$fid'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    $_SESSION['message'] = "Product not found or you do not have permission to edit it!";
    header("Location: market.php");
    exit();
}

$product = mysqli_fetch_assoc($result);

// Handle form submission for updating the product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $productType = $_POST['type'];
    $productName = dataFilter($_POST['pname']);
    $productInfo = $_POST['pinfo'];
    $productPrice = dataFilter($_POST['price']);

    // Handle image upload
    if ($_FILES['productPic']['error'] == 0) {
        $pic = $_FILES['productPic'];
        $picName = $pic['name'];
        $picTmpName = $pic['tmp_name'];
        $picExt = explode('.', $picName);
        $picActualExt = strtolower(end($picExt));
        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($picActualExt, $allowed)) {
            $newPicName = $productName . "." . $picActualExt;
            $picDestination = "images/productImages/" . $newPicName;
            move_uploaded_file($picTmpName, $picDestination);
        } else {
            $_SESSION['message'] = "Invalid file type!";
            header("Location: updateProduct.php?pid=$pid");
            exit();
        }
    } else {
        // If no new image uploaded, use the existing image
        $newPicName = $_POST['currentPic'];
    }

    // Update product information in the database
    $sql = "UPDATE fproduct SET product = '$productName', pcat = '$productType', pinfo = '$productInfo', price = '$productPrice', pimage = '$newPicName' WHERE pid = '$pid' AND fid = '$fid'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Product updated successfully!";
        header("Location: market.php");
        exit();
    } else {
        $_SESSION['message'] = "Error updating product!";
        header("Location: Login/error.php");
        exit();
    }
}

// Sanitize form data
function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Product - <?php echo $_SESSION['Username']; ?></title>
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
    <link rel="stylesheet" href="/css/style-xlarge.css">
    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

</head>

<body>
    <?php require 'menu.php'; ?>

    <section id="one" class="wrapper style1 align-center">
        <div class="container">
            <h2>Edit Product Information</h2>

            <form method="POST" action="updateProduct.php?pid=<?php echo $pid; ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="select-wrapper" style="width: auto">
                            <select name="type" id="type" required style="background-color:white;color: black;">
                                <option value="Fruit" <?php if ($product['pcat'] == 'Fruit')
                                    echo 'selected'; ?>>Fruit
                                </option>
                                <option value="Vegetable" <?php if ($product['pcat'] == 'Vegetable')
                                    echo 'selected'; ?>>
                                    Vegetable</option>
                                <option value="Grains" <?php if ($product['pcat'] == 'Grains')
                                    echo 'selected'; ?>>Grains
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <input type="text" name="pname" id="pname" value="<?php echo $product['product']; ?>"
                            placeholder="Product Name" style="background-color:white;color: black;" />
                    </div>
                </div>

                <br>

                <div>
                    <textarea name="pinfo" id="pinfo" rows="12"><?php echo $product['pinfo']; ?></textarea>
                </div>

                <br>

                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="price" id="price" value="<?php echo $product['price']; ?>"
                            placeholder="Price" style="background-color:white;color: black;" />
                    </div>
                    <div class="col-sm-6">
                        <button class="button fit" style="width:auto; color:black;">Update Product</button>
                    </div>
                </div>

                <br>

                <div>
                    <label for="productPic">Product Image (optional):</label>
                    <input type="file" name="productPic" id="productPic" />
                    <br />
                    <img src="images/productImages/<?php echo $product['pimage']; ?>" alt="Current Product Image"
                        style="max-width: 100px; max-height: 100px; margin-top: 10px;" />
                    <input type="hidden" name="currentPic" value="<?php echo $product['pimage']; ?>" />
                </div>
            </form>
        </div>
    </section>

    <script>


        CKEDITOR.replace('pinfo');;

    </script>

</body>

</html>