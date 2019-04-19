<!DOCTYPE html>
<html lang="no">
<head>
	<title>Hjemmeside</title>
	<?php include '../PHP/head.php';?>
</head>
<body>
<div class="wrapper">  
<?php

require_once "../PHP/config.php";

/*
	Lyttere som sjekker om det blir sendt inn en php variabel, hvis f.eks logout blir sendt inn 
	blir TooltipMessage kalt med parameter "Du er nå logget ut".
*/

if (isset($_GET['logout'])){
	echo '
		<script> 
		timer = setTimeout(function() {
			TooltipMessage("Du er nå logget ut");
		}, 200);
		</script>
	';
}

if (isset($_GET['loggedin'])){
	echo '
		<script> 
		timer = setTimeout(function() {
			TooltipMessage("Du er nå logget inn");
		}, 200);
		</script>
	';
}

//Inkluderer topp meny bar fra php fil.
include '../PHP/nav.php';
?>
        
	<section class="top-container">
		<header class="showcase">
			<h1>Velkommen til SocialCampus</h1>
			<p>Velg en gruppe og møt mennesker med felles interesser!</p>
		</header>
	</section>

	<section class="search-index">
		<div class="inputContainer">
			<i class="fas fa-search input-icon"></i>
			<input type="text" class="input" name="søk" placeholder="Søk etter gruppe">
		</div>
	</section>
	<section class="boxes">
		<?php 
		$sqlGroupBox = mysqli_query($link, "SELECT * FROM application.groups");
		while($rowGroupBox = mysqli_fetch_array($sqlGroupBox)) { //Henter inn en og en gruppeboks fra database
		?>
		<a href="group.php?group_id=<?php echo $rowGroupBox['id'];?>" class="box"> <!-- Her sendes gruppeid inn med url -->
			<i class="<?php echo $rowGroupBox['group_icon'];?> fa-4x"></i>
			<h3><?php echo $rowGroupBox['name'];?></h3>
			<p><?php echo $rowGroupBox['description'];?></p>
		</a>
		<?php } ?>
		<div>
		<h4>(╯°□°)╯︵ ┻━┻</h4><h4>Søket ga ingen treff</h4> <!-- Vises hvis søk gir ingen treff -->
		</div>
	</section>
</div>
        
<?php include '../PHP/footer.php';?> <!-- Inkludering av footer fra php fil -->
<script src="../JS/groupSearch.js"></script> <!-- Javascript for søk-->
</body>
</html>