<?php
// Definer variabler for localhost database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'application');
 
// Kobler til mysql database med definerte variabler 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(session_id() == '') {
    session_start();
}

?>

