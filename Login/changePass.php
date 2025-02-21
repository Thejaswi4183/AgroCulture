<?php
session_start();
require '../db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $currentPassword = dataFilter($_POST['current_password']);
    $newPassword = dataFilter($_POST['new_password']);
    $confirmPassword = dataFilter($_POST['confirm_password']);
    $userId = $_SESSION['id']; // Assuming the user is logged in and their ID is stored in session

    // Fetch user data from the database
    $sql = "SELECT * FROM buyer WHERE bid='$userId'";
    $result = mysqli_query($conn, $sql);
    
    if ($result->num_rows == 0) {
        $_SESSION['message'] = "User not found!";
        header("location: ../Login/error.php");
        exit();
    }

    $user = $result->fetch_assoc();

    // Verify current password
    if (!password_verify($currentPassword, $user['bpassword'])) {
        $_SESSION['message'] = "Current password is incorrect!";
        header("location: error.php");
        exit();
    }

    // Check if new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        $_SESSION['message'] = "New password and confirm password do not match!";
        header("location: error.php");
        exit();
    }

    // Hash the new password
    $newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT);

    // Update the password in the database
    $updateSql = "UPDATE buyer SET bpassword='$newPasswordHash' WHERE bid='$userId'";

    if (mysqli_query($conn, $updateSql)) {
        $_SESSION['message'] = "Password changed successfully!";
        header("location: success.php");
    } else {
        $_SESSION['message'] = "Error occurred while changing password. Please try again!";
        header("location: error.php");
    }
}

// Function to sanitize user input
function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
