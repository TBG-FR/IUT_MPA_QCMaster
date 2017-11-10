<?php

// Place here the included/required files instructions
require_once('../includes/all.inc.php');

?>

<!-- 'index.php' ~ Homepage -->

<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <title>QCMaster - TESTS</title>

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

            echo "<h2>Insert a new record</h2>";
            //Firstly you need to instantiate a new database.
            $db = new Database();
            //Next we need to write our insert query. Notice how I’m using placeholders instead of the actual data parameters.
            $db->query('INSERT INTO ' . TABLE_TEST . ' (FName, LName, Age, Gender) VALUES (:fname, :lname, :age, :gender)');
            //Next we need to bind the data to the placeholders.
            $db->bind(':fname', 'John');
            $db->bind(':lname', 'Smith');
            $db->bind(':age', '24');
            $db->bind(':gender', 'male');
            //And finally we run execute the statement.
            $db->execute();
            //Before running the file, echo out the lastInsertId function so you will know that the query successfully ran when viewed in the browser.
            echo $db->lastInsertId();

            echo "<h2>Insert multiple records using a Transaction</h2>";
            //The next test we will try is to insert multiple records using a Transaction so that we don’t have to repeat the query.
            //The first thing we need to do is to begin the Transaction.
            $db->beginTransaction();
            //Next we set the query
            $db->query('INSERT INTO ' . TABLE_TEST . ' (FName, LName, Age, Gender) VALUES (:fname, :lname, :age, :gender)');
            //Next we bind the data to the placeholders.
            $db->bind(':fname', 'Jenny');
            $db->bind(':lname', 'Smith');
            $db->bind(':age', '23');
            $db->bind(':gender', 'female');
            //And then we execute the statement.
            $db->execute();
            //Next we bind the second set of data.
            $db->bind(':fname', 'Jilly');
            $db->bind(':lname', 'Smith');
            $db->bind(':age', '25');
            $db->bind(':gender', 'female');
            //And run the execute method again.
            $db->execute();
            //Next we echo out the lastInsertId again.
            echo $db->lastInsertId();
            //And finally we end the transaction
            $db->endTransaction();

            echo "<h2>Select a single row</h2>";
            //The next thing we will do is to select a single record.
            //So first we set the query.
            $db->query('SELECT FName, LName, Age, Gender FROM ' . TABLE_TEST . ' WHERE FName = :fname');
            //Next we bind the data to the placeholder.
            $db->bind(':fname', 'Jenny');
            //Next we run the single method and save it into the variable $row.
            $row = $db->single();
            //Finally, we print the returned record to the screen.
            echo "<pre>";
            print_r($row);
            echo "</pre>";

            echo "<h2>Select multiple rows</h2>";
            //The final thing we will do is to run a query and return multiple rows.
            //So once again, set the query.
            $db->query('SELECT FName, LName, Age, Gender FROM ' . TABLE_TEST . ' WHERE LName = :lname');
            //Bind the data.
            $db->bind(':lname', 'Smith');
            //Run the resultSet method and save it into the $rows variable.
            $rows = $db->resultset();
            //Print the return records to the screen.
            echo "<pre>";
            print_r($rows);
            echo "</pre>";
            //And finally display the number of records returned.
            echo $db->rowCount();

            echo "<h2>Update</h2>";
            //Next we need to write our insert query. Notice how I’m using placeholders instead of the actual data parameters.
            $db->query('UPDATE ' . TABLE_TEST . ' SET FName = :fname, LName = :lname, Age = :age, Gender = :gender WHERE id = 5');
            //Next we need to bind the data to the placeholders.
            $db->bind(':fname', 'AAJohn');
            $db->bind(':lname', 'AASmith');
            $db->bind(':age', '42');
            $db->bind(':gender', 'AAmale');
            //And finally we run execute the statement.
            $db->execute();
            //Before running the file, echo out the lastInsertId function so you will know that the query successfully ran when viewed in the browser.
            echo $db->rowCount();

            ?>

        </div>

        <footer>
            <?php //include_once("footer.php"); ?>
        </footer>

    </body>

</html>