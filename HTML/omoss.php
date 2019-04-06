<!DOCTYPE html>
<html lang="no">
<head>
	<title>Om Oss</title>
	<?php include '../PHP/head.php';?>
</head>
<body>
<div class="wrapper">
<?php
session_start();
include '../PHP/nav.php';
?>

<section class="top-container-double">
	<header class="showcase usn">
		<h1>Om oss</h1>
		<p>SIDENAVN er en nettside som ble startet utviklingen på i slutten av 2018. 
		Bak kulissene er det 4 talenter som du kan lese mer om her på denne siden. 
		Rundt om på dette nettstedet skal du kunne finne deg nye venner 
		med samme interresser som deg og ha et sted å snakke om disse.</p>
	</header>
	<div id="mapContainer"></div>
</section>

<section class="aboutUs">
	<div class="personBox">
		<div class="personBox-image-wrapper">
			<div class="imgContainer">
				<img src="../Pictures/Sindre.jpg">
			</div>
			<h2>Sindre Haavaldsen</h2>
			<h3>Webdesign</h3>
		</div>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui</p>
	</div>
	<div class="personBox">
		<div class="personBox-image-wrapper">
			<div class="imgContainer">
				<img src="../Pictures/Kristian.jpg">
			</div>
			<h2>Kristian Kløvstad</h2>
			<h3>PHP</h3>
		</div>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
	<div class="personBox">
		<div class="personBox-image-wrapper">
			<div class="imgContainer">
				<img src="../Pictures/Torbjorn.jpg">
			</div>
			<h2>Torbjørn Lunde Olaisen</h2>
			<h3>Database</h3>
		</div>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
	<div class="personBox">
		<div class="personBox-image-wrapper">
			<div class="imgContainer">
				<img src="../Pictures/Jan.png">
			</div>
			<h2>Jan Andreas Sletta</h2>
			<h3>Javascript</h3>
		</div>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore.</p>
	</div>
</section>

</div>

<?php include '../PHP/footer.php';?>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHJDa2YV51FDV-MCD1V6JAxU5NqDgTQrc&callback=myMap"></script>
</body>
</html>