<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');

    $db = new Database();

?>


<!-- ----- ----- 'teacher_home.php' ~ Homepage for Teachers ----- ----- -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Espace Enseignant</title>

        <?php include_once('../includes/head.inc.php'); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php include_once('../includes/header.inc.php'); ?>
            <?php include_once('../includes/navbar.inc.php'); ?>
        </header>

        <div class="content">
            
            /* TODO : COPY THE CONTENT OF 'student_home.php' AND ADAPT IT */
            
        </div>

        <footer>
            <?php include_once('../includes/footer.inc.php'); ?>
        </footer>

    </body>

</html>