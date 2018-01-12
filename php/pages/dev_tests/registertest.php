<?php

    // Place here the included/required files instructions
    require_once('../../includes/all.inc.php');

?>


<!-- 'index.php' ~ Homepage -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Login Test</title>

        <?php //include_once("head.php"); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php //include_once("header.php"); ?>
            <?php //include_once("navbar.php"); ?>
        </header>

        <div class="content">

            <?php
              $db = new Database();
              if(isset($_POST['enregistrerForm']))
              {
                  try{
                      $email = htmlspecialchars($_POST['email']);
                      $prenom = htmlspecialchars($_POST['prenom']);
                      $nom = htmlspecialchars($_POST['nom']);
                      $MDP = htmlspecialchars($_POST['MDP']);
                      $MDP2 = htmlspecialchars($_POST['MDP2']);
                      $db = new Database();   
                          if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email'])AND !empty($_POST['MDP']) AND !empty($_POST['MDP2']))
		{              
				
					if(filter_var($email,FILTER_VALIDATE_EMAIL)) //on rajoute cette condition car on peut changer le type de notre input d'adresse "email" en "text" via le navigateur ('examiner l'element')
					{
							if($MDP == $MDP2)//verification des mdp
							{
								//quand tout les champs son valide, nous pouvons inscrire le client
								 $_SESSION['user'] = Student::constructByRegister($prenom,$nom,$email,$MDP);
                                                                 
                                                                $_SESSION['user'] = Student::constructByLogin($email,$MDP);
                                                                 
                                                                 

								  $bob = $_SESSION['user'];
                               
                                                                 //echo $_SESSION['user']->getID().'<br>';
                                                                 echo $_SESSION['user']->getEmail().'<br>';
                                                                 echo $_SESSION['user']->getLname().'<br>';
                                                                 echo $_SESSION['user']->getFname().'<br>';
								echo $erreur = "votre compte a bien été crée";	
								// redirection vers la page de connexion		
							}
							else
							{
								echo $erreur = "vos mots de passe ne correspondent pas ! veuillez recommencer..";
							}
						
						
					}
					else
					{
						echo $erreur = "votre adresse mail n'est pas valide ! veuillez recommencer..";
					}
				

			
			
		}
		else
		{
			echo $erreur = "tous les champs doivent etre complétés ! veuillez recommencer..";
		}
	}            catch (Exception $ex) {
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

			<h2>Inscription</h2> 


			<form method="post" action="">
				<h3>email: </h3>

                                <input type="email" name="email" placeholder="votre email"><br>

				<h3>Prenom : </h3>

				<input type="text" name="prenom"  placeholder="votre prenom"><br>
				<br>
                                
                                <h3>nom: </h3>

                                <input type="text" name="nom" placeholder="votre nom" ><br>

				<h3>Mot de passe: </h3>

				

				<input type="password" name="MDP"  placeholder="votre mot de passe"><br>

				<h3>confirmation du Mot de passe: </h3>

				<input type="password" name="MDP2" placeholder="confirmer le mot de passe"><br>
				<br>


				<input type="submit" value="Enregistrer" name ="enregistrerForm"><br>

                                <a href="logintest.php">vous avez deja un compte ?</a> 


		</form>
        </div>

        <footer>
            <?php //include_once("footer.php"); ?>
        </footer>

    </body>

</html>
