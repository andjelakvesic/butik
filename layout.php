<?php
    if(!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>H&A Butik | <?php echo $title; ?></title>
        <link href="./css/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="./css/site.css" rel="stylesheet">
        <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    </head>

    <body>
        <?php include('header.php');; ?>

        <div class="container pb-5">
            <div class="row pt-4">
                <?php include($childView); ?>
            </div>
        </div>

        <?php include('footer.php'); ?>
        
        <script src="./js/jquery/jquery.min.js"></script>
        <script src="./js/bootstrap/bootstrap.bundle.min.js"></script>

    </body>

</html>