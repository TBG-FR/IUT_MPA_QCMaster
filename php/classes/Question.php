<?php

/**
 * Class Question
 * No further description needed
 */
class Question {
    
    /* ----- -----  ----- ----- Attribute(s) ----- -----  ----- ----- */
        
    /**
     * @var int : Unique id of the question
     */
    private $id;

    /**
     * @var string : Title of the question
     */
    private $title;

    /**
     * @var array<Answer> : All the answers related to this question
     */
    private $answers;

    /**
     * @var int : Number of answers of that question
     */
    private $nbAnswers;
    
    /* ----- -----  ----- ----- Constructor(s) ----- -----  ----- ----- */

    /**
     * Answer's Constructor : Creates the Answer
     * @param int $id : The id of that question
     * @param bool $title : The question itself
     * @return null : This function returns nothing
     */
    function __construct($id, $title) {
        $this->id = $id;
        $this->title = $title;
        $this->answers = null;
        $this->nbAnswers=0;
    }
    
    /* ----- -----  ----- ----- Accessor(s) ----- -----  ----- ----- */
    
    /**
     * Accessor 'getID' : Returns the id of the answer
     * @param null : This function needs no parameters
     * @return int
     */
    function getID() {
        return $this->id;
    }
    
    /**
     * Accessor 'getTitle' : Returns the question text
     * @param null : This function needs no parameters
     * @return string
     */
    function getTitle() {
        return $this->title;
    }
    
    /**
     * Accessor 'getAnswers' : Returns the array containing all answers
     * @param null : This function needs no parameters
     * @return array<Answer>
     */
    function getAnswers() {
        return $this->answers;
    }
    
//    /**
//     * Accessor 'getAnswer' : Returns the asked answer
//     * @param null : This function needs no parameters
//     * @return Answer
//     */
//    function getAnswer($id) {
//        
//        // CODE : get the answer number $id
//        
//        //return $this->answers[$number];
//    }
    
    /* ----- -----  ----- ----- Mutator(s) ----- -----  ----- ----- */
    
    /**
     * Mutator 'setID' : Modify the id of the question
     * @param int $id : The new id of that question
     * @return null : This function returns nothing
     */
    function setID($id) {
        $this->id = $id;
    }

    /**
     * Mutator 'setTitle' : Modify the title of the question
     * @param string $title : The new title of that question
     * @return null : This function returns nothing
     */
    function setTitle($title) {
        $this->title = $title;
    }

//    /**
//     * Mutator 'setAnswers' : Modify the answers array of that question
//     * @param array<Answer> $answers : The new array of answers for that question
//     * @return null : This function returns nothing
//     */
//    function setAnswers($answers) {
//        $this->answers = $answers;
//    }
//
//    /**
//     * Mutator 'setAnswer' : Modify a specific answer of that question
//     * @param string $id : The id of the answer to change
//     * @param string $proposition : The new answer
//     * @return null : This function returns nothing
//     */
//    function setAnswer($number, $answer) {
//        
//        //$this->answers[$number] = new Answer()
//    }
    
    /* ----- -----  ----- ----- Method(s) ----- -----  ----- ----- */


//
//    /**
//     *  to check the match between the subject and the answers
//     * @param Database DB
//     * @return bool worked
//     */
//    private function correction($answeredQuestion){
//        
//        //CODE
//        
//        return true;
//    }
//    /**
//     * metod 'addAnswer' : add an aswer on the array aswers
//     * @param string $proposition : The  answer
//     * @return null : This function returns nothing
//     */
   function addAnswer($answer) {
       $this->answers[$this->nbAnswers]=$answer;
       $this->nbAnswers++;
     
    }

    /* ----- -----  ----- ----- End of Class ----- -----  ----- ----- */
}

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters