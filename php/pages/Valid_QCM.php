<?php
require_once('../includes/all.inc.php');
$db=new Database();?>
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
        <?php
            //var_dump($_POST);
            
            /*foreach($_POST as $key => $row){
                echo 'question num '.$key."</br>";
                //var_dump($row);
                foreach ($row as $ans){
                    echo 'reponse num '.$ans. "</br>";
                }
                echo '</br>';
            }*/
            
            
            $repQCM=$_SESSION['current_qcm'];
            
            foreach ($repQCM->getQuestions() as $question){
                
                foreach ($question->getAnswers() as $answer){
                    if(isset($_POST[$question->getID()])){
                        if( in_array($answer->getID(), $_POST[$question->getID()])){
                            $answer->setCorrect(1);
                        }
                        else {
                             $answer->setCorrect(0);
                        }
                    } else {
                        $answer->setCorrect(0);
                    }
                }
            }
            
            $repQCM->display();
            
            
            
        ?>
    </body>
</html>
