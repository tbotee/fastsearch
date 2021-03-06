<?php
    global $bootStrap;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <link href="css/fontawesome/all.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <title><?php $bootStrap->renderTitle();?></title>
    </head>
    <body>
        <?php
            $bootStrap->renderBody();
        ?>

        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <?php
            $bootStrap->renderScripts();
        ?>
    </body>
</html>