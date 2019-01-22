<!DOCTYPE html>
<html lang="no">
<head>
	<title>Golf</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600" rel="stylesheet">
</head>
<body>
	<!-- <section class="darken hide" id="darken"></section> -->
	<div class="wrapper">
        
	<?php include '../PHP/nav.php';?>

		<section class="group-container">

			<section class="group-info">
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
			</section>

			<section class="group-search">
				<div class="inputContainer">
				<i class="fas fa-search input-icon"></i>
				<form>
				<input type="text" class="input" name="søk" placeholder="Søk i gruppe">
				<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"tabindex="-1">
				</form>
			</div>
			</section>

			<section class="group-post">

				<div class="group-post-box">
					<div class="user-container">
						<div class="imgContainer">
							<img src="../Pictures/Sindre.jpg">
						</div>
						<h4>Sosinondodrore</h4>
					</div>
					<div class="post-container">
						<h2>Min post</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<div class="post-stats">
								<a href="#" class="like-button" onclick="IncrementPostLikes(this)">
									<i class="fas fa-thumbs-up"></i>
									<p id="antLikes">-1 </p><!-- antall likes  -->
								</a>
								<a href="#" class="like-button" onclick="DecrementPostLikes(this)">
									<i class="fas fa-thumbs-down"></i>
								</a>
							<h4>Publisert</h4>
							<h4>17.01.2019</h4> <!-- Dato -->
							<h4>00:41</h4> <!-- Klokkeslett -->
						</div>
					</div>
				</div>
				<div class="group-post-box">
					<div class="user-container">
						<div class="imgContainer">
							<img src="../Pictures/kristian.jpg">
						</div>
						<h4>Elementz</h4>
					</div>
					<div class="post-container">
						<h2>Din post</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<div class="post-stats">
								<a href="#" class="like-button" onclick="IncrementPostLikes(this)">
									<i class="fas fa-thumbs-up"></i>
									<p id="antLikes">21 </p> <!-- antall likes  -->
								</a>
								<a href="#" class="like-button" onclick="DecrementPostLikes(this)">
									<i class="fas fa-thumbs-down"></i>
								</a>
							<h4>Publisert</h4>
							<h4>17.01.2019</h4> <!-- Dato -->
							<h4>00:43</h4> <!-- Klokkeslett -->
						</div>
					</div>
				</div>
				<div class="group-post-box">
					<div class="user-container">
						<div class="imgContainer">
							<img src="../Pictures/torbjorn.jpg">
						</div>
						<h4>Turbobjørn</h4>
					</div>
					<div class="post-container">
						<h2>Han sin post</h2>
						<p>
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<div class="post-stats">
								<a href="#" class="like-button" onclick="IncrementPostLikes(this)">
									<i class="fas fa-thumbs-up"></i>
									<p id="antLikes">14 </p> <!-- antall likes  -->
								</a>
								<a href="#" class="like-button" onclick="DecrementPostLikes(this)">
									<i class="fas fa-thumbs-down"></i>
								</a>
							<h4>Publisert</h4>
							<h4>17.01.2019</h4> <!-- Dato -->
							<h4>00:45</h4> <!-- Klokkeslett -->
						</div>
					</div>
				</div>
				<div class="group-post-box">
					<div class="user-container">
						<div class="imgContainer">
							<img src="../Pictures/jan3.png">
						</div>
						<h4>Ryouta</h4>
					</div>
					<div class="post-container">
						<h2>Ikke min post</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<div class="post-stats">
								<a href="#" class="like-button" onclick="IncrementPostLikes(this)">
									<i class="fas fa-thumbs-up"></i>
									<p id="antLikes">657 </p> <!-- antall likes  -->
								</a>
								<a href="#" class="like-button" onclick="DecrementPostLikes(this)">
									<i class="fas fa-thumbs-down"></i>
								</a>
							<h4>Publisert</h4>
							<h4>17.01.2019</h4> <!-- Dato -->
							<h4>00:48</h4> <!-- Klokkeslett -->
						</div>
					</div>
				</div>
				<div class="group-post-box">
					<div class="user-container">
						<div class="imgContainer">
							<img src="../Pictures/placeholder-profile.png">
						</div>
						<h4>User2</h4>
					</div>
					<div class="post-container">
						<h2>En annen sin post</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat</p>
						<div class="post-stats">
								<a href="#" class="like-button" onclick="IncrementPostLikes(this)">
									<i class="fas fa-thumbs-up"></i>
									<p id="antLikes">1 </p> <!-- antall likes  -->
								</a>
								<a href="#" class="like-button" onclick="DecrementPostLikes(this)">
									<i class="fas fa-thumbs-down"></i>
								</a>
							<h4>Publisert</h4>
							<h4>17.01.2019</h4> <!-- Dato -->
							<h4>00:49</h4> <!-- Klokkeslett -->
						</div>
					</div>
				</div>

			</section>
	</div>
		
<?php include '../PHP/footer.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../JS/js.js"></script>
<script src="../JS/NumberHandler.js"></script>
</body>
</html>