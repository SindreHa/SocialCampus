<!DOCTYPE html>
<html lang="no">
<head>
	<title>Golf</title>
	<?php include '../PHP/head.php';?>
</head>
<body>
	<!-- <section class="darken hide" id="darken"></section> -->
	<div class="wrapper">
        
	<?php 
                session_start();

        include '../PHP/nav.php';?>

		<section class="group-container">
			<section class="group-info-wrapper">

			

			<div class="group-info">
				<div class="info-wrapper">
					<div class="group-name">
						<i class="fas fa-golf-ball fa-3x"></i>
						<h2>Golf</h2>
					</div>
					<div class="group-stats">
						<h5>192</h5>
						<h6>Antall medlemmer</h6>
					</div>
					<div class="group-stats border">
						<h5>5</h5>
						<h6>Antall poster</h6>
					</div>
				</div>
				<div class="group-description">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</div>
			</div>

			<div class="group-post-creator-wrapper">
				<div class="post-input-header">
					<i class="far fa-comment fa-3x"></i>
					<h2>Publiser innlegg</h2>
				</div>
				<form class="form-input" id="group-form">
					<input type="text" name="headline" placeholder="Tittel">
					<textarea name="text" form="group-form" placeholder="Tekst" id="text-area-ID"maxlength="256"></textarea>
					<div class="post-submit-container">
						<button class="btn" id="post-submit-ID">Publiser</button>
						<h5 id="ord-teller-ID">0/256</h5>
					</div>
				</form>
			</div>

			</section>

			<section class="group-post">
				<?php include '../PHP/post.php';?>
				<button class="btn" id="newCommentButton-ID">Last inn mer</button>
			</section>
		</section>
	</div>
		
<?php include '../PHP/footer.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../JS/js.js"></script>
<script src="../JS/NummerBeregner.js"></script>
<script src="../JS/Kommentarfelt.js"></script>
</body>
</html>