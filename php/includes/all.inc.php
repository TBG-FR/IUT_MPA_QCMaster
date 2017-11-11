<?php   // 'all.inc.php' ~ Includes everything (Includes & Classes) so that the php pages will have only one file to Include

        require_once('settings.inc.php');
        require_once('various.inc.php');

        require_once('../classes/Database.php');
        require_once('../classes/User.php');
        require_once('../classes/QCM.php');
        require_once('../classes/Question.php');
        require_once('../classes/Answer.php');

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters