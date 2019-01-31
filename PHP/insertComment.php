<?php
// Bruk Config fil
require_once "config.php";
$tittel = $_POST('tittel');
$kommentar = $_POST('innhold');

$q ="INSERT INTO post (tittel, kommentar) VALUES(
    '.$tittel.','.$kommentar.')";

mysqli_query($link, $q);
    
?>