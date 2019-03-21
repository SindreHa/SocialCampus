<?php

require_once "../PHP/config.php";

// $_SESSION['count'] = 4;
// $antPoster = $_SESSION['count'];

$sql = "SELECT p.id, u.id, p.title, p.content, p.created, u.username FROM application.post AS p, application.user AS u WHERE p.user_id = u.id ORDER BY p.id DESC;";
$result = mysqli_query($link, $sql);

session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	$user_id = $_SESSION['id'];
}

if ( false===$result ) 
{
    printf("error: %s\n", mysqli_error($link));
  }
  else 
  {
    //echo 'done.';
  }

if(mysqli_num_rows($result) > 0)
{
    while($row=mysqli_fetch_row($result))
    {
				?>
<div class="group-post-box">

	<div class="user-container">
		<div class="user-container-comment">
			<div class="imgContainer">
				<?php if(empty($row[1])) 
				{?>
					<img src="../Pictures/upload/placeholder-profile.png">
				<?php } 
				else {?> 
					<img src="../Pictures/upload/USER_<?php echo $row[1]; ?> ProfilePhoto.png"> <!-- Bilde av poster --> <?php 
				}?>
			</div>
		</div>
		<h4><?php echo $row[5]; ?></h4> <!-- Brukernavn for innlegg -->
	</div>

	<div class="post-container">
		<h2><?php echo $row[2]; ?></h2> <!-- Tittel på innlegg -->
		<p><?php echo $row[3]; ?> </p> <!-- Innlegg innhold -->
		<div class="post-stats">
				<div>
					<a href="#/" class="like-button" onclick="IncrementPostLikes(this)">
						<i class="fas fa-caret-up"></i>
					</a>
					<p class="ant-likes">0</p> <!-- Antall likes -->
					<a href="#/" class="like-button" onclick="DecrementPostLikes(this)">
						<i class="fas fa-caret-down"></i>
					</a>
				</div>
			<h4><a class="comment-collapse" href="#/">0 kommentarer</a></h4> <!-- Antall kommentarer -->
			<h4>Publisert</h4>
			<h4><?php echo $row[4]; ?></h4> <!-- PHP DATO -->
		</div>
	</div>

	
	<div class="comment-container">
			<div class="comment-toggle"> <!-- Kommentarfelt innhold -->

			</div>
			<?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {?> <!-- Skjul kommentarpublisering hvis ikke logget inn -->
			<div class="comment-submit-container"> <!-- Kommentarfelt publisering -->
				<div class="user-container-comment">
					<div class="imgContainer">
					<?php if(empty($user_id)) {?>
						<img src="../Pictures/upload/placeholder-profile.png">
					<?php } 
						else {?> 
							<img src="../Pictures/upload/USER_<?php echo $user_id; ?> ProfilePhoto.png"> <!-- Bilde av innlogget bruker --> <?php 
					}?>
					</div>
				</div>
				<form >
				<div class="inputContainer">
					<input type="text" class="input" name="kommentar" placeholder="Skriv en kommentar" autocomplete="off">
					<input type="submit" value="Publiser" class="sumbit-comment btn" id="submit-comment_ID">
					<input type="hidden" name="comment_post_ID" value="<?php echo $row[0]; ?>" id="comment_post_ID" />
				</div>
				</form>
			</div>
			<?php } else { ?> <?php } ?>
	</div>
	

</div>

<script>
	$(".comment-collapse").click( function(e) {
			e.preventDefault(); 
			$(this).closest(".post-container").next().find(".comment-toggle").slideToggle();
			return false; 
		});
</script>
<?php

    }
}
?>