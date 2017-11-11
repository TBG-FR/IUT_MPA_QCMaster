<?php   // 'various.inc.php' ~ Useful functions for the whole system (classes, functions, etc)

/* ----- ----- String Securization ----- ----- */

/**
 * Function 'var_secure' : Securizes the given string to make if safe  (Source: https://openclassrooms.com)
 * @param string $string : the given string
 * @return string secured
 */
function var_secure($string) {
    
    // If the type of the string is an Integer (int)
		if(ctype_digit($string))
		{
			$string = intval($string);
		}
		// For all other types
		else
		{
			//$string = mysql_real_escape_string($string); // deprecated, to remplace (with PDO::quote ? filter_input ?)
			$string = addcslashes($string, '%_');
            $string = htmlEntities($string, ENT_QUOTES);
		}
		
		return $string;
}

/* ----- ----- Password Hash ----- ----- */

/**
 * Function 'hash' : Hashes the given password (Source: PHP Course @ IUT Lyon1, TP3 Correction)
 * @param string $password
 * @return string hashed
 */
public function hash($password){
    // on choisira ici la méthode de cryptage de mot de passe
    //return md5($password);
    $options = array(
        'salt' => 'Zbk6s2i!!?vs+_tM2-&-=mvTpW4ReC945VH64Vb9&7$+R2UxW6Gb!@6eH#7P' // on choisi un code pour que l'algo de cryptage soit réversible
    );
    return password_hash($password, CRYPT_BLOWFISH, $options);
    /* PASSWORD_BCRYPT ? */

}

/* ----- ----- Another Function ----- ----- */

/**
 * Function 'Name' : Description
 * @param type $var1
 * @return type
 */
/*
    INSERT FUNCTION
    CODE HERE
*/

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters