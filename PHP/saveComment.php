<?php
// Sjekker om session er aktive, om ikke, lager ny
if(session_id() == '') {
    session_start();
}
// Henter config fila
require_once "../PHP/config.php";

$tittel = "";
$kommentar = "";


// Ser etter tomme felt for å hindre php error
if (!empty($_POST)) {
	if (isset($_POST['tittel'])) {
		$tittel = $_POST['tittel'];
	}
	if (isset($_POST['textarea'])) {
		$kommentar = $_POST['textarea'];
	}
	
}

/* 
   Hindrer POST funksjonen i å trigre når man refresher siden, med at
   en refresh vil trigre POST om igjen og legge tomme kommentarer inn i
   databasen 
*/
if (isset($_POST['textarea'])) {

		$sql ="INSERT INTO post (title, content) VALUES('$tittel','$kommentar')";
		if (mysqli_query($link, $sql)) 
		{
			header("gruppeEksempel.php");
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}

	if (isset($_POST['textarea']))
	{
		$_POST['textarea'] = " ";
	}
}

mysqli_close($link);
?>