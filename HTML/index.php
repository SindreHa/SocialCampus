<!DOCTYPE html>
<html lang="no">
<head>
	<title>Hjemmeside</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,600" rel="stylesheet">
</head>
<body>
	<!-- <section class="darken hide" id="darken"></section> -->
	<div class="wrapper">
		<nav class="main-nav">
			<ul>
				<li><a href="index.php">Hjem</a></li>
				<li><a href="omoss.php">Om Oss</a></li>
				<li><a href="#">Grupper</a></li>
				<li><a id="click">Logg Inn</a>
					<div class="log-in hide" id="dropdown">
					<div class="dropdown-content">
					<form method="post">
		        	<label>Brukernavn (E-post)</label>
		        		<div class="inputContainer">
						<i class="fas fa-at input-icon"></i>
						<input type="text" class="input" name="brukernavn" placeholder="eksempel@epost.no" required>
						</div>
					<label>Passord</label>
						<div class="inputContainer" >
						<i class="fas fa-key input-icon"></i>
						<input type="password" class="input" name="passord" placeholder="••••••••••" required>
						</div>
					<p id="feil">Feil brukernavn eller passord</p>
					<input type="submit" class="btn" onclick="return checkPsw(form)" value="Logg inn">
					</form>
					<p><a href="Registrering.html">Har du ikke bruker?</a></p>
					<p><a href="Registrering.html">Glemt passord</a></p>
					</div>
		        	</div> 
	    		</li>
			</ul>
		</nav>
		<section class="top-container">
			<header class="showcase">
				<h1>Velkommen</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
				<a class="btn" href="#">Finn din gruppe</a>
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHJDa2YV51FDV-MCD1V6JAxU5NqDgTQrc&callback=myMap"></script>
</body>
</html>