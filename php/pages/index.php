<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');

?>

<!-- ----- ----- 'index.php' ~ Homepage ----- ----- -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Questionnaires à choix multiples</title>

        <?php include_once('../includes/head.inc.php'); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php include_once('../includes/header.inc.php'); ?>
            <?php include_once('../includes/navbar.inc.php'); ?>
        </header>

        <div class="content">
            
            <a class="title btn btn-lg btn-primary" href="php/pages/student_home.php">Étudiant</a>
            
            <a class="title btn btn-lg btn-secondary" href="php/pages/teacher_home.php">Enseignant</a>
            
        </div>

        <footer>
            <?php include_once('../includes/footer.inc.php'); ?>
        </footer>

    </body>

</html>