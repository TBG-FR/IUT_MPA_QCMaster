<?php   // 'settings.inc.php' ~ Useful settings for the whole system (classes, functions, etc)

/* ----- Database Configuration ----- */
define("DB_HOST", "localhost");
define("DB_PORT", "3306");
define("DB_USER", "root");  //p160000
define("DB_PASS", "");      //1160000
define("DB_NAME", "bdd");   //p160000
define("DB_CHARSET", "utf8");

/* ----- Database Tables Names ----- */
define("TABLE_TEST", "qcmaster_Test");
define("TABLE_USER", "qcmaster_User");
define("TABLE_QCM", "qcmaster_QCM");
define("TABLE_QUESTION", "qcmaster_Question");
define("TABLE_ANSWER","qcmaster_Answer");

/* ----- Another Configuration ----- */
/*
    INSERT CONFIG
    CODE HERE
*/

// End of file ~ We don't close the PHP tag here, in order to avoid inserting invisible characters