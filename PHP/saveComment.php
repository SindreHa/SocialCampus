<?php
// Sjekker om session er aktive, om ikke, lager ny
if(session_id() == '') {
    session_start();
}
// Henter config fil
require_once "../PHP/config.php";

$innhold = $post_id = $user_id = "";

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	$user_id = $_SESSION['id'];
}

// Ser etter tomme felt for å hindre php error
if (!empty($_POST)) {
	if (isset($_POST['comment'])) {
		$innhold = $_POST['comment'];
	}
	if (isset($_POST['id'])) {
		$post_id = $_POST['id'];
	}
	
}

/* 
   Hindrer POST funksjonen i å trigre når man refresher siden, med at
   en refresh vil trigre POST om igjen og legge tomme innhold inn i
   databasen 
*/
if (isset($_POST['comment']) && isset($_POST['id'])) {

		$sql ="INSERT INTO commentary (content, post_id, user_id) VALUES('$innhold','$post_id', '$user_id')";
		if (mysqli_query($link, $sql)) 
		{
			header("gruppeEksempel.php");
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}

	if (isset($_POST['textarea']) && isset($_POST['tittel']))
	{
		$_POST['comment'] = " ";
		$_POST['id'] = " ";
	}
}

mysqli_close($link);
?>