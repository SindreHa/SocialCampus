<?php 
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
?>

<!-- Hvis bruker er logget inn vises link til min profil -->
<nav class="main-nav">
	<ul>
		<li class="menu"><a href="#" class="menyToggle">
			Meny
		</a>
		<div class="hamburger-icon">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		</li>
		<li><a href="index.php">
			<i class="fas fa-home"></i>
			Hjem
		</a></li>
		<li><a href="omoss.php">
			<i class="fas fa-info"></i>
			Om Oss
		</a></li>
		<li><a href="javascript:TooltipMessage('Side under arbeid');">
			<i class="far fa-bookmark"></i>
			Arrangementer
		</a></li>
		<li><a href="profil.php">
			<i class="fas fa-user"></i>
			Min Profil
		</a></li>
	</ul>
</nav>

<?php } else { ?>
<!-- Hvis bruker ikke er loggen inn vises link til å logge inn -->
 <nav class="main-nav">
	<ul>
		<li class="menu"><a href="#" class="menyToggle">
			Meny
		</a>
		<div class="hamburger-icon">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		</li>
		<li><a href="index.php">
			<i class="fas fa-home"></i>
			Hjem
		</a></li>
		<li><a href="omoss.php">
			<i class="fas fa-info"></i>
			Om Oss
		</a></li>
		<li><a href="javascript:TooltipMessage('Side under arbeid');">
			<i class="far fa-bookmark"></i>
			Arrangementer
		</a></li>
		<li><a href="login.php">
			<i class="fas fa-sign-in-alt"></i>
			Logg Inn
		</a></li>
	</ul>
</nav>

<?php } ?>


