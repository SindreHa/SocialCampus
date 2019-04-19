<?php
// Henter config fil
require_once "../PHP/config.php";

$innhold = $post_id = $user_id = "";

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	$user_id = $_SESSION['id'];
}

// Deklarerer variabler for innhold og post id
if (!empty($_POST)) {
	if (isset($_POST['comment'])) {
		$innhold = trim($_POST['comment']);
	}
	if (isset($_POST['p_id'])) {
		$post_id = $_POST['p_id'];
	}
	
}

/* 
   Setter inn kommentarinnhold i databasen med tilhørende post id og bruker id
*/
if (isset($_POST['comment']) && isset($_POST['p_id'])) {

		$sql ="INSERT INTO commentary (content, post_id, user_id) VALUES('$innhold','$post_id', '$user_id')";
		if (mysqli_query($link, $sql)) 
		{
			header("gruppeEksempel.php");
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}

	// Klarerer POST verdier etter vellykket innsetting
	if (isset($_POST['comment']) && isset($_POST['p_id']))
	{
		$_POST['comment'] = " ";
		$_POST['p_id'] = " ";
	}
}
?>