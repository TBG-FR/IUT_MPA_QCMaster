<?php

// Place here the included/required files instructions
require_once('../includes/all.inc.php');

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        /* Makes all the CSS & Javascript links */
        include_once("../includes/head.inc.php");
        ?>
        
        <?php
            /*$a=new Answer(1,false,"cette réponse est fausse");
            $b=new Answer(2,true,"cette réponse est vraie");
            $c=new Answer(3,false,"cette réponse est fausse");
            
            $question= new Question(01,"je suis le titre de la question");
            $question->addAnswer($a);
            $question->addAnswer($b);
            $question->addAnswer($c);
            */
            
            
            $QCM1=new QCM();/*
            $QCM1->constructFromScratch();
            $QCM1->addQuestion($question);
            $QCM1->setTitle("QCM test");
            $QCM1->setTopic("test");
            
            $questiontest=$QCM1->getQuestions();
            
            echo $QCM1->getTitle()."<br/>";
            echo 'le sujet de ce qcm est : '.$QCM1->getTopic().'<br/><br/>';
            
            var_dump($QCM1->getQuestions());
           */
            
        
            $qcm=new QCM();
            $qcm->constructFromDB(2);
            
            $qcm->display();
        
        
            
        ?>
    </body>
</html>
