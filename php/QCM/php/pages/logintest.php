<?php

// Place here the included/required files instructions
require_once('../includes/all.inc.php');

?>

<!-- 'index.php' ~ Homepage -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - TESTS</title>

        <?php //include_once("head.php"); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php //include_once("header.php"); ?>
            <?php //include_once("navbar.php"); ?>
        </header>

        <div class="content">

            <?php


            $db = new Database();
            
            //var_dump($db);

            ?>

        </div>

        <footer>
            <?php //include_once("footer.php"); ?>
        </footer>

    </body>

</html>