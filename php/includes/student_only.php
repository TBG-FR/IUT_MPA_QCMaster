<?php   // 'student_only.php' ~ Restrict access to pages made for Students

    if(!isset($_SESSION['user']) || $_SESSION['user'] == '' || !($_SESSION['user'] instanceof User)) {
        
        echo '<script>window.location.replace("403.php?error=guest");</script>';
    
    }

    else if($_SESSION['user'] instanceof Teacher) {
        
        echo '<script>window.location.replace("403.php?error=teacher");</script>';
    
    }
       
    else { /* do nothing, normal execution */ }

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters