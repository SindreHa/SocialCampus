<?php

// Henter config fil
require_once "../PHP/config.php";

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	$user_id = $_SESSION['id'];
}

if (isset($_POST['liked'])) {
	$post_id = $_POST['post-id'];
	$com_id = $_POST['com-id'];

	if(empty($com_id)) { //Hvis det ikke er sendt inn noen kommentar-id er det likes på post
		$result = mysqli_query($link, "SELECT * FROM application.post WHERE id=$post_id");
		$row = mysqli_fetch_array($result); 
		$n = $row['likes'];

		mysqli_query($link, "INSERT INTO application.likes (user_id, post_id) VALUES ($user_id, $post_id)");
		mysqli_query($link, "UPDATE application.post SET likes=$n+1 WHERE id=$post_id");
		exit();
	} else {
		$result = mysqli_query($link, "SELECT * FROM application.commentary WHERE id=$com_id");
		$row = mysqli_fetch_array($result); 
		$n = $row['likes'];

		mysqli_query($link, "INSERT INTO application.likes (user_id, post_id, commentary_id) VALUES ($user_id, $post_id, $com_id)");
		mysqli_query($link, "UPDATE application.commentary SET likes=$n+1 WHERE id=$com_id");
		exit();
	}
}

if (isset($_POST['unliked'])) {
	$post_id = $_POST['post-id'];
	$com_id = $_POST['com-id'];
	
	if(empty($com_id)) { //Hvis det ikke er sendt inn noen kommentar-id er det dislikes på post
		$post_id = $_POST['post-id'];
		$result = mysqli_query($link, "SELECT * FROM application.post WHERE id=$post_id");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($link, "DELETE FROM application.likes WHERE post_id=$post_id AND user_id=$user_id");
		mysqli_query($link, "UPDATE application.post SET likes=$n-1 WHERE id=$post_id");
		exit();
	} else {
		$result = mysqli_query($link, "SELECT * FROM application.commentary WHERE id=$com_id");
		$row = mysqli_fetch_array($result); 
		$n = $row['likes'];

		mysqli_query($link, "DELETE FROM application.likes WHERE commentary_id=$com_id AND user_id=$user_id");
		mysqli_query($link, "UPDATE application.commentary SET likes=$n-1 WHERE id=$com_id");
		exit();
	}
}
?>