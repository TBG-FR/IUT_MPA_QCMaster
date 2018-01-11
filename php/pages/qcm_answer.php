<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');
    $db=new Database();

}

?>

<!-- ----- ----- 'qcm_answer.php' ~ Page for answering to a QCM ----- ----- -->

<?php /* ----- Errors management for this page ----- */

    if($_GET) { $_SESSION['current_qcm'] = QCM::ConstructFromDB($_GET['id']); }

    else { /* TODO : REDIRECT TO 404 */ }
    
?>

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Réponse à un QCM</title>

        <?php include_once('../includes/head.inc.php'); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php include_once('../includes/header.inc.php'); ?>
            <?php include_once('../includes/navbar.inc.php'); ?>
        </header>
        
        <div class="content">
            
            
            
            <form action="Valid_QCM.php" method="POST">
                <?php
                        foreach ($_SESSION['current_qcm']->getQuestions() as $question){
                            echo '<div class="question hline-bottom"><label class="question_title">'.$question->getTitle().'</label>';
                            foreach ($question->getAnswers() as $answer){
                                echo '<div class="form-check "><label class="form-check-label"><input class="form-check-input" type="checkbox" name="'.$question->getID().'[]" value="'.$answer->getID().'">'.$answer->getProposition().'</label></div>';
                            }
                            echo '</div>';
                        }
                
                
                
                        
                
                
                ?>
                <a href="liste_qcm.php" class="btn btn-outline-secondary" role="button" >Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
                
                
            </form>
            
        </div>

        <footer>
            <?php //include_once("footer.php"); ?>
        </footer>

    </body>

</html>