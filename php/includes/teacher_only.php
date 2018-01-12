<?php   // 'teacher_only.php' ~ Restrict access to pages made for Teachers

    if(!isset($_SESSION['user']) || $_SESSION['user'] == '' || !($_SESSION['user'] instanceof User)) {
        
        echo '<script>window.location.replace("403.php?error=guest");</script>';
    
    }

    else if($_SESSION['user'] instanceof Student) {
        
        echo '<script>window.location.replace("403.php?error=student");</script>';
    
    }
       
    else { /* do nothing, normal execution */ }

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters