<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');

?>


<!-- 'index.php' ~ Homepage -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Login Test</title>

        <?php include_once('../includes/head.inc.php'); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php include_once('../includes/header.inc.php'); ?>
            <?php include_once('../includes/navbar.inc.php'); ?>
        </header>

        <div class="content">

            <?php
              $db = new Database();
              if(isset($_POST['connexionForm']))
              {
                  try{
                      $email = htmlspecialchars($_POST['email']);
                      $password = htmlspecialchars($_POST['password']);
                      //$_SESSION['user'] = new Student();
                               $_SESSION['user'] = Student::constructByLogin($email,$password);
                               
                               echo '<br>bg';
                               
                              // var_dump($_SESSION['user']);
       
                  } catch (Exception $ex) {
                     echo $ex->getMessage();
                  }
              }
              
              /*
                               
                               $bob = $_SESSION['user'];
                               
                               echo $_SESSION['user']->getID().'<br>';
                               echo $_SESSION['user']->getEmail().'<br>';
                               echo $_SESSION['user']->getLname().'<br>';
                               echo $_SESSION['user']->getFname().'<br>';
                               
                             
              
           */
            
/* ---------------------------------------------------------------------------------------------- */

            ?>
            <h1>Bienvenue sur le site de QCM TBG  !</h1>

			<h2>connectez vous pour acceder a votre espace perso</h2> 


			<form method="post" action="">
				<h3>email: </h3>

				<input type="text" name="email"><br>

				<h3>Mot de passe: </h3>

				<input type="password" name="password"><br>
				<br>

				<input type="submit" value="connexion" name ="connexionForm"><br>

				 <a href="registertest.php">pas encore inscrit ?</a> 


		</form>
        </div>

        <footer>
            <?php //include_once("footer.php"); ?>
        </footer>

    </body>

</html>