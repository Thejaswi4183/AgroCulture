<?php
session_start();

if ($_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: error.php");
} else {
    $active = $_SESSION['Active'];
}
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>Profile: <?php echo $_SESSION['Username']; ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="../login.css" />
    <script src="../js/jquery.min.js"></script>
    <script src="../js/skel.min.js"></script>
    <script src="../js/skel-layers.min.js"></script>
    <script src="../js/init.js"></script>
    <link rel="stylesheet" href="../css/skel.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style-xlarge.css" />
    <link rel="stylesheet" type="text/css" href="../indexFooter.css">
</head>

<body>

    <?php
    require 'menu.php';
    ?>

    <section id="one" class="wrapper style1 align">
        <div class="inner">
            <div class="box">
                <header>

                    <center>

                        <?php
                        if (!$active) {
                            ?>
                            <h4 style="margin:5px;background: red;color: white;display: inline-block;padding: 5px 10px;"><?php echo
                                "<div>
                            Account is not verified! Please confirm your email by clicking
                            on the link sent to your mail!
                         </div>";
                        }
                        ?>
                        </h4>
                        <p></p>
                            <span><img
                                    src="<?php echo '../images/profileImages/' . $_SESSION['picName'] . '?' . mt_rand(); ?>"
                                    class="image-circle" class="img-responsive" height="200%"></span>
                            <br>
                            <h2><?php echo $_SESSION['Name']; ?></h2>
                            <h4 style="color: black;"><?php echo $_SESSION['Username']; ?></h4>
                            <br>
                            <div class="3u 12u$(large)">
                                <a href="logout.php" class="btn btn-danger" style="text-decoration: none;">LOGOUT</a>
                            </div>
                    </center>

                </header>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <b>
                            <font size="+1" color="black">Email ID : </font>
                        </b>
                        <font size="+1"><?php echo $_SESSION['Email']; ?></font>
                    </div>

                    <div class="col-sm-3">
                        <b>
                            <font size="+1" color="black">Mobile No : </font>
                        </b>
                        <font size="+1"><?php echo $_SESSION['Mobile']; ?></font>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <b>
                            <font size="+1" color="black">ADDRESS : </font>
                        </b>
                        <font size="+1"><?php echo $_SESSION['Addr']; ?></font>
                    </div>
                    <div class="col-sm-3"></div>

                </div>

                <div class="12u$">
                    <centre>
                        <div class="row uniform">

                            <div class="col-sm-3"></div>
                            <div class="3u 12u$(large)">
                                <a href="profileEdit.php" class="btn btn-primary" style="text-decoration: none;">Edit
                                    Profile</a>

                            </div>
                    </centre>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php require '../footer.php'; ?>	
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>



</body>

</html>