<?php

/**
 * Class Teacher
 * No further description needed
 */
class Teacher extends User {

    /**
     * Student Constructor : Empty Constructor
     * @param null : This function needs no parameters
     * @return null : This function returns nothing
     */
    public function __construct(){}
    
    /**
     * Constructor #1 : Creates the teacher instance by Loginning
     * @param string $email : Given email
     * @param string $password : Given password
     * @return teacher : The created teacher instance
     */
    public static function constructByLogin($email,$password){

        $db = new Database(); // DB_NEED_FIX

        // Searchs in the Database if an entry exists with the same email
        $db->query("select * from qcmaster_teacher where email = :email");
        $db->bind(':email', $email);
        $row = $db->single();

        // If an entry was found
        if($row != NULL) {

            // If the given passwor is the same as the one we stored
            if( $row['password'] == $password){

                // Creates the new Student instance
                $teacher = new teacher();
                $teacher->email = $row['email'];
                $teacher->password = $row['password'];
                $teacher->id= $row['id'];
                $teacher->lastname = $row['lastname'];
                $teacher->firstname = $row['firstname'];

                // Return the teacher object/instance
                return $teacher;

            }
            
            // Else (if the user exists but the password is wrong)
            else{ throw new Exception('Err_Login_WrongPassword'); }
            
        }
        
        // Else (if the user doesn't exists)
        else{ throw new Exception('Err_Login_UnknownUser'); }
        
    }
    
    /**
     * Constructor #2 : Creates the teacher instance by Registering
     * @param string $firstname : Given firstname
     * @param string $lastname : Given lastname
     * @param string $email : Given email
     * @param string $password : Given password
     * @return teacher: The created teacher instance
     */
    public static function constructByRegister($firstname,$lastname,$email,$password){

        $db = new Database(); // DB_NEED_FIX

        // Searchs in the Database if an entry exists with the same email
        $db->query("select * from qcmaster_teacher where email = :email  ");
        $db->bind(':email', $email);
        $row = $db->single();

        // If no entry was found
        if ($row == NULL){

            // Creates the new Student instance
            $teacher = new teacher();
            $teacher->email = $email;
            $teacher->password = $password;
            $teacher->lastname = $lastname;
            $teacher->firstname = $firstname;

            // Create the new row in the Database
//            $db->query("INSERT INTO qcmaster_teacher (email, firstname, lastname, password) VALUES(:email,:firstname,:lastname,:password)");
            $db->bind(':email', $email);
            $db->bind(':firstname', $firstname); 
            $db->bind(':lastname', $lastname);
            $db->bind(':password', $password);
            $db->execute();

            // Return the Student object/instance
            return $teacher;


        }

        // Else (if email is already taken)
        else { throw new Exception('Err_Register_UserExist') ; }

    }

}