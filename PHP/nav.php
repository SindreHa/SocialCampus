<?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {?>

<nav class="main-nav">
	<ul>
		<li><a href="index.php">Hjem</a></li>
		<li><a href="omoss.php">Om Oss</a></li>
		<li><a href="#">Grupper</a></li>
		<li><a href="profil.php"><?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>
	</ul>
</nav>

<?php } else { ?>

 <nav class="main-nav">
	<ul>
		<li><a href="index.php">Hjem</a></li>
		<li><a href="omoss.php">Om Oss</a></li>
		<li><a href="gruppeEksempel.php">Grupper</a></li>
		<li><a href="login.php">Logg Inn</a></li>
	</ul>
</nav>

<?php } ?>


