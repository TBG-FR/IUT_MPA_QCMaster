<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');

?>

<!-- ----- ----- '404.php' ~ Error 404 (Page not found) page ----- ----- -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Page non trouvée (404)</title>

        <?php include_once('../includes/head.inc.php'); // Make all the CSS & JavaScript links ?>

    </head>

    <body>
        
        <header>
            <?php include_once('../includes/header.inc.php'); ?>
            <?php include_once('../includes/navbar.inc.php'); ?>
        </header>

        <div class="content">
            
            <p class="title">404.php - Title<br /></p>

            <p class="text">
                404.php - Text<br />
            </p>
            
        </div>

        <footer>
            <?php include_once('../includes/footer.inc.php'); ?>
        </footer>

    </body>

</html>