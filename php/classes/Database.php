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
    
    /* ----- -----  ----- ----- Constructor ----- -----  ----- ----- */
    
    /**
     * Creates the Database instance, and especially the PDO instance
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
     * @param string $password
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
    
    /* ----- -----  ----- ----- End of Class ----- -----  ----- ----- */
}

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters
