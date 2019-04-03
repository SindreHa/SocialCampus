<?php

require_once "../PHP/config.php";

$post_ID = $_GET['postId'];

$sqlCom = "SELECT c.*, u.username FROM application.commentary AS c, application.user AS u WHERE c.user_id = u.id AND c.post_id = $post_ID ORDER BY made DESC;";
$resultCom = mysqli_query($link, $sqlCom);


while($rowCom=mysqli_fetch_row($resultCom))
{ 
	?>
	<div class="post-comment">
	<input type="hidden" name="comment_ID" value="<?php echo $rowCom[0]; ?>" id="comment_ID" />
	<div class="user-container-comment">
		<div class="imgContainer">
			<img src="../Pictures/upload/USER_<?php echo $rowCom[4]; ?> ProfilePhoto.png">
		</div>
		<div class="like-button">
		<form method="post" action="">
			<a href="#/" onclick="IncrementPostLikes(this)">
			<i class="fas fa-thumbs-up"></i>
				<p class="ant-likes">0</p> <!-- Antall likes -->
			</a>
			<input type="hidden" name="comment_ID" value="<?php echo $rowCom[0]; ?>" id="comment_ID" />
		</form>
		</div>
	</div>
	<div class="comment-content">
		<div class="comment-poster-photo">
			<div class="imgContainer">
				<img src="../Pictures/upload/USER_<?php echo $rowCom[4]; ?> ProfilePhoto.png">
			</div>
		</div>
		<div class="text-container">
			<h3><?php echo $rowCom[5]; ?></h3> <!-- Brukernavn -->
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