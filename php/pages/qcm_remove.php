<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');
    require_once('../includes/teacher_only.php'); /* TODO */

    $db=new Database();

?>

<!-- ----- ----- 'qcm_remove.php' ~ Allows QCM deletion ----- ----- -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Suppression de QCM</title>

        <?php include_once('../includes/head.inc.php'); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php include_once('../includes/header.inc.php'); ?>
            <?php include_once('../includes/navbar.inc.php'); ?>
        </header>
           
        <div class="content">
            
                <?php
                
                if(isset($_GET['id'])) {
                    
                    $db->query('SELECT * FROM '. TABLE_QCM . ' WHERE id_teacher = :id');        
                    $db->bind(':id', $_SESSION['user']->getID());                
                    $rows = $db->resultset();
                    
                    $found = false;                
                    foreach ($rows as $row){ if($row['id'] == $_GET['id']) { $found = true; } }
                    
                    if($found) {
                        
                        $backup = QCM::ConstructFromDB($_GET['id']);
                        
                        $db->query('DELETE FROM ' . TABLE_QCM . ' WHERE id = :id');
                        //Next we need to bind the data to the placeholders.
                        $db->bind(':id', $_GET['id']);
                        $db->execute();
                        
                        echo "<p class='message'>Suppression effectuée avec succès, affichage des informations du QCM supprimé...</p>";
                        
                        $QCM_info = "----- ----- QCM N°" . $backup->getID() ." - " . $backup->getTopic() ." - " . $backup->getTitle() . " ----- -----<br/><br/>";

                        // Generates the detailed questions/answers information
                        foreach ($backup->getQuestions() as $question){

                            $QCM_info .= "Q" . $question->getID() . " ----- " . $question->getTitle() . "<br/>";

                            foreach ($question->getAnswers() as $answer){

                                $QCM_info .= "    Réponse " . $answer->getIDtxt() . ": " . $answer->getProposition() . "<br/>";

                            }

                            $QCM_info .= "<br/><br/>";


                        }
                        
                        
                        echo "<div class='info'> $QCM_info </div>";
                    
                    }
                    
                    else { echo "<p>Vous essayez de supprimer un QCM qui ne vous appartient pas ou qui n'existe pas</p>"; }
                
                }
                
                else { echo "<p>Vous essayez de supprimer un QCM sans en avoir selectionné un</p>"; }
                
                ?>
                
                <a class="btn btn-lg btn-primary" href="qcm_list_own.php">Retour à la liste de vos QCM</a>
                <a class="btn btn-lg btn-primary" href="teacher_home.php">Retour à l'accueil Enseignant</a>
          
        </div>

        <footer>
            <?php include_once('../includes/footer.inc.php'); ?>
        </footer>

    </body>

</html>