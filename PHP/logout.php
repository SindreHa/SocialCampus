<?php

session_start();
$_SESSION = array();
 

session_destroy();
 
// Sendes tilbake til hovedside etter login
     header("location: ../HTML/index.php?logout=true");
     die();
?>