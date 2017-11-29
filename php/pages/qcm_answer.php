<?php

    // Place here the included/required files instructions
require_once('../includes/all.inc.php');
$db=new Database();

if($_GET){
    
    /*
    $db->$db->query('SELECT * FROM '. TABLE_QCM .' WHERE id_QCM = :id');
    $db->bind(':id', $_GET['id']);
    $rows = $db->resultset();*/

    $_SESSION['current_qcm'] = QCM::ConstructFromDB($_GET['id']);

}



?>

<!-- 'index.php' ~ Homepage -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Questionnaires à choix multiples</title>

        <?php
        /* Makes all the CSS & Javascript links */
        include_once("../includes/head.inc.php");
        ?>

    </head>

    <body>

        <header>
            <?php //include_once("header.php"); ?>
            <?php //include_once("navbar.php"); ?>
        </header>
        
        <div class="content">
            <form>
                <?php
                        foreach ($_SESSION['current_qcm']->getQuestions() as $question){
                            echo '<div class="question hline-bottom"><label class="question_title">'.$question->getTitle().'</label>';
                            foreach ($question->getAnswers() as $answer){
                                echo '<div class="form-check "><label class="form-check-label"><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">'.$answer->getProposition() .'</label></div>';
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