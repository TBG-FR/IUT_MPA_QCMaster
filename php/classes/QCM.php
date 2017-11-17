<?php

/**
 * Class QCM
 * No further description needed
 */
class QCM {

    /* ----- -----  ----- ----- Attribute(s) ----- -----  ----- ----- */
        
    /**
     * @var int : Unique id of the QCM
     */
    private $id;
        
    /**
     * @var int : Owner's id
     */
    private $teacher_id;

    /**
     * @var string : Title of the QCM
     */
    private $title;

    /**
     * @var string : Topic of the QCM
     */
    private $topic;

    /**
     * @var string : Unique link to the QCM
     */
    private $link;

    /**
     * @var array<Question> : All the questions related to this QCM
     */
    private $questions;
    
    /* ----- -----  ----- ----- Constructor(s) ----- -----  ----- ----- */

    /**
     * QCM's Constructor : Empty Constructor
     * @param null : This function needs no parameters
     * @return null : This function returns nothing
     */
    public function __construct(){}
    /**
     * QCM's Constructor : for the qcm create with de DB
     * @param null : This function needs no parameters
     * @return null : This function returns nothing
     */
    public function constructFromDB($id){
        $this->id=$id;
        $this->teacher_id=$id_teacher;
        $this->title=$title;
        $this->topic=$topic;
        $this->link=$link;
        $this->questions=$questions;
        
    }
    /**
     * QCM's Constructor : for the qcm create from scratch
     * @param null : This function needs no parameters
     * @return null : This function returns nothing
     */
    public function constructFromScratch(){
        $this->title="";
        $this->topic="";
    }
            
    
    /* ----- -----  ----- ----- Accessor(s) ----- -----  ----- ----- */
    
    /**
     * Accessor 'getID' : Returns the id of that QCM
     * @param null : This function needs no parameters
     * @return int
     */    
    function getID() {
        return $this->id;
    }
    
    /**
     * Accessor 'getTeacherID' : Returns the id of the Owner of that QCM
     * @param null : This function needs no parameters
     * @return int
     */    
    function getTeacherID() {
        return $this->teacher_id;
    }
    
    /**
     * Accessor 'getTitle' : Returns the title of that QCM
     * @param null : This function needs no parameters
     * @return string
     */
    function getTitle() {
        return $this->title;
    }
    
    /**
     * Accessor 'getTopic' : Returns the topic of that QCM
     * @param null : This function needs no parameters
     * @return string
     */
    function getTopic() {
        return $this->topic;
    }
    
    /**
     * Accessor 'getLink' : Returns the link of that QCM
     * @param null : This function needs no parameters
     * @return string
     */
    function getLink() {
        return $this->link;
    }
    
    /**
     * Accessor 'getQuestions' : Returns the array containing all questions of that QCM
     * @param null : This function needs no parameters
     * @return array<Question>
     */
    function getQuestions() {
        return $this->questions;
    }
    
    /* ----- -----  ----- ----- Mutator(s) ----- -----  ----- ----- */
    
    /**
     * Mutator 'setID' : Modify the id of that QCM
     * @param int $id : The new id of that QCM
     * @return null : This function returns nothing
     */
    function setID($id) {
        $this->id = $id;
    }
    
    /**
     * Mutator 'setTeacherID' : Modify the Owner of that QCM
     * @param int $tid : The new Owner id of that QCM
     * @return null : This function returns nothing
     */
    function setTeacherID($tid) {
        $this->teacher_id = $tid;
    }

    /**
     * Mutator 'setTitle' : Modify the title of that QCM
     * @param string $title : The new title of that QCM
     * @return null : This function returns nothing
     */
    function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Mutator 'setTopic' : Modify the title of that QCM
     * @param string $title : The new title of that QCM
     * @return null : This function returns nothing
     */
    function setTopic($topic) {
        $this->topic = $topic;
    }

    /**
     * Mutator 'setLink' : Modify the link of that QCM
     * @param string $link : The new link of that QCM
     * @return null : This function returns nothing
     */
    function setLink($link) {
        $this->link = $link;
    }
    
//    /**
//     * Mutator 'setQuestions' : Modify the answers array of that QCM
//     * @param array<Question> $questions : The new array of questions
//     * @return null : This function returns nothing
//     */
//    function setQuestions($questions) {
//        $this->questions = $questions;
//    }
//
//    /**
//     * Mutator 'setQuestion' : Modify a specific answer
//     * @param string $id : The id of the question to change
//     * @param string $question : The new question
//     * @return null : This function returns nothing
//     */
//    function setQuestion($id, $question) {
//        
//        //$this->question[$id] = new Question()
//    }
    
    /* ----- -----  ----- ----- Method(s) ----- -----  ----- ----- */  

//    /**
//     * Function 'addQuestion' : to add a question to the QCM 
//     * @param Question $question
//     * @return null : This function returns nothing
//     */
     function addQuestion($question){
        $this->questions[]=$question;
        
    }

//    /**
//     * Function 'saveIntoDB' : to save the QCM into the Database 
//     * @param Database DB
//     * @return bool worked
//     */
//    private function saveIntoDB($DB){
//        
//        //CODE
//        
//        return true;
//    }
//    
//    /**
//     * Function 'correction' : to check the match between the subject and the answers
//     * @param QCM answeredQCM
//     * @return bool worked
//     */
//    private function correction($answeredQCM){
//        
//        //CODE
//        
//        return true;
//    }
//    
//    /**
//     * Function 'display' : to check the match between the subject and the answers
//     * @param null : This function needs no parameters
//     * @return null : This function returns nothing
//     */
//    private function display(){
//        
//        //CODE
//        
//    }

    /* ----- -----  ----- ----- End of Class ----- -----  ----- ----- */
}

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters