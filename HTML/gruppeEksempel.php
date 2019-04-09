<?php 

require_once "../PHP/config.php";

$postCountResult = mysqli_query($link, "SELECT COUNT(id) FROM post");
$postCount = mysqli_fetch_row($postCountResult);

$ant_poster = $postCount[0];

$userCountResult = mysqli_query($link, "SELECT COUNT(id) FROM user");
$userCount = mysqli_fetch_row($userCountResult);

$ant_medlem = $userCount[0];

$group_id = "1";
$groupSql = mysqli_query($link, "SELECT * FROM application.groups WHERE id=$group_id");
$groupResult = mysqli_fetch_array($groupSql); 

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

<!DOCTYPE html>
<html lang="no">
<head>
	<title>Golf</title>
	<?php include '../PHP/head.php';?>
</head>
<body>
	<!-- <section class="darken hide" id="darken"></section> -->
	<div class="wrapper">
        
	<?php include '../PHP/nav.php';?>

			<section class="group-info-wrapper">

			<div class="group-info">
				<div class="info-wrapper">
					<div class="group-name">
						<i class="fas fa-golf-ball fa-3x"></i>
						<h2>Golf</h2>
					</div>
					<div class="group-stats-wrapper">
					<div class="group-stats">
						<h5><?php echo $ant_medlem; ?></h5>
						<h6>Antall medlemmer</h6>
					</div>
					<div class="group-stats">
						<h5><?php echo $ant_poster; ?></h5>
						<h6>Antall poster</h6>
					</div>
					</div>
				</div>
				<div class="group-description">
					<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque officia nesciunt voluptatibus eius aliquid, reprehenderit iure quam fugit, architecto qui soluta porro accusamus veniam sequi! Obcaecati ratione expedita ea velit. 
					</p>
				</div>
			</div>
						
			<?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {?>
			<div class="group-post-creator-wrapper">
				<div class="post-input-header">
					<i class="far fa-comment fa-3x"></i>
					<h2>Publiser innlegg</h2>
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>"class="form-input" id="group-form" method="post">
					<input type="text" name="headline" placeholder="Tittel" class="tittel" id="post-title-ID" autocomplete="off">
					<textarea class="innhold" name="textarea" form="group-form" placeholder="Tekst" id="text-area-ID"maxlength="850"></textarea>
					<div class="post-submit-container">
						<button class="btn submit-post" id="post-submit-ID" >Publiser</button>
						<h5 id="ord-teller-ID">0/850</h5>
					</div>
				</form>
				
			</div>
			<?php } else { ?>
			<div class="group-post-creator-wrapper">
				<div class="post-input-header">
					<i class="far fa-comment fa-3x"></i>
					<h2>Publiser innlegg</h2>
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>"class="form-input" id="group-form" method="post">
					<input disabled placeholder="Logg inn for å publisere innlegg" class="tittel" id="post-title-ID" autocomplete="off" maxlength="255">
					<textarea disabled class="innhold" name="textarea" form="group-form" id="text-area-ID" maxlength="850"></textarea>
					<div class="post-submit-container">
						<button class="btn submit-comment" onclick="TooltipMessage('Innlegg publisert')" id="post-submit-ID" >Publiser</button>
						<h5 id="ord-teller-ID">0/850</h5>
					</div>
				</form> 
			</div>
			<?php } ?>

			</section>

			<section class="group-post-wrapper">
				<div class="group-post">
				<!-- Plassering av poster -->
				</div>
			</section>
		
	</div>
		
<?php include '../PHP/footer.php';?>

<script src="../JS/PostManager.js"></script>
<script src="../JS/PostFetch.js"></script>
<script src="../JS/likes.js"></script>
</body>
</html>