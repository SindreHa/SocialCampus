<!DOCTYPE html>
<html lang="no">
<head>
	<title>Hjemmeside</title>
	<?php include '../PHP/head.php';?>
</head>
<body>
<!-- <section class="darken hide" id="darken"></section> -->
<div class="wrapper">  
<?php

require_once "../PHP/config.php";

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

include '../PHP/nav.php';
?>
        
	<section class="top-container">
		<header class="showcase">
			<h1>Velkommen</h1>
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
		while($rowGroupBox = mysqli_fetch_array($sqlGroupBox)) {
		?>
		<a href="<?php echo $rowGroupBox['name'];?>.php" class="box">
			<i class="<?php echo $rowGroupBox['group_icon'];?> fa-4x"></i>
			<h3><?php echo $rowGroupBox['name'];?></h3>
			<p><?php echo $rowGroupBox['description'];?></p>
		</a>
		<?php } ?>
		<h4>¯\_(ツ)_/¯<br>Søket ga ingen treff</h4>
	</section>
</div>
        
<?php include '../PHP/footer.php';?>
<script src="../JS/groupSearch.js"></script>
</body>
</html>