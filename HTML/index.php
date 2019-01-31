<!DOCTYPE html>
<html lang="no">
<head>
	<title>Hjemmeside</title>
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
        
		<section class="top-container">
			<header class="showcase">
				<h1>Velkommen</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
			</header>
		</section>

		<section class="search-index">
			<div class="inputContainer">
				<i class="fas fa-search input-icon"></i>
				<form>
				<input type="text" class="input" name="søk" placeholder="Søk etter gruppe">
				<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"tabindex="-1">
				</form>
			</div>
		</section>
		<section class="boxes">
			<a href="#"><div class="box">
				<i class="fas fa-table-tennis fa-4x"></i>
				<h3>Bordtennis</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
			</div></a>
			<a href="#"><div class="box">
				<i class="fas fa-futbol fa-4x"></i>
				<h3>Fotball</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
			</div></a>
			<a href="#"><div class="box">
				<i class="fas fa-volleyball-ball fa-4x"></i>
				<h3>Volleyball</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
			</div></a>
			<a href="#"><div class="box">
				<i class="fas fa-basketball-ball fa-4x"></i>
				<h3>Basketball</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
			</div></a>
			<a href="gruppeEksempel.php"><div class="box">
				<i class="fas fa-golf-ball fa-4x"></i>
				<h3>Golf</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
			</div></a>
			<a href="#"><div class="box">
				<i class="fas fa-gamepad fa-4x"></i>
				<h3>Spilling</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
			</div></a>
			<a href="#"><div class="box">
				<i class="fas fa-camera fa-4x"></i>
				<h3>Fotografering</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
			</div></a>
			<a href="#"><div class="box">
				<i class="fas fa-book fa-4x"></i>
				<h3>Bokklubb</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
			</div></a>
		</section>
	</div>
        
<?php include '../PHP/footer.php';?>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../JS/js.js"></script>
<script src="../JS/NumberHandler.js"></script>
</body>
</html>