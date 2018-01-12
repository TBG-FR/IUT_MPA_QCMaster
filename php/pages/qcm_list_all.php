<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');
    require_once('../includes/student_only.php');

    $db=new Database();

?>

<!-- ----- ----- 'qcm_list.php' ~ Displays a list with all public QCMs ----- ----- -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Liste des QCM</title>

        <?php include_once('../includes/head.inc.php'); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php include_once('../includes/header.inc.php'); ?>
            <?php include_once('../includes/navbar.inc.php'); ?>
        </header>
           
        <div class="content">
            <ul class="qcm_list student">
            
                <?php
                
                $db->query('SELECT * FROM '. TABLE_QCM);
                $rows = $db->resultset();
            
                foreach ($rows as $row){
                    
                    echo "
                    <li class='list_element student'>
                    
                        <span class='col-lg-2 topic'>".$row['topic']."</span>
                        <span class='col-lg-7 name'>".$row['title']."</span>
                        <span class='col-lg-3 button'>
                            <a href='qcm_answer.php?id=".$row['id']."' class='btn btn-primary' role='button'>Répondre à ce QCM</a>
                        </span>
                        
                    </li>";
                }
                
                ?>
                
                <a class="btn btn-lg btn-primary" href="student_home.php">Retour à l'accueil Étudiant</a>
                
            </ul>
          
        </div>

        <footer>
            <?php include_once('../includes/footer.inc.php'); ?>
        </footer>

    </body>

</html>