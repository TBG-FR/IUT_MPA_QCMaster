<?php

/**
 * Class User
 */

class User
{
    /**
     * @var integer id of the user
     */
    private $id;

    /**
     * @var string firstname of the user
     */
    private $firstname;

    /**
     * @var string lastname of the user
     */
    private $lastname;

    /**
     * @var string Email of the user
     */
    private $email;

    /**
     * @var string Password of the user
     */
    private $password;

    /**
     * Getters and setters of the class
     */
    
    function getId() {
        return $this->id;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
    /**
     * default constructor
     * @param NONE
     */
    
    public function __construct(){}

    /**
     * constructor for login in
     * @param email, password
     * @return user
     */
    
    public function constructByLogin($email,$password){
        
        //VERIF PASSWORD
        if($email==email){
            print "MAIL DÉJA EXISTANT";
        }
        
        $user = new User();
        $user->email = $email;
        $user->password = $password;
        
        
        return $user;
    }

    /**
     * constructor for register
     * @param ALL
     * @return user
     */
    
    public function constructByRegister($id,$firstname,$lastname,$email,$password){
        
        $user = new User();
        $user->id = $id;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->password = $password;
       
        return $user;
    }
}