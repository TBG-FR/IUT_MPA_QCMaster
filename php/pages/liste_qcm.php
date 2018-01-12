<?php

    // Place here the included/required files instructions
    require_once('../includes/all.inc.php');

    $db=new Database();
    $db->query('SELECT * FROM '. TABLE_QCM);
    $rows = $db->resultset();

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
            <ul class="qcm_list">
            
                <?php
            
                foreach ($rows as $row){
                    
                    echo "
                    <li class='qcm_list_element'>
                        <div class='col-lg-2'>".$row['title']."</div>
                        <div class='col-lg-10'><a href='qcm_answer.php?id=".$row['id']."' class='btn btn-primary' role='button'>Aller au QCM</a></div>
                    </li>";                
                }
                
                ?>
                
            <ul/>
          
        </div>

        <footer>
            <?php //include_once("footer.php"); ?>
        </footer>

    </body>

</html>