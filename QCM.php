<?php

/**
 * Class QCM
 * pour une abstraction totale de la base de données, le but étant de simplifier le code
 */
class QCM
{
    /**
     * 
     */
    private $id;

    /**
     * Teacher's id 
     */
    private $id_teacher;

    /**
     * array of QCM's questions 
     */
    private $questions;

    /**
     *  string allowing the student to access to the QCM
     */
    private $link;

    /**
     * bool to know wether this is the subject or not
     */
    private $subject;

    /**
     * to add a question to the QCM 
     * @param Question question
     * @return nothing
     */
    private function addQuestion($question){
        $this->questions[]=$question;
    }

    /**
     * to save the QCM into the Database 
     * @param Database DB
     * @return bool worked
     */
    private function saveIntoDB($DB){
        
        //CODE
        
        return true;
    }
    
    /**
     * to check the match between the subject and the answers
     * @param QCM answeredQCM
     * @return bool worked
     */
    private function correction($answeredQCM){
        
        //CODE
        
        return true;
    }
    
    /**
     * to check the match between the subject and the answers
     * @param nothing
     * @return nothing 
     */
    private function display(){
        
        //CODE
        
    }
    
    function __construct() {
        // a completer
    }
    
    function getId() {
        return $this->id;
    }

    function getId_teacher() {
        return $this->id_teacher;
    }

    function getQuestions() {
        return $this->questions;
    }

    function getLink() {
        return $this->link;
    }

    function getSubject() {
        return $this->subject;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_teacher($id_teacher) {
        $this->id_teacher = $id_teacher;
    }

    function setQuestions() {
        //a completer 
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setSubject($subject) {
        $this->subject = $subject;
    }



    

}



// on évitera de fermer la balise php pour ne pas injecter de caratères invible sur les pages parentes