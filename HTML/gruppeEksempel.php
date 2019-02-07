
<?php
// Sjekker om session er aktive, om ikke, lager ny
if(session_id() == '') {
    session_start();
}
// Henter config fila
require_once "../PHP/config.php";
//$tittel = $_POST('tittel');
$kommentar = "";

// Ser etter tomme felt for å hindre php error
if (!empty($_POST)) {
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

		$sql ="INSERT INTO post (innhold) VALUES('$kommentar')";
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
				<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>"class="form-input" id="group-form" method="post">
					<input type="text" name="headline" placeholder="Tittel" id="post-title-ID">
					<textarea class="innhold" name="textarea" form="group-form" placeholder="Tekst" id="text-area-ID"maxlength="256"></textarea>
					<div class="post-submit-container">
						<button class="btn submit-comment" id="post-submit-ID">Publiser</button>
						<h5 id="ord-teller-ID">0/256</h5>
					</div>
				</form>
				
			</div>
			<button class="btn" id="newCommentButton-ID" onclick="loadMoreComments()">Last inn tidligere kommentarer</button> <!-- Sindre fiks posisjon pls? <3 -->

			</section>

			<section class="group-post">
			<div>
				<!-- Her blir kommentarene lagt inn -->
			</div>
			</section>
			
			
		</section>
		
	</div>
		
<?php include '../PHP/footer.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../JS/js.js"></script>
<script src="../JS/PostManager.js"></script>
<script src="../JS/Kommentarfelt.js"></script>
</body>
</html>