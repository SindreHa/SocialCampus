
<?php 
require_once "../PHP/config.php";

$sql = "SELECT COUNT(id) FROM post";
$result = mysqli_query($link, $sql);
$count = mysqli_fetch_row($result);

$ant_poster = $count[0];

$sql = "SELECT COUNT(id) FROM user";
$result = mysqli_query($link, $sql);
$count = mysqli_fetch_row($result);

$ant_medlem = $count[0];


include '../PHP/savePost.php';
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
					<input disabled placeholder="Logg inn for å publisere innlegg" class="tittel" id="post-title-ID" autocomplete="off">
					<textarea disabled class="innhold" name="textarea" form="group-form" placeholder="Logg inn for å publisere innlegg" id="text-area-ID"maxlength="850"></textarea>
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
				
				</div>
			</section>
		
	</div>
		
<?php include '../PHP/footer.php';?>

<script src="../JS/PostManager.js"></script>
<script src="../JS/PostFetch.js"></script>
<script src="../JS/CommentFetch.js"></script>
</body>
</html>