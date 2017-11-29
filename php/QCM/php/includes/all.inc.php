<?php   // 'all.inc.php' ~ Includes everything (Settings, Functions, Classes, ...) so that the php pages will have only one file to include

        /* Including various Settings & Functions */
        require_once('settings.inc.php');
        require_once('various.inc.php');

        /* Including Database class and creaating a Database instance */
        require_once('../classes/Database.php');
        $db = new Database();
        
        /* Including User related and QCM-related classes */
        require_once('../classes/User.php');
        require_once('../classes/Teacher.php');
        require_once('../classes/Student.php');
        require_once('../classes/QCM.php');
        require_once('../classes/Question.php');
        require_once('../classes/Answer.php');
        
        session_start();

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters