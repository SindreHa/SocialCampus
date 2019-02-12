<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'applikasjon');
 
/* Connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);



// hvis bruker trykker på like eller dislike knapp
if (isset($_POST['action'])) {
  $post_id = $_POST['post_id'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'like':
         $sql="INSERT INTO likes (user_id, post_id, content) 
         	   VALUES ($user_id, $post_id, 'like') 
         	   ON DUPLICATE KEY UPDATE content='like'";
         break;
  	case 'dislike':
          $sql="INSERT INTO likes (user_id, post_id, content) 
               VALUES ($user_id, $post_id, 'dislike') 
         	   ON DUPLICATE KEY UPDATE content='dislike'";
         break;
  	case 'unlike':
	      $sql="DELETE FROM likes WHERE user_id=$user_id AND post_id=$post_id";
	      break;
  	case 'undislike':
      	  $sql="DELETE FROM likes WHERE user_id=$user_id AND post_id=$post_id";
      break;
  	default:
  		break;
  }

  // kjør query for å fullføre endringer i databasen og exit
  mysqli_query($conn, $sql);
  echo getRating($post_id);
  exit(0);
}


// finn totalt antall likes for en post
function getLikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM likes 
  		  WHERE post_id = $id AND content='like'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// finn totalt antall dislikes for en post
function getDislikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM likes 
  		  WHERE post_id = $id AND content='dislike'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// finn antall likes og dislikes på en viss post
function getRating($id)
{
  global $conn;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM likes WHERE post_id = $id AND content='like'";
  $dislikes_query = "SELECT COUNT(*) FROM likes 
		  			WHERE post_id = $id AND content='dislike'";
  $likes_rs = mysqli_query($conn, $likes_query);
  $dislikes_rs = mysqli_query($conn, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
  	'likes' => $likes[0],
  	'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}

// Sjekk om brukeren allerede liker posten
function userLiked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM likes WHERE user_id=$user_id 
  		  AND post_id=$post_id AND content='like'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}


//  Sjekk om brukeren allerede disliker posten
function userDisliked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM likes WHERE user_id=$user_id 
  		  AND post_id=$post_id AND content='dislike'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}