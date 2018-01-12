<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');

    $db = new Database();

?>


<!-- ----- ----- 'teacher_home.php' ~ Homepage for Teachers ----- ----- -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Espace Enseignant</title>

        <?php include_once('../includes/head.inc.php'); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php include_once('../includes/header.inc.php'); ?>
            <?php include_once('../includes/navbar.inc.php'); ?>
        </header>

        <div class="content">
            <?php
             // ----- ------ If the User is logged as a teacher => Display the Menu
            if($_SESSION['user'] instanceof Teacher) { echo "
            
            <div class='menu teacher'>\r
            
                 
                <a class='btn btn-lg btn-block btn-primary' href='qcm_list_own.php'>Liste de vos QCM</a>\r
            
                <a class='btn btn-lg btn-block btn-primary' href='teacher_stats.php'>Voir les stats</a>\r
            
                <a class='btn btn-lg btn-block btn-danger' href='?action=logout'>Déconnexion</a>\r
            
            </div>\r
            
            "; }
            
             // ----- ------ Else If the User is logged as a student => Display a Message
            else if($_SESSION['user'] instanceof Student) { echo '<script>window.location.replace("403.php?error=student");</script>'; }
            
            // ----- ------ Else If the User sent the Login form => Try to log him (and display the potential errors)
            else if(isset($_POST['loginForm'])) { 
                
                try{
                    
                    $email = htmlspecialchars($_POST['mail']);
                    $password = htmlspecialchars($_POST['passwd']);
                    
                    $_SESSION['user'] = Teacher::constructByLogin($email,$password);
       
                  } catch (Exception $ex) { echo $ex->getMessage(); /* TODO : ADD BOOTSTRAP MESSAGE */ }            
            
            }
             // ----- ------ Else If the User sent the Register form => Try to register him (and display the potential errors)
            else if(isset($_POST['registerForm'])) {
                    
                    // IF all values have been filled
                    if( !empty($_POST['fname']) && !empty($_POST['lname']) 
                       && !empty($_POST['mail']) && !empty($_POST['passwd']) && !empty($_POST['passwd2'])) {
                        
                        $email = htmlspecialchars($_POST['mail']);
                        $prenom = htmlspecialchars($_POST['fname']);
                        $nom = htmlspecialchars($_POST['lname']);
                        $MDP = htmlspecialchars($_POST['passwd']);
                        $MDP2 = htmlspecialchars($_POST['passwd2']);
                        
                         // IF the email is valid (prevents from user changing the input from 'email' to 'text' in the source code)
                        if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
                            
                            // IF password and password verification are matching
                            if($MDP == $MDP2) {
                                
                                try{
                                
                                $_SESSION['user'] = Teacher::constructByRegister($prenom,$nom,$email,$MDP);
                                
                                $_SESSION['user'] = Teacher::constructByLogin($email,$MDP);
                                    
                                } catch (Exception $ex) { echo $ex->getMessage(); /* TODO : ADD BOOTSTRAP MESSAGE */ }
                                
                            }
                            
                            else { echo $erreur = "vos mots de passe ne correspondent pas ! {try again}"; /* TODO : ADD BOOTSTRAP MESSAGE */ }
                            
                        }
                        
                        else { echo $erreur = "votre adresse mail n'est pas valide ! {try again}"; /* TODO : ADD BOOTSTRAP MESSAGE */ }
                        
                    }
                    
                    else { echo $erreur = "tous les champs doivent etre complétés ! {try again}"; /* TODO : ADD BOOTSTRAP MESSAGE */ }
                
            }
            // ----- ------ Else ("Guest" arriving on the page) => Display the Login/Register form
            else { echo "
            
            <h1 class='title'>Espace Enseignant</h1>
            
            <div class='user login form-group'>
            
            <p class='title'>Connexion</p>
            
                <form method='POST' action=''>
                
                    <label for='loginEmail'>Adresse Email</label>
                    <input class='form-control' type='email' id='loginEmail' name='mail' placeholder='Entrez votre Email'>
                
                    <label for='loginPass'>Mot de passe</label>
                    <input class='form-control' type='password' id='loginPass' name='passwd' placeholder='Entrez votre Mot de Passe'>
                    
                    <button type='submit' class='btn btn-primary' name ='loginForm'>Connexion</button>
                
                </form>
            
            </div>
            
            <p class='title'>Inscription</p>
            
            <div class='user register form-group'>
            
                <form method='POST' action=''>
                
                    <label for='registerEmail'>Adresse Email</label>
                    <input class='form-control' type='email' id='registerEmail' name='mail' placeholder='Entrez votre Email'>
                
                    <label for='registerFirstname'>Prénom</label>
                    <input class='form-control' type='text' id='registerFirstname' name='fname' placeholder='Entrez votre Prénom'>
                
                    <label for='registerLastname'>Nom</label>
                    <input class='form-control' type='text' id='registerLastname' name='lname' placeholder='Entrez votre Nom'>
                
                    <label for='registerPass'>Mot de passe</label>
                    <input class='form-control' type='password' id='registerPass' name='passwd' placeholder='Entrez votre Mot de Passe'>
                    
                    <label for='registerPassVerif'>Mot de passe</label>
                    <input class='form-control' type='password' id='registerPassVerif' name='passwd2' placeholder='Retapez votre Mot de Passe'>
                    
                    <button type='submit' class='btn btn-primary' name ='registerForm'>Inscription</button>
                
                </form>
            
            </div>
            
            "; }
            
            ?>
            
            
        </div>

        <footer>
            <?php include_once('../includes/footer.inc.php'); ?>
        </footer>

    </body>

</html>