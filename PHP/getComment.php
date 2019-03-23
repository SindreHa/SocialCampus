<?php

require_once "../PHP/config.php";

session_start();

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
		<div class="comment-vote">
			<a href="#/" onclick="IncrementPostLikes(this)">
				<i class="fas fa-caret-up"></i>
			</a>
			<p class="ant-likes">0</p> <!-- Antall likes -->
			<a href="#/" onclick="DecrementPostLikes(this)">
				<i class="fas fa-caret-down"></i>
			</a>
		</div>
	</div>
	<div class="comment-content">
		<h3><?php echo $rowCom[5]; ?></h3>
		<p><?php echo $rowCom[1]; ?></p>
		<p><?php echo $rowCom[2]; ?></p>
	</div>
</div>
<?php
}
?>