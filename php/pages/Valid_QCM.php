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
        
        /* ----- ----- ----- Convert that Answer to TXT file ----- ----- ----- */
        
        // 'result_[QCM_ID]_[TryNumber]' (ex: If I answer the QCM #2 for the third time, it'll be 'result_3_2.txt')
        // TO IMPLEMENT : TRY + USERNAME + ?
        // TRY NUMBER IN THE SAME FILE ?
        $filename = "results/user/result_" . $_SESSION['current_qcm']->getID() . ".txt";
        
        $result_file = fopen($filename, 'a');
        
        $txt_separator = "\r" . "----- ----- Other Try ----- -----" . "\r";
        fwrite($result_file, $txt_separator);
        
        foreach ($repQCM->getQuestions() as $question){
            
            /* QUESTION */
                
                foreach ($question->getAnswers() as $answer){
                    
                    /* REPONSES */
                    
                }
            }
        
        echo"<h3>EOF</h3>";
        
        var_dump($_SESSION['current_qcm']);
            
            
        ?>
    </body>
</html>
