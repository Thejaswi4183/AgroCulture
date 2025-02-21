<?php
    session_start();
    require 'db.php';

    $rating = $_POST['rating'];
    $review = $_POST['comment'];
    $name = $_SESSION['Name'];
    $pid = $_GET['pid'];

    // echo $rating.$review.$pid.$name;
    $sql = "INSERT INTO review(pid,name,comment)
            VALUES('$pid','$name', '$review')" ;

    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        echo "Error!!";
    }
    else {
        header("Location: review.php?pid=".$pid);
    }

?>
