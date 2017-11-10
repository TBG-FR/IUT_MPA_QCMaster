<?php

/**
 * Class Answer
 * pour une abstraction totale de la base de données, le but étant de simplifier le code
 */
class Answer
{
    /**
     * 
     */
    private $id;

    /**
     *  boolean setting if the answer is correct 
     */
    private $correct;

    /**
     * string containing the answer
     */
    private $proposition;

    function setId($id) {
        $this->id = $id;
    }

    function setCorrect($correct) {
        $this->correct = $correct;
    }

    function setProposition($proposition) {
        $this->proposition = $proposition;
    }

    function getId() {
        return $this->id;
    }

    function getCorrect() {
        return $this->correct;
    }

    function getProposition() {
        return $this->proposition;
    }


    function __construct($id, $correct, $proposition) {
        $this->id = $id;
        $this->correct = $correct;
        $this->proposition = $proposition;
    }



}



// on évitera de fermer la balise php pour ne pas injecter de caratères invible sur les pages parentes