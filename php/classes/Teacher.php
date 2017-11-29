<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Teacher
 *
 * @author halim
 */
include 'User.php';

class Teacher extends User {
     function __constructByLogin($email,$password){
          
        $teacher= new Student();
        $teacher->email = $email;
        $teacher->password = $password;
        
        return $teacher;
    }
    function __constructByRegister($firstname,$lastname,$email,$password){
        $teacher = new $teacher();
        $teacher->id = $id;
        $teacher->firstname = $firstname;
        $teacher->lastname = $lastname;
        $teacher->email = $email;
        $teacher->password = $password;
       
        return $teacher;
   
    }
}
