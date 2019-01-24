<!DOCTYPE html>
<html lang="no">
<head>
	<title>Om Oss</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600" rel="stylesheet">
</head>
<body>
	<!-- <section class="darken hide" id="darken"></section> -->
	<div class="wrapper">
        
	<?php
                session_start();

        include '../PHP/nav.php';?>

		<section class="top-container-double">
			<header class="showcase usn">
				<h1>Om oss</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod
				consequat. Duis aute irure dolor in reprehenderit.</p>
			</header>
			<div id="mapContainer"></div>
		</section>

		<section class="aboutUs">
			<div class="personBox">
				<div class="personBox-image-wrapper">
					<div class="imgContainer">
						<img src="../Pictures/Sindre.jpg">
					</div>
					<h2>Sindre - Webdesign</h2>
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
					<h2>Kristian - PHP</h2>
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
					<h2>Torbjørn - Database</h2>
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
					<h2>Jan - JavaScript</h2>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../JS/js.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHJDa2YV51FDV-MCD1V6JAxU5NqDgTQrc&callback=myMap"></script>
</body>
</html>