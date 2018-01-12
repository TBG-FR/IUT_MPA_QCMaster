<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');
    require_once('../includes/student_only.php');

    //$db=new Database();
?>

<!-- ----- ----- 'student_results.php' ~ Page dislaying the results of a Student ----- ----- -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Consulter ses Résultats</title>

        <?php include_once('../includes/head.inc.php'); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php include_once('../includes/header.inc.php'); ?>
            <?php include_once('../includes/navbar.inc.php'); ?>
        </header>

        <div class="content">
            
            RESULTS_PAGE /* TODO */
                => LIST WITH LINKS TO ONE PAGE FOR EACH QCM/TXT FILE ?
            
        </div>

        <footer>
            <?php include_once('../includes/footer.inc.php'); ?>
        </footer>

    </body>

</html>