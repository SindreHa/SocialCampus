<?php

require_once "../PHP/config.php";

$post_ID = $_GET['post_id'];

if (isset($_GET['group_id'])){
	$group_id = $_GET['group_id'];
}

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) 
	$user_id = $_SESSION['id'];
else
	$user_id = 0;

$sqlCom = "SELECT c.*, u.username, u.avatar FROM application.commentary AS c, application.user AS u WHERE c.user_id = u.id AND c.post_id = $post_ID ORDER BY made DESC;";
$resultCom = mysqli_query($link, $sqlCom);

$resultGroupName = mysqli_query($link, "SELECT name FROM application.groups WHERE id=$group_id;");
$group_name = mysqli_fetch_array($resultGroupName);

while($rowCom=mysqli_fetch_array($resultCom))
{ 
	if(empty($rowCom['avatar'])) {$rowCom['avatar'] = 'placeholder-profile.png';} // Sjekker om bruker har profilbilde lastet opp
	?>
	<div class="post-comment">
	<input type="hidden" name="comment_ID" value="<?php echo $rowCom['id']; ?>" id="comment_ID" />
	<div class="user-container-comment">
		<div class="imgContainer">
			<img src="../Pictures/upload/<?php echo $rowCom['avatar']; ?>"> <!-- Bilde av poster -->
		</div>
		<div class="like-button">
			<?php 
			if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {

			$resultLikes = mysqli_query($link, "SELECT * FROM application.likes WHERE user_id=$user_id AND post_id=$post_ID AND commentary_id=$rowCom[0];");

			if (mysqli_num_rows($resultLikes) == 1 ) { ?>
				<!-- Bruker har allerede likt kommentar -->
				<a class="unlike" href="<?php echo $group_name['name']?>.php" data-post-id="<?php echo $post_ID;?>" data-com-id="<?php echo $rowCom['id'];?>">
					<i class="unliked fas fa-thumbs-up"></i>
					<i class="liked hide fas fa-thumbs-up"></i>
					<p class="ant-likes"><?php echo $rowCom['likes'];?></p>
				</a>
			<?php } else { ?>
				<!-- Bruker har ikke likt kommentar -->
				<a class="like" href="<?php echo $group_name['name']?>.php" data-post-id="<?php echo $post_ID;?>" data-com-id="<?php echo $rowCom['id'];?>">
					<i class="liked fas fa-thumbs-up"></i>
					<i class="unliked hide fas fa-thumbs-up"></i> 
					<p class="ant-likes"><?php echo $rowCom['likes'];?></p>
				</a>
			<?php } 
			} else { ?>
				<!-- Bruker ikke logget inn -->
				<a href="#/" class="disabled">
					<i class="liked fas fa-thumbs-up"></i> 
					<p class="ant-likes"><?php echo $rowCom['likes'];?></p>
				</a>
			<?php } ?>
		</div>
	</div>
	<div class="comment-content">
		<div class="comment-poster-photo">
			<div class="imgContainer">
				<img src="../Pictures/upload/<?php echo $rowCom['avatar']; ?>"> <!-- Bilde av poster -->
			</div>
		</div>
		<div class="text-container">
			<h3><?php echo $rowCom['username']; ?></h3> <!-- Brukernavn -->
			<p><?php echo $rowCom['content']; ?></p> <!-- Kommentar innhold -->
			<div class="comment-stats">
				<p><?php echo $rowCom['made']; ?></p>
				<div class="like-button">
				<form method="post" action="">
					<a href="#/" onclick="IncrementPostLikes(this)">
					<i class="fas fa-thumbs-up"></i>
						<p class="ant-likes">0</p> <!-- Antall likes -->
					</a>
					<input type="hidden" name="comment_ID" value="<?php echo $rowCom['id']; ?>" id="comment_ID" />
				</form>
				</div>
			</div> <!-- Kommentar dato -->
		</div>
	</div>
</div>
<?php
}
?>