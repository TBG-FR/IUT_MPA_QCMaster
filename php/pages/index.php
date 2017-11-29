<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');

?>


<!-- 'index.php' ~ Homepage -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - Questionnaires à choix multiples</title>

        <?php
        /* Makes all the CSS & Javascript links */
        include_once("../includes/head.inc.php");
        ?>

    </head>

    <body>

        <header>
            <?php //include_once("header.php"); ?>
            <?php //include_once("navbar.php"); ?>
        </header>

        <div class="content">

            <p class="title">Index.php - Title<br /></p>

            <p class="text">
                Index.php - Text<br />
            </p>
            
            <h3>Ceci est un test de Formulaire Bootstrap</h3>

            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Check me out
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

        <footer>
            <?php //include_once("footer.php"); ?>
        </footer>

    </body>

</html>