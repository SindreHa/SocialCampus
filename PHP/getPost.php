<?php

require_once "../PHP/config.php";

// $_SESSION['count'] = 4;
// $antPoster = $_SESSION['count'];

$sqlPost = "SELECT p.id, u.id, p.title, p.content, p.created, u.username FROM application.post AS p, application.user AS u WHERE p.user_id = u.id ORDER BY p.id DESC;";
$resultPost = mysqli_query($link, $sqlPost);

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	$user_id = $_SESSION['id'];
}

if ( false===$resultPost) 
{
    printf("error: %s\n", mysqli_error($link));
  }
  else 
  {
    //echo 'done.';
  }

if(mysqli_num_rows($resultPost) > 0)
{
    while($rowPost=mysqli_fetch_row($resultPost))
    {
				?>
<div class="group-post-box">
	<div class="post-wrapper">
	<div class="user-container">
		<div class="user-container-comment">
			<div class="imgContainer">
				<?php if(empty($rowPost[1])) 
				{?>
					<img src="../Pictures/upload/placeholder-profile.png">
				<?php } 
				else {?> 
					<img src="../Pictures/upload/USER_<?php echo $rowPost[1]; ?> ProfilePhoto.png"> <!-- Bilde av poster --> <?php 
				}?>
			</div>
		</div>
		<h4><?php echo $rowPost[5]; ?><p>Publisert: <?php echo $rowPost[4]; ?></p></h4> <!-- Brukernavn for innlegg -->
	</div>

	<div class="post-container">
		<h2><?php echo $rowPost[2]; ?></h2> <!-- Tittel på innlegg -->
		<p><?php echo $rowPost[3]; ?></p> <!-- Innlegg innhold -->
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
			<?php
		
			$sqlComCount = "SELECT COUNT(commentary.id) FROM application.commentary WHERE post_id = $rowPost[0];";
			$resultComCount = mysqli_query($link, $sqlComCount);
			$rowComCount =mysqli_fetch_row($resultComCount);
			if($rowComCount[0] === "1") { $comString = " kommentar"; }
			else{ $comString = " kommentarer"; }
			?>
			<h4><a class="comment-collapse" href="#/">
			<p><?php  echo $rowComCount[0] . $comString;  ?></p>
			<i class="far fa-comment-alt"><p><?php  echo $rowComCount[0]?></p></i>
			</a></h4> <!-- Antall kommentarer -->
			<h4 class="comment-date">
			<p>Publisert <?php echo $rowPost[4]; ?></p>
			</h4>
		</div>
	</div>
	</div>

	
	<div class="comment-container">
			<div class="comment-toggle"> <!-- Kommentarfelt innhold -->
			<?php
			
			$sqlCom = "SELECT c.*, u.username FROM application.commentary AS c, application.user AS u WHERE c.user_id = u.id AND c.post_id = $rowPost[0] ORDER BY made DESC;";
			$resultCom = mysqli_query($link, $sqlCom);

			while($rowCom=mysqli_fetch_row($resultCom))
			{ 
				?>
				<div class="post-comment">
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
					<div class="comment-poster-photo">
						<div class="imgContainer">
							<img src="../Pictures/upload/USER_<?php echo $rowCom[4]; ?> ProfilePhoto.png">
						</div>
					<h3><?php echo $rowCom[5]; ?></h3>
					</div>
					<p><?php echo $rowCom[1]; ?></p>
					<p><?php echo $rowCom[2]; ?></p>
				</div>
			</div>
			<?php
			}
			?>
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
				<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post">
					<div class="inputContainer">
						<input type="text" class="input" id ="comment-input" name="kommentar" placeholder="Skriv en kommentar" autocomplete="off">
						<button type="submit" disabled class="submit-comment btn" id="submit-comment_ID"><i class="far fa-comment-dots"></i></button>
						<input type="hidden" name="comment_post_ID" value="<?php echo $rowPost[0]; ?>" id="comment_post_ID" />
					</div>
				</form>
			</div>
			<?php } else { ?> <?php } ?>
	</div>
	

</div>
<?php

    }
}
?>