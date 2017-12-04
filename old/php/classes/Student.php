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

class Student extends User {
    
    public static function constructByLogin($email,$password){
          
        // CODE => SECURIZE THE STRINGS, CHECK INTO DATABASE IF THE USER EXISTS, IF THE PASSWORD IS CORRECT
        
        $db = new Database();
        $db->query("select * from qcmaster_student where email = :email");
        $db->bind(':email', $email);
        $row = $db->single();
        
        //var_dump($row);
        
        if($row != NULL) {
            if( $row['password'] == $password){
                
                $student = new Student();
                $student->email = $row['email'];
                $student->password = $row['password'];
                $student->id= $row['id'];
                $student->lastname = $row['lastname'];
                $student->firstname = $row['firstname'];
               // var_dump($student);
                
              
                return $student;
                
            }       
         else{
            throw new Exception('Err_Login_WrongPassword');
        }                                                                               // fin affichage
    }
         else{
            throw new Exception('Err_Login_UnknownUser');
        }
    }
    
    public function constructByRegister($firstname,$lastname,$email,$password){
        
       /* $student = new Student();
        $student->id = $id;
        $student->firstname = $firstname;
        $student->lastname = $lastname;
        $student->email = $email;
        $student->password = $password;
       
        return $student;*/
        $db = new Database();
        $db->query("select * from qcmaster_student where email = :email  ");
        $db->bind(':email', $email);
        $row = $db->single();
        if ($row != NULL){
             throw new Exception('Err_Register_UserExist');
             
        }else{
              $student = new Student();
                $student->email = $email;
                $student->password = $password;
                $student->lastname = $lastname;
                $student->firstname = $firstname;
                $db->query("INSERT INTO qcmaster_student VALUES(:email,:firstname,:lastname,:password)");
                var_dump(constructByLogin($email,$password));
                
      
            
        }
    }


}
