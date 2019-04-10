<?php
// Henter config fil
require_once "../PHP/config.php";

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	$user_id = $_SESSION['id'];
}

// Ser etter tomme felt for å hindre php error
if (!empty($_POST)) {
	if (isset($_POST['tittel'])) {
		$tittel = trim($_POST['tittel']);
	}
	if (isset($_POST['textarea'])) {
		$innhold = trim($_POST['textarea']);
	}
	if (isset($_POST['group_id'])) {
		$group_id = trim($_POST['group_id']);
	}
}

/* 
   Hindrer POST funksjonen i å trigre når man refresher siden, med at
   en refresh vil trigre POST om igjen og legge tomme innhold inn i
   databasen 
*/
if (isset($_POST['textarea']) && isset($_POST['tittel'])) {

		$sql ="INSERT INTO application.post (title, content, user_id, group_id) VALUES('$tittel','$innhold', '$user_id', $group_id)";
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
		$_POST['textarea'] = " ";
		$_POST['tittel'] = " ";
	}
}
?>