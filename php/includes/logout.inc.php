<?php   // 'logout.inc.php' ~ Manages User disconnection

    if(isset($_SESSION['user']) && $_SESSION['user'] instanceof User) { 
        
        if(isset($_GET['action']) && $_GET['action'] == 'logout') {
        
            unset($_SESSION['user']);

            /* TODO : DISCONNECTION MESSAGE */

            /* TODO : REDIRECT ON SAME PAGE */

            /* TEMP */ header('Location: '.$_SERVER['PHP_SELF']);
            die;

        }
        
    }

    else if(!isset($_SESSION['user'])) { $_SESSION['user'] = ''; }

    /* TEMP */ var_dump($_SESSION['user']);
    /* TEMP */ var_dump($_SESSION['current_qcm']);
    echo "____________________________________________________________________________________<br/><br/><br/>";

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters