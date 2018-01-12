<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');

?>

<!-- ----- ----- '403.php' ~ Error 403 (Forbidden) page ----- ----- -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Accès Refusé (403)</title>

        <?php include_once('../includes/head.inc.php'); // Make all the CSS & JavaScript links ?>

    </head>

    <body>
        
        <header>
            <?php include_once('../includes/header.inc.php'); ?>
            <?php include_once('../includes/navbar.inc.php'); ?>
        </header>

        <div class="content">
            
            <div class='user message'>
            
                <p class='title'>Erreur 403 - Accès Refusé</p>
                
                <?php
                
                if(isset($_GET) && $_GET['error'] == 'teacher') { echo "
                
                    <p class='text'>Vous êtes actuellement connecté en tant qu'Enseignant, vous ne pouvez pas accéder à cette page !<p>\r
                    
                    <a class='btn btn-lg btn-block btn-primary' href='teacher_home.php'>Espace Enseignant</a>\r
                    
                    <a class='btn btn-lg btn-block btn-secondary' href='".$_SERVER['HTTP_REFERER']."'>Retour (nouvel essai)</a>\r
                    
                    <a class='btn btn-lg btn-block btn-danger' href='?action=logout'>Déconnexion (si besoin)</a>\r
                    
                "; }
                
                else if(isset($_GET) && $_GET['error'] == 'student') { echo "
                
                    <p class='text'>Vous êtes actuellement connecté en tant qu'Étudiant, vous ne pouvez pas accéder à cette page !</p>\r
                    
                    <a class='btn btn-lg btn-block btn-primary' href='student_home.php'>Espace Étudiant</a>\r
                    
                    <a class='btn btn-lg btn-block btn-secondary' href='".$_SERVER['HTTP_REFERER']."'>Retour (nouvel essai)</a>\r
                    
                    <a class='btn btn-lg btn-block btn-danger' href='?action=logout'>Déconnexion (si besoin)</a>\r
                    
                "; }
                
                else if(isset($_GET) && $_GET['error'] == 'guest') { echo "
                
                    <p class='text'>Vous êtes actuellement non-connecté, vous ne pouvez pas accéder à cette page !</p>\r
                    
                    <a class='btn btn-lg btn-block btn-primary' href='teacher_home.php'>Espace Enseignant</a>\r
                    
                    <a class='btn btn-lg btn-block btn-primary' href='student_home.php'>Espace Étudiant</a>\r
                    
                    <a class='btn btn-lg btn-block btn-secondary' href='".$_SERVER['HTTP_REFERER']."'>Retour (nouvel essai)</a>\r
                    
                "; }
                
                else { echo "
                
                    <p class='text'>L'accès à cette page vous a été refusé... Peut-être devez-vous être connecté ?</p>\r
                    
                    <a class='btn btn-lg btn-block btn-primary' href='teacher_home.php'>Espace Enseignant</a>\r
                    
                    <a class='btn btn-lg btn-block btn-primary' href='student_home.php'>Espace Étudiant</a>\r
                    
                    <a class='btn btn-lg btn-block btn-secondary' href='".$_SERVER['HTTP_REFERER']."'>Retour (nouvel essai)</a>\r
                    
                    <a class='btn btn-lg btn-block btn-danger' href='?action=logout'>Déconnexion (si besoin)</a>\r
                    
                "; }
                
                ?>
                
            
            </div>
            
        </div>

        <footer>
            <?php include_once('../includes/footer.inc.php'); ?>
        </footer>

    </body>

</html>