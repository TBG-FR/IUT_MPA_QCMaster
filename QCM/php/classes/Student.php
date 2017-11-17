<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author halim
 */
include 'User.php';
class Student extends User{
    function __constructByLogin($email,$password){
          
        $student = new Student();
        $student->email = $email;
        $student->password = $password;
        
        return $student;
    }
    function __constructByRegister($firstname,$lastname,$email,$password){
        $student = new Student();
        $student->id = $id;
        $student->firstname = $firstname;
        $student->lastname = $lastname;
        $student->email = $email;
        $student->password = $password;
       
        return $student;
    }


}
