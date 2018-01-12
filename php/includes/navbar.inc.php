<?php
if(isset($_SESSION['user'])){
    if($_SESSION['user'] instanceof Teacher){
        echo '<nav class="navbar navbar-light bg-faded">
        <form class="form-inline">
        <a class="btn btn-outline-success" href="teacher_home.php">accueil</a>
        <a class="btn btn-outline-success" href="?action=logout">Déconnexion</a>


        </form>
        </nav>';
    }
    
    else if($_SESSION['user'] instanceof Student){
        
           echo '<nav class="navbar navbar-light bg-faded">
        <form class="form-inline">
        
       
        <a class="btn btn-outline-success" href="student_home.php">accueil</a>
        <a class="btn btn-outline-success" href="?action=logout">Déconnexion</a>

        </form>
        </nav>';
}
}


?>