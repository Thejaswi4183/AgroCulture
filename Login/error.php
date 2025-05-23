<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>AgroCulture</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="../bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../bootstrap\js\bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
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

        <section id="banner" class="wrapper">
            <div class="container">
                <header class="major">
                    <h2>ERROR</h2>
                </header>
                <p>
                    <?php
                        // Check if HTTP_REFERER is set, otherwise default to index page
                        $page = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../index.php';
                        
                        if(isset($_SESSION['message']) AND !empty($_SESSION['message']))
                        {
                            echo $_SESSION['message'];
                        }
                        else
                        {
                            header("Location: ../index.php");
                            exit; // Add exit after redirect to prevent further execution
                        }
                    ?>
                </p><br />
                <a href ="<?= $page ?>" class="button special">Retry</a>
            </div>
        </section>

    	<?php $_SESSION['message'] = ""; ?>
        <?php require '../footer.php'; ?>	
    </body>
</html>
