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
		<a href="group.php?group_id=<?php echo $rowGroupBox['id'];?>" class="box">
			<i class="<?php echo $rowGroupBox['group_icon'];?> fa-4x"></i>
			<h3><?php echo $rowGroupBox['name'];?></h3>
			<p><?php echo $rowGroupBox['description'];?></p>
		</a>
		<?php } ?>
		<div>
		<h4>(╯°□°)╯︵ ┻━┻</h4><h4>Søket ga ingen treff</h4>
		</div>
	</section>
</div>
        
<?php include '../PHP/footer.php';?>
<script src="../JS/groupSearch.js"></script>
</body>
</html>