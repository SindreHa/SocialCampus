<?php

session_start();
 
// Unset all of the session variables
$_SESSION = array();
 

session_destroy();
 
// Sendes tilbake til hovedside etter login
header("location: index.php");
exit;
?>