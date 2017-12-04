<?php
    require_once('../includes/all.inc.php');
    
    if(isset($_SESSION['current_qcm']) == FALSE) {
        
        $_SESSION['current_qcm'] = QCM::ConstructFromScratch();
        
    }
    
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <header>
            <?php //include_once("header.php"); ?>
            <?php //include_once("navbar.php"); ?>
        </header>
        
        <div class="content">
            
            
                        
            
            <form action="Create_QCM.php" method="POST">
                <?php
                        foreach ($_SESSION['current_qcm']->getQuestions() as $question){
                            echo '<div class="form-group"><label for="inputFor'.$question->getID().'">Le titre de votre question</label><input type="text" class="form-control" id="formGroupExampleInput" value="'.$question->getTitle().'"></div>';
                            foreach ($question->getAnswers() as $answer){
                                //echo '<div class="form-check "><label class="form-check-label"><input class="form-check-input" type="text" name="'.$question->getID().'[]" value="'.$answer->getID().'">'.$answer->getProposition().'</div>';
                            }
                            echo '</div>';
                        }
                
                
                
                        
                
                
                ?>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                
                
            </form>
            
        </div>

        <footer>
            <?php //include_once("footer.php"); ?>
        </footer>
    </body>
</html>
