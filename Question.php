<?php

/**
 * Class Question
 * pour une abstraction totale de la base de données, le but étant de simplifier le code
 */
class Question
{
    /**
     * 
     */
    private $id;

    /**
     *  Title of the question 
     */
    private $title;

    /**
     * array of QCM's answers
     */
    private $answers;


    /**
     * to add a question to the QCM 
     * @param nothing
     * @return array of correct answers id 
     */
    private function getCorrectAnswers(){
        //code
        return int[];
    }

    /**
     *  to check the match between the subject and the answers
     * @param Database DB
     * @return bool worked
     */
    private function correction($answeredQuestion){
        
        //CODE
        
        return true;
    }
    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getAnswers() {
        return $this->answers;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setAnswers($answers) {
        $this->answers = $answers;
    }

    function __construct($id, $title, $answers) {
        $this->id = $id;
        $this->title = $title;
        $this->answers = $answers;
    }

    

}



// on évitera de fermer la balise php pour ne pas injecter de caratères invible sur les pages parentes