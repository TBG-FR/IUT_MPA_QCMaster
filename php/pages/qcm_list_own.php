<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');
    //require_once('../includes/teacher_only.php'); /* TODO */

    $db=new Database();

?>

<!-- ----- ----- 'qcm_list.php' ~ Displays a list with all user's QCMs ----- ----- -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Liste de vos QCM</title>

        <?php include_once('../includes/head.inc.php'); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php include_once('../includes/header.inc.php'); ?>
            <?php include_once('../includes/navbar.inc.php'); ?>
        </header>
           
        <div class="content">
            <ul class="qcm_list teacher">
            
                <?php
                
                
                //$db->query('SELECT * FROM '. TABLE_QCM . ' WHERE id_teacher = :id'); /* TODO */            
                $db->query('SELECT * FROM '. TABLE_QCM . ' WHERE 1 = 1');               
                $db->bind(':id', $_SESSION['user']->getID());
                
                $rows = $db->resultset();
            
                foreach ($rows as $row){
                    
                    echo "
                    <li class='list_element teacher'>
                    
                        <span class='col-lg-2 topic'>".$row['topic']."</span>
                        <span class='col-lg-7 name'>".$row['title']."</span>
                        <span class='col-lg-3 button'>
                            <a href='qcm_edit.php?id=".$row['id']."' class='btn btn-warning' role='button'>Modifier ce QCM</a>
                        </span>
                        <span class='col-lg-3 button'>
                            <a href='qcm_remove.php?id=".$row['id']."' class='btn btn-danger' role='button'>Supprimer ce QCM</a>
                        </span>
                        
                    </li>";
                }
                
                ?>
                
                <a class="btn btn-lg btn-primary" href="teacher_home.php">Retour à l'accueil Enseignant</a>
                
            </ul>
          
        </div>

        <footer>
            <?php include_once('../includes/footer.inc.php'); ?>
        </footer>

    </body>

</html>