<?php

/**
 * Class Answer
 * No further description needed
 */
class Answer {

    /* ----- -----  ----- ----- Attribute(s) ----- -----  ----- ----- */
        
    /**
     * @var int : Unique id of the answer
     */
    private $id;

    /**
     * @var bool : Status of the answer (right or wrong)
     */
    private $correct;

    /**
     * @var string : The answer itself
     */
    private $proposition;

    /* ----- -----  ----- ----- Constructor(s) ----- -----  ----- ----- */

    /**
     * Answer's Constructor : Creates the Answer
     * @param int $id : The id of that answer
     * @param bool $correct : The status of that answer (right or wrong)
     * @param string $proposition : The answer itself
     * @return null : This function returns nothing
     */
    function __construct($id, $correct, $proposition) {
        $this->id = $id;
        $this->correct = $correct;
        $this->proposition = $proposition;
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
     * Accessor 'getCorrect' : Returns the status of the answer
     * @param null : This function needs no parameters
     * @return bool
     */
    function getCorrect() {
        return $this->correct;
    }

    /**
     * Accessor 'getProposition' : Returns the answer text
     * @param null : This function needs no parameters
     * @return string
     */
    function getProposition() {
        return $this->proposition;
    }

    /* ----- -----  ----- ----- Mutator(s) ----- -----  ----- ----- */

    /**
     * Mutator 'setID' : Modify the id of the answer
     * @param int $id : The new id of that answer
     * @return null : This function returns nothing
     */
    function setID($id) {
        $this->id = $id;
    }

    /**
     * Mutator 'setCorrect' : Modify the status of the answer
     * @param bool $correct : The new status of that answer (right or wrong)
     * @return null : This function returns nothing
     */
    function setCorrect($correct) {
        $this->correct = $correct;
    }

    /**
     * Mutator 'setProposition' : Modify the text of the answer
     * @param string $proposition : The new text for that answer
     * @return null : This function returns nothing
     */
    function setProposition($proposition) {
        $this->proposition = $proposition;
    }

    /* ----- -----  ----- ----- Method(s) ----- -----  ----- ----- */

//    /**
//     * Method 'exampleName' : exampleDescription
//     * @param type $param_variable : variableDescription
//     * @return type $return_variable
//     */
//    function exampleName($param_variable) {
//        
//        // Method Code
//        
//    }

    /* ----- -----  ----- ----- End of Class ----- -----  ----- ----- */
}

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters