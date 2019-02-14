<?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {?>

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
		<li><a href="gruppeEksempel.php">
			<i class="far fa-bookmark"></i>
			Grupper
		</a></li>
		<li><a href="profil.php">
			<i class="fas fa-user"></i>
			min Profil
		</a></li>
	</ul>
</nav>

<?php } else { ?>

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
		<li><a href="gruppeEksempel.php">
			<i class="far fa-bookmark"></i>
			Grupper
		</a></li>
		<li><a href="login.php">
			<i class="fas fa-sign-in-alt"></i>
			Logg Inn
		</a></li>
	</ul>
</nav>

<?php } ?>


