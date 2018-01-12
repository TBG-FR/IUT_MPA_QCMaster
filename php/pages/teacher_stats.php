<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');
    require_once('../includes/teacher_only.php');

    //$db=new Database();
?>

<!-- ----- ----- 'student_results.php' ~ Homepage ----- ----- -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Consulter les Statistiques</title>

        <?php include_once('../includes/head.inc.php'); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php include_once('../includes/header.inc.php'); ?>
            <?php include_once('../includes/navbar.inc.php'); ?>
        </header>

        <div class="content">
            
            STATS_PAGE /* TODO */
                => LIST WITH LINKS TO ONE PAGE FOR EACH QCM, READING ALL STATS ?
            
        </div>

        <footer>
            <?php include_once('../includes/footer.inc.php'); ?>
        </footer>

    </body>

</html>