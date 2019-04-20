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

/*
	Lyttere som sjekker om det blir sendt inn en php variabel, hvis f.eks logout blir sendt inn 
	blir TooltipMessage kalt med parameter "Du er nå logget ut".
*/

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

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	$user_id = $_SESSION['id'];
}

//Inkluderer topp meny bar fra php fil.
include '../PHP/nav.php';
?>
        
	<section class="top-container">
		<header class="showcase">
			<h1>Velkommen til SocialCampus</h1>
			<p>Finn en gruppe og møt mennesker med felles interesser!</p>
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
			
			while($rowGroupBox = mysqli_fetch_array($sqlGroupBox)) { //Henter inn en og en gruppeboks fra database
			
			//Tell antall medlemmer i gruppen
			$countAntUser = mysqli_query($link, "SELECT COUNT(gusers.user_id) FROM groups_has_users AS gusers WHERE group_id = $rowGroupBox[0];");
			$antUser = mysqli_fetch_array($countAntUser);
		
			//Tell antall poster i gruppen
			$countAntPost = mysqli_query($link, "SELECT COUNT(p.id) FROM application.post AS p WHERE p.group_id = $rowGroupBox[0];");
			$antPost = mysqli_fetch_array($countAntPost);

			//Antall nye poster
			if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
				$newPostCountSql = mysqli_query($link, "SELECT count(DISTINCT(post.id)) AS Antall
				FROM post, user_visited
				WHERE post.created > user_visited.visited 
				AND post.group_id = $rowGroupBox[0] 
				AND post.user_id != $user_id 
				AND user_visited.group_id = $rowGroupBox[0]
				AND user_visited.user_id = $user_id;");
				$newPostCount = mysqli_fetch_row($newPostCountSql);
			}
		?>
			<a href="group.php?group_id=<?php echo $rowGroupBox['id'];?>" class="box"> <!-- Her sendes gruppeid inn med url -->
				<?php 
					if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
					if($newPostCount[0] > 0 && $_SESSION["loggedin"] === true) {
					
					if($newPostCount[0] == 1) {$newPostString = " nytt innlegg";} else {$newPostString = " nye innlegg";}?>
					<p class="new-post"><?php echo $newPostCount[0];?><?php echo $newPostString;?></p>
				<?php } } else {} ?>
				<i class="<?php echo $rowGroupBox['group_icon'];?> fa-4x"></i>
				<h3><?php echo $rowGroupBox['name'];?></h3>
				<div class="group-stat">
					<i class="fas fa-user"><p><?php echo $antUser[0];?></p></i>
					<i class="fas fa-comment"><p><?php echo $antPost[0];?></p></i>
				</div>
				<p><?php echo $rowGroupBox['description'];?></p>
			</a>
		<?php } ?>
		<div>
			<h4>(╯°□°)╯︵ ┻━┻</h4><h4>Søket ga ingen treff</h4> <!-- Vises hvis søk gir ingen treff -->
		</div>
	</section>
</div>
        
<?php include '../PHP/footer.php';?> <!-- Inkludering av footer fra php fil -->
<script src="../JS/groupSearch.js"></script> <!-- Javascript for søk-->
</body>
</html>