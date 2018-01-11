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
    public static function constructFromDB($id){
        
        $db = new Database();
        //request for qcm infos
        $db->query('SELECT * FROM '. TABLE_QCM .' WHERE id = :id');
        $db->bind(':id', $id);
        $rows = $db->single();
        
        //affect results in Attributes
        
        $QCM=new QCM();
        
        $QCM->id=$rows['id'];
        $QCM->teacher_id=$rows['id_teacher'];
        $QCM->title=$rows['title'];
        $QCM->topic=$rows['topic'];
        $QCM->link=$rows['link'];
        
        //request for questions
        $db->query('SELECT * FROM '. TABLE_QUESTION .' WHERE id_QCM = :id');
        $db->bind(':id', $id);
        $rows = $db->resultset();
        foreach($rows as $row){
            $QCM->questions[]= new Question($row['id'],$row['title']);
            
            //request for answers
            $db->query('SELECT * FROM '. TABLE_ANSWER .' WHERE id_Question = :id');
            $db->bind(':id', $row['id']);
            $answs = $db->resultset();
            foreach($answs as $answ){
                $QCM->questions[sizeof($QCM->questions)-1]->addAnswer(new Answer($answ['id'],$answ['correct'],$answ['proposition']));
                
            }
        }
        
        return $QCM;
        
    }
    /**
     * QCM's Constructor : for the qcm create from scratch
     * @param null : This function needs no parameters
     * @return null : This function returns nothing
     */
    public static function constructFromScratch(){
        $QCM=new QCM();
        
        $QCM->id=-1;
        $QCM->title="";
        $QCM->topic="";
        $QCM->addQuestion(new Question(0,""));
        $QCM->getQuestion(0)->addAnswer(new Answer(0,0,""));
        
        return $QCM;
        
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
    
    /**
     * Accessor 'getQuestions' : Returns the array containing all questions of that QCM
     * @param null : This function needs no parameters
     * @return int
     */
    function getNbQuestions() {
        $cpt=0;
        foreach ($this->questions as $question){
            $cpt++;
        }
        
        return $cpt;
    }
    
    /**
     * Accessor 'getQuestions' : Returns the array containing all questions of that QCM
     * @param null : This function needs no parameters
     * @return array<Question>
     */
    function getQuestion($index) {
        return $this->questions[$index];
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
    public function display(){
        echo '<h2>'.$this->title.'<h2>';
        echo '<h3>'.$this->topic.'<h3></br>';
        foreach ($this->questions as $question){
            echo '</br>'.$question->getTitle().'</br>';
            foreach($question->getAnswers() as $answer){
                echo $answer->getProposition()."       ".$answer->getCorrect()."</br>";
                
            }
        }
        
        
    }
    
    

    /* ----- -----  ----- ----- End of Class ----- -----  ----- ----- */
}

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters