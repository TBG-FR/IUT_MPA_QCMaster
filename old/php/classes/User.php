<?php

/**
 * Class User
 * No further description needed
 */

abstract class User {
    
    /* ----- -----  ----- ----- Attribute(s) ----- -----  ----- ----- */
    
    /**
     * @var int : Unique id of the user
     */
    protected $id;

    /**
     * @var string : Email of the user
     */
    protected $email;

    /**
     * @var string : Password of the user
     */
    protected $password;

    /**
     * @var string : Firstname of the user
     */
    protected $firstname;

    /**
     * @var string : Lastname of the user
     */
    protected $lastname;
    
    
    protected $pdo;
    
    /* ----- -----  ----- ----- Constructor(s) ----- -----  ----- ----- */

    /**
     * User's Constructor : Empty Constructor
     * @param null : This function needs no parameters
     * @return null : This function returns nothing
     */
    public function __construct(){}
    
    /**
     * Constructor #1 : Creates the User instance by Loginning
     * @param string $email : Given email
     * @param string $password : Given password
     * @return User : The created User instance
     */
    public static function  constructByLogin($email,$password){
        
        
        
      
    }
    
    /**
     * Constructor #2 : Creates the User instance by Registering
     * @param string $firstname : Given firstname
     * @param string $lastname : Given lastname
     * @param string $email : Given email
     * @param string $password : Given password
     * @return User : The created User instance
     */
    public function constructByRegister($firstname,$lastname,$email,$password){
        
        // CODE => SECURIZE THE STRINGS, CHECK INTO DATABASE IF THE USER EXISTS, AND CREATE THE NEW USER INTO DB
        
       
    }
    
    /* ----- -----  ----- ----- Accessor(s) ----- -----  ----- ----- */
    
    /**
     * Accessor 'getID' : Returns the id of the User
     * @param null : This function needs no parameters
     * @return int
     */
    function getID() {
        return $this->id;
    }
    
    /**
     * Accessor 'getFname' : Returns the firstname of the User
     * @param null : This function needs no parameters
     * @return string
     */
    function getFname() {
        return $this->firstname;
    }
    
    /**
     * Accessor 'getLname' : Returns the lastname of the User
     * @param null : This function needs no parameters
     * @return string
     */
    function getLname() {
        return $this->lastname;
    }
    
    /**
     * Accessor 'getEmail' : Returns the email of the User
     * @param null : This function needs no parameters
     * @return string
     */
    function getEmail() {
        return $this->email;
    }
    
    /**
     * Accessor 'getPassword' : Returns the password of the User
     * @param null : This function needs no parameters
     * @return string
     */
    function getPassword() {
        return $this->password;
    }
    
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
     * Mutator 'setFirstname' : Modify the firstname of that User
     * @param string $firstname : The new firstname of that User
     * @return null : This function returns nothing
     */
    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    /**
     * Mutator 'setLastname' : Modify the lastname of that User
     * @param string $lastname : The new lastname of that User
     * @return null : This function returns nothing
     */
    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    /**
     * Mutator 'setEmail' : Modify the email of that User
     * @param string $email : The new email of that User
     * @return null : This function returns nothing
     */
    function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Mutator 'setPassword' : Modify the password of that User
     * @param string $password : The new password of that User
     * @return null : This function returns nothing
     */
    function setPassword($password) {
        $this->password = $password;
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