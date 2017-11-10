<?php

/**
 * Class Database
 * Useful to create a link with the Database, simple, efficient and more securized
 * Source(s) : http://culttt.com/2012/10/01/roll-your-own-pdo-php-class/
 */
class Database {

    /* ----- -----  ----- ----- Attributes ----- -----  ----- ----- */

    /**
     * @var string : Stores the MySQL Server address
     */
    private $host   = DB_HOST;

    /**
     * @var string : Stores the MySQL Username
     */
    private $user   = DB_USER;

    /**
     * @var string : Stores the Stores the MySQL Password
     */
    private $pass   = DB_PASS;

    /**
     * @var string : Stores the Stores the MySQL Database name
     */
    private $dbname = DB_NAME;

    /**
     * @var PDO : Stores the PDO (PHP Data Object)
     */ 
    private $dbh;

    /**
     * @var PDO : Stores the eventual errors
     */ 
    private $error;

    /**
     * @var string : Stores the query statement
     */ 
    private $stmt;

    /* ----- -----  ----- ----- Constructor ----- -----  ----- ----- */

    /**
     * Database's Constructor : Creates the Database instance, and especially the PDO instance
     * @param null : This function needs no parameters
     * @return null : This function returns nothing
     */
    public function __construct() {

        // Sets the DSN (Data Source Name) [$dsn ="mysql:host=$host;port=3306;dbname=$dbname;charset=utf8";]
        $dsn = 'mysql:host=' . $this->host . ';port=' . DB_PORT . ';dbname=' . $this->dbname . ';charset=' . DB_CHARSET;

        // Sets the options
        $options = array(
            // Sets the connection type to 'persistent', which can increase performance by checking to see if there is already an established connection to the database
            PDO::ATTR_PERSISTENT    => true,            
            // Activates the exception throwing if an error occurs, so we can handle it
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );

        // Creates the new PDO instance
        try { $this->dbh = new PDO($dsn, $this->user, $this->pass, $options); }

        // Catches any errors
        catch(PDOException $e){ $this->error = $e->getMessage(); }

    }

    /* ----- -----  ----- ----- Functions ----- -----  ----- ----- */

    /**
     * Insert Function Description Here
     * @param string $password : the password we want to hash
     * @return string hashed
     */
    //private function hash($password){ //***MODIF_PROJECT***
    public function hash($password){
        // on choisira ici la méthode de cryptage de mot de passe
        //return md5($password);
        $options = array(
            'salt' => 'Zbk6s2i!!?vs+_tM2-&-=mvTpW4ReC945VH64Vb9&7$+R2UxW6Gb!@6eH#7P' // on choisi un code pour que l'algo de cryptage soit réversible
        );
        return password_hash($password, CRYPT_BLOWFISH, $options);
        /* PASSWORD_BCRYPT ? */

    }

    /**
    * Function 'query' : Prepares the given query, allowing values binding, among others
    * @param string $query : the query we want to execute
    * @return null : This function returns nothing
    */    
    public function query($query){  $this->stmt = $this->dbh->prepare($query); }

    /**
    * Function 'bind' : Bind the given parameter and the given value in the query
    * @param string $param : the placeholder value used in the statement
    * @param string $value : the value that we want to bind in that placeholder
    * @param string $type : the datatype of the parameter
    * @return null : This function returns nothing
    */
    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    /**
    * Function 'execute' : Executes the prepared statement.
    * @param null : This function needs no parameters
    * @return bool
    */    
    public function execute(){
        return $this->stmt->execute();
    }

    /**
    * Function 'resultset' : Executes the query and returns the results in an array
    * @param null : This function needs no parameters
    * @return array<array<data>>
    */    
    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
    * Function 'single' : Executes the query and returns a single record
    * @param null : This function needs no parameters
    * @return array<data>
    */    
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
    * Function 'rowCount' : Returns the number of rows that the previous statement affected
    * @param null : This function needs no parameters
    * @return int
    */    
    public function rowCount(){
        return $this->stmt->rowCount();
    }

    /**
    * Function 'lastInsertId' : Returns the ID of the last inserted element
    * @param null : This function needs no parameters
    * @return string
    */    
    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }

    /**
    * Function 'beginTransaction' : Begins a transaction
    * @param null : This function needs no parameters
    * @return ___
    */    
    public function beginTransaction(){
        return $this->dbh->beginTransaction();
    }

    /**
    * Function 'endTransaction' : Ends a transaction, after commiting changes
    * @param null : This function needs no parameters
    * @return ___
    */    
    public function endTransaction(){
        return $this->dbh->commit();
    }

    /**
    * Function 'cancelTransaction' : Cancels the transaction, after roll-backing changes
    * @param null : This function needs no parameters
    * @return ___
    */    
    public function cancelTransaction(){
        return $this->dbh->rollBack();
    }

    /**
    * Function 'debugDumpParams' : Dumps the information that was contained in the prepared statement
    * @param null : This function needs no parameters
    * @return ___
    */    
    public function debugDumpParams(){
        return $this->stmt->debugDumpParams();
    }    

    /* ----- -----  ----- ----- End of Class ----- -----  ----- ----- */
}

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters
