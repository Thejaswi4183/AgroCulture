<?php
session_start();
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>Profile: <?php echo $_SESSION['Username']; ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="login.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css">
</head>

<body class="subpage">

    <?php
    require 'menu.php';
    ?>

    <section id="post" class="wrapper bg-img" data-bg="banner2.jpg">
        <div class="inner">
            <div class="box">
                <header>
                    <span class="image left"><img
                            src="<?php echo 'images/profileImages/' . $_SESSION['picName'] . '?' . mt_rand(); ?>"
                            class="img-circle" class="img-responsive" height="200px"></span>
                    <br>
                    <h2><?php echo $_SESSION['Name']; ?></h2>
                    <h4><?php echo $_SESSION['Username']; ?></h4>
                    <br>
                    <form method="post" action="Profile/updatePic.php" enctype="multipart/form-data">
                        <input type="file" name="profilePic" id="profilePic">
                        <br>
                        <div class="12u$">
                            <input type="submit" class="button special small" name="upload" value="Upload" />
                            <input type="submit" class="button special small" name="remove" value="Remove" />
                        </div>
                    </form>
                </header>
                <form method="post" action="Profile/updateProfile.php">
                    <div class="row uniform">
                        <div class="8u 12u$(xsmall)">
                            <input type="text" name="name" id="name" value="<?php echo $_SESSION['Name']; ?>"
                                placeholder="Full Name" required />
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <input type="text" name="mobile" id="mobile" value="<?php echo $_SESSION['Mobile']; ?>"
                                placeholder="Mobile No" required />
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="uname" id="uname" value="<?php echo $_SESSION['Username']; ?>"
                                placeholder="Username" required />
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <input type="email" name="email" id="email" value="<?php echo $_SESSION['Email']; ?>"
                                placeholder="Email" required />
                        </div>
                        <div class="12u$">
                            <center>
                                <input type="submit" class="button special" value="Update Profile" />
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="change-password" class="wrapper style2 align-center">
    <div class="container">
        <h2>Change Password</h2>
        <form method="post" action="Profile/changePass.php">
            <div class="row uniform">
                <!-- Current Password -->
                <div class="12u 12u$(xsmall)">
                    <input type="password" name="current_password" id="current_password" placeholder="Current Password" required />
                </div>
                <!-- New Password -->
                <div class="12u 12u$(xsmall)">
                    <input type="password" name="new_password" id="new_password" placeholder="New Password" required />
                </div>
                <!-- Confirm New Password -->
                <div class="12u 12u$(xsmall)">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm New Password" required />
                </div>
                <!-- Submit Button -->
                <div class="12u$">
                    <center>
                        <input type="submit" class="button special" value="Change Password" />
                    </center>
                </div>
            </div>
        </form>
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

</html>