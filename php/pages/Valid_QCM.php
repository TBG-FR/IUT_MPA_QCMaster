<?php
require_once('../includes/all.inc.php');
$db=new Database();?>
<!DOCTYPE html>

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
        
        $username = $_SESSION['user']->getFname().$_SESSION['user']->getLname();
        
        // IF the directory doesn't exist, create it
        if(is_dir("results/".$username) == false) { mkdir("results/".$username); }
        
        // 'result_[QCM_ID]_[TryNumber]' (ex: If I answer the QCM #2 for the third time, it'll be 'result_3_2.txt')
        $filename = "results/".$username."/result_" . $_SESSION['current_qcm']->getID() . ".txt";
        
        // If the file have already been generated => Simply opens the file in order to write inside it
        if (file_exists($filename)) {
            
            $result_file = fopen($filename, 'a');
            
            // Determines the id of that try, by counting the previous ones
            $try_id = substr_count(file_get_contents($filename),"Try") + 1;
        
        }
        
        // Else (if the file is new (and empty, consequently) Opens the file in order to write inside it, and writes information about the QCM
        else {
            
            // Opens the file in order to write inside it
            $result_file = fopen($filename, 'a');
        
            // Generates the separator for this QCM's information
            $QCM_info = "----- ----- QCM #" . $repQCM->getID() ." - Information ----- -----" . "\r\r";
            $QCM_info .= "QCM N°" . $repQCM->getID() ." - " . $repQCM->getTopic() ." - " . $repQCM->getTitle() . "\r\r";
        
            // Generates the detailed questions/answers information
            foreach ($repQCM->getQuestions() as $question){
            
                $QCM_info .= "Q" . $question->getID() . " ----- " . $question->getTitle() . "\n";
                
                foreach ($question->getAnswers() as $answer){
            
                    $QCM_info .= "    Réponse " . $answer->getIDtxt() . ": " . $answer->getProposition() . "\n";
                    
                }
            
                $QCM_info .= "\r";
                
                
            }
            
            // Writes the generated information into the file
            fwrite($result_file, $QCM_info);
            
            // Assigns the id at that try (which is the first)
            $try_id = 1;
        
        }
        
        // Generates the separator for this new try
        $txt_separator = "\r" . "----- ----- QCM #" . $repQCM->getID() ." - Try #$try_id ----- -----" . "\r";
        fwrite($result_file, $txt_separator);
        
        // Generates the results for this new try
        $QCM_try = "\r";
        
        foreach ($repQCM->getQuestions() as $question){
            
            /* ADD - IF condition for Answer or Answer(s) */
            $QCM_try .= "Question " . $question->getID() . " - Answer(s): ";
                
            foreach ($question->getAnswers() as $answer){
                
                if($answer->getCorrect() == true) { $QCM_try .= $answer->getIDtxt() . ", "; }
                
            }
            
            $QCM_try = rtrim($QCM_try,", ");
            $QCM_try .= "\r\r";
            
        }
        
        $score = $repQCM->calculateScore($repQCM->getID());
        
        $QCM_try .= "\r     => SCORE : " . $score[0] . "/" . $score[1] . "\r\r";
        
        fwrite($result_file, $QCM_try);
        
        echo"<h3>EOF</h3>";
        
        // Deletes the current_qcm, to avoid errors later
        //unset($_SESSION['current_qcm']);
        var_dump($_SESSION['current_qcm']);
            
        ?>
    </body>
</html>
