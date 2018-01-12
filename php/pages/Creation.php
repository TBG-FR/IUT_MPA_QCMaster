<?php
    
    require_once('../includes/all.inc.php');
    
    //unset($_SESSION['current_qcm']);
    
    if(isset($_SESSION['current_qcm']) == FALSE) {
        
        $_SESSION['current_qcm'] = QCM::ConstructFromScratch();
        
    }
    
    
    if(isset($_POST['addQuestion'])){
        
        $_SESSION['current_qcm']->setTitle(/*SECURE*/$_POST['title']);
        $_SESSION['current_qcm']->setTopic(/*SECURE*/($_POST['topic']));
        
        $tempQ=new Question($_SESSION['current_qcm']->getNbQuestions(),"");
        $tempQ->addAnswer(new Answer(0,0,""));
        $_SESSION['current_qcm']->addQuestion($tempQ);
        
        //var_dump($_POST);
        $indexQ=0;
        $indexA=0;
        
        foreach ($_SESSION['current_qcm']->getQuestions() as $question){
            
            //var_dump($question);
            $indexA=0;
            $indexNameQ="Q".$indexQ; echo "<br/>INQ: " . $indexNameQ;
            
            $question->setID($indexQ);
            if(isset($_POST[$indexNameQ])){
            $question->setTitle(/*SECURE*/($_POST[$indexNameQ]));
            }
            foreach ($question->getAnswers() as $answer){
                
                //var_dump($answer);
                $indexNameA="Q".$indexQ."A".$indexA; echo "<br/>INA: " . $indexNameA;
                
                $answer->setID($indexA);
                if(isset($_POST[$indexNameA])){
                $answer->setProposition(/*SECURE*/($_POST[$indexNameA]));
                }
                $indexCheck=$indexNameA."C";
                if(isset($_POST[$indexCheck])){
                    if($_POST[$indexCheck]=='on'){
                        $answer->setCorrect(1);
                    }
                }
                else{
                        $answer->setCorrect(0);
                }
                
                $indexA++;
                //echo $indexA;
            }
            
            
            $indexQ++;
            //echo $indexQ;
            //echo $indexNameA;
            
        }
        
                
        
        //var_dump($_SESSION['current_qcm']);
    }

    foreach($_SESSION['current_qcm']->getQuestions() as $question){
        
        if(isset($_POST['title'])){
        $_SESSION['current_qcm']->setTitle(/*SECURE*/$_POST['title']);
        }
        if(isset($_POST['topic'])){
        $_SESSION['current_qcm']->setTopic(/*SECURE*/($_POST['topic']));
        }
        
        $temp='addAnswers'.$question->getID();
        if(isset($_POST[$temp])){
            $newQuest=new Answer($question->getNbAnswers(),0,"");
            $question->addAnswer($newQuest);
        }
        
        $indexQ=0;
        $indexA=0;
        
        foreach ($_SESSION['current_qcm']->getQuestions() as $question){
            
            //var_dump($question);
            $indexA=0;
            $indexNameQ="Q".$indexQ; //echo "<br/>INQ: " . $indexNameQ;
            
            $question->setID($indexQ);
            if(isset($_POST[$indexNameQ])){
            $question->setTitle(/*SECURE*/($_POST[$indexNameQ]));
            }
            foreach ($question->getAnswers() as $answer){
                
                //var_dump($answer);
                $indexNameA="Q".$indexQ."A".$indexA; //echo "<br/>INA: " . $indexNameA;
                
                $answer->setID($indexA);
                if(isset($_POST[$indexNameA])){
                $answer->setProposition(/*SECURE*/($_POST[$indexNameA]));
                }
                $indexCheck=$indexNameA."C";
                if(isset($_POST[$indexCheck])){
                    if($_POST[$indexCheck]=='on'){
                        $answer->setCorrect(1);
                    }
                }
                else{
                        $answer->setCorrect(0);
                }
                
                $indexA++;
                //echo $indexA;
            }
            
            
            $indexQ++;
            //echo $indexQ;
            //echo $indexNameA;
            
        }
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
            
            
                        
            
            <form action="" method="POST">
                <?php
                    echo '<div class="form-group">'
                . '         <label for="inputFor'.$_SESSION['current_qcm']->getID().'">Le titre de votre QCM</label>
                            <input type="text" name="title" class="form-control" id="titleInput" placeholder="Votre titre" value="'.$_SESSION['current_qcm']->getTitle().'">
                          </div>';
                    
                    echo '<div class="form-group">
                            <label for="inputFor'.$_SESSION['current_qcm']->getID().'">Le thème de votre QCM</label>
                            <input type="text" name="topic" class="form-control" id="topicInput" placeholder="Votre thème" value="'.$_SESSION['current_qcm']->getTopic().'">
                          </div></br>';
                    
                    echo'<button type="submit" class="btn btn-primary" name="addQuestion">Ajouter une question</button>';
                    
                        foreach ($_SESSION['current_qcm']->getQuestions() as $question){
                            
                            echo'<fieldset class=form-group>';
                            echo '<div class="form-group">
                                    <label for="inputForQ'.$question->getID().'">Le titre de votre question</label>
                                    <input type="text" class="form-control" name="Q'.$question->getID().'" id="questionInput" value="'.$question->getTitle().'">
                                  </div><br/>';
                            
                            foreach ($question->getAnswers() as $answer){
                                echo'<button type="submit" class="btn btn-primary" name="addAnswers'.$question->getID().'">Ajouter une réponse</button>';
                                echo '<div class="form-group row ">
                                        <label class="form-group-label">L\' intitulé de votre reponse </label>
                                        <input class="form-group-input" type="text" name="Q'.$question->getID().'A'.$answer->getID().'" value="'.$answer->getProposition().'">
                                        <label class="form-check-label"><input class="form-check-input" name="Q'.$question->getID().'A'.$answer->getID().'C" type="checkbox"'; if($answer->getCorrect()==1){echo ' checked ';}  echo'> Correct ?</label></div>';
                            }
                            echo '</div><br/>';
                            echo '</fieldset>';
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
