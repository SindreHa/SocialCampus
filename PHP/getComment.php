<?php

require_once "../PHP/config.php";

$post_ID = $_GET['postId'];

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) 
	$user_id = $_SESSION['id'];
else
	$user_id = 0;

$sqlCom = "SELECT c.*, u.username, u.avatar FROM application.commentary AS c, application.user AS u WHERE c.user_id = u.id AND c.post_id = $post_ID ORDER BY made DESC;";
$resultCom = mysqli_query($link, $sqlCom);

while($rowCom=mysqli_fetch_row($resultCom))
{ 
	if(empty($rowCom[7])) {$rowCom[7] = 'placeholder-profile.png';} // Sjekker om bruker har profilbilde lastet opp
	?>
	<div class="post-comment">
	<input type="hidden" name="comment_ID" value="<?php echo $rowCom[0]; ?>" id="comment_ID" />
	<div class="user-container-comment">
		<div class="imgContainer">
			<img src="../Pictures/upload/<?php echo $rowCom[7]; ?>"> <!-- Bilde av poster -->
		</div>
		<div class="like-button">
			<?php 
			if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {

			$resultLikes = mysqli_query($link, "SELECT * FROM application.likes WHERE user_id=$user_id AND post_id=$post_ID AND commentary_id=$rowCom[0];");

			if (mysqli_num_rows($resultLikes) == 1 ) { ?>
				<!-- Bruker har allerede likt kommentar -->
				<a class="unlike" href="#/" data-post-id="<?php echo $post_ID;?>" data-com-id="<?php echo $rowCom[0];?>">
					<i class="unliked fas fa-thumbs-up"></i> 
					<i class="liked hide fas fa-thumbs-up"></i> 
					<p class="ant-likes"><?php echo $rowCom[3];?></p>
				</a>
			<?php } else { ?>
				<!-- Bruker har ikke likt kommentar -->
				<a class="like" href="#/" data-post-id="<?php echo $post_ID;?>" data-com-id="<?php echo $rowCom[0];?>">
					<i class="liked fas fa-thumbs-up"></i>
					<i class="unliked hide fas fa-thumbs-up"></i> 
					<p class="ant-likes"><?php echo $rowCom[3];?></p>
				</a>
			<?php } 
			} else { ?>
				<!-- Bruker ikke logget inn -->
				<a href="#/" class="disabled">
					<i class="liked fas fa-thumbs-up"></i> 
					<p class="ant-likes"><?php echo $rowCom[3];?></p>
				</a>
			<?php } ?>
		</div>
	</div>
	<div class="comment-content">
		<div class="comment-poster-photo">
			<div class="imgContainer">
				<img src="../Pictures/upload/<?php echo $rowCom[7]; ?>"> <!-- Bilde av poster -->
			</div>
		</div>
		<div class="text-container">
			<h3><?php echo $rowCom[6]; ?></h3> <!-- Brukernavn -->
			<p><?php echo $rowCom[1]; ?></p> <!-- Kommentar innhold -->
			<div class="comment-stats">
				<p><?php echo $rowCom[2]; ?></p>
				<div class="like-button">
				<form method="post" action="">
					<a href="#/" onclick="IncrementPostLikes(this)">
					<i class="fas fa-thumbs-up"></i>
						<p class="ant-likes">0</p> <!-- Antall likes -->
					</a>
					<input type="hidden" name="comment_ID" value="<?php echo $rowCom[0]; ?>" id="comment_ID" />
				</form>
				</div>
			</div> <!-- Kommentar dato -->
		</div>
	</div>
</div>
<?php
}
?>