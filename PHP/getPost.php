<?php

require_once "../PHP/config.php";

// $_SESSION['count'] = 4;
// $antPoster = $_SESSION['count'];

$sqlPost = "SELECT p.id, u.id, u.avatar, p.title, p.content, p.likes, p.created, u.username FROM application.post AS p, application.user AS u WHERE p.user_id = u.id ORDER BY p.id DESC;";
$resultPost = mysqli_query($link, $sqlPost);

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) 
	$user_id = $_SESSION['id'];
else
	$user_id = 0;

if ( false===$resultPost) 
{
    printf("error: %s\n", mysqli_error($link));
  }
  else 
  {
    //echo 'done.';
  }

// Fetch data om brukeren fra databasen
$resultUser = mysqli_query($link, "SELECT * FROM user WHERE id = $user_id");
$rowUser = mysqli_fetch_row($resultUser);

//Profilbilde for bruker
$userPicture = !empty($rowUser[6]) ? $rowUser[6] : 'placeholder-profile.png'; //Hvis avatar ikke tom så bruk avatar id hvis ikke brukes placeholder.png
$userPictureURL = '../Pictures/upload/'.$userPicture;

if(mysqli_num_rows($resultPost) > 0)
{
    while($rowPost=mysqli_fetch_array($resultPost))
    {
			if(empty($rowPost[2])) {$rowPost[2] = 'placeholder-profile.png';} // Sjekker om bruker har profilbilde lastet opp
				?>
<div class="group-post-box">
	<div class="post-wrapper">
	<div class="user-container">
		<div class="user-container-comment">
			<div class="imgContainer">
					<img src="../Pictures/upload/<?php echo $rowPost[2]; ?>" alt="Profilbilde"> <!-- Bilde av poster --> 
			</div>
		</div>
		<h4><?php echo $rowPost['username']; ?><p>Publisert: <?php echo $rowPost['created']; ?></p></h4> <!-- Brukernavn for innlegg -->
	</div>

	<div class="post-container">
		<div class="text-container">
			<h2><?php echo $rowPost['title']; ?></h2> <!-- Tittel på innlegg -->
			<p><?php echo $rowPost['content']; ?></p> <!-- Innlegg innhold -->
		</div>
		<div class="post-stats">
				<div class="like-button">
							<?php 
							if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {

							$sqlLikes = mysqli_query($link, "SELECT * FROM application.likes WHERE user_id=$user_id AND post_id=$rowPost[0] AND commentary_id IS NULL;");

							if (mysqli_num_rows($sqlLikes) == 1 ) { ?>
								<!-- Bruker har allerede likt post -->
								<a class="unlike" href="#/" data-post-id="<?php echo $rowPost[0];?>">
									<i class="unliked fas fa-thumbs-up"></i> 
									<i class="liked hide fas fa-thumbs-up"></i> 
									<p class="ant-likes"><?php echo $rowPost['likes'];?></p>
								</a>
							<?php } else { ?>
								<!-- Bruker har ikke likt post -->
								<a class="like" href="#/" data-post-id="<?php echo $rowPost[0];?>">
									<i class="liked fas fa-thumbs-up"></i>
									<i class="unliked hide fas fa-thumbs-up"></i> 
									<p class="ant-likes"><?php echo $rowPost['likes'];?></p>
								</a>
							<?php } 
							} else { ?>
								<!-- Bruker ikke logget inn -->
								<a href="#/" class="disabled">
									<i class="liked fas fa-thumbs-up"></i> 
									<p class="ant-likes"><?php echo $rowPost['likes'];?></p>
								</a>
							<?php } ?>
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
				<p>Publisert <?php echo $rowPost['created']; ?></p>
			</h4>
		</div>
	</div>
	</div>

	
	<div class="comment-container">
			<div class="comment-toggle"> <!-- Kommentarfelt innhold -->
			<?php
			
			$sqlCom = "SELECT c.*, u.username, u.avatar FROM application.commentary AS c, application.user AS u WHERE c.user_id = u.id AND c.post_id = $rowPost[0] ORDER BY made DESC;";
			$resultCom = mysqli_query($link, $sqlCom);

			while($rowCom=mysqli_fetch_array($resultCom))
			{ 
				if(empty($rowCom['avatar'])) {$rowCom['aatar'] = 'placeholder-profile.png';} // Sjekker om bruker har profilbilde lastet opp
				?>
				<div class="post-comment">
				<div class="user-container-comment">
					<div class="imgContainer">
						<img src="../Pictures/upload/<?php echo $rowCom['avatar']; ?>" alt="Profilbilde"> <!-- Bilde av poster -->
					</div>
						<div class="like-button">
							<?php 
							if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {

							$resultLikes = mysqli_query($link, "SELECT * FROM application.likes WHERE user_id=$user_id AND post_id=$rowCom[4] AND commentary_id=$rowCom[0];");

							if (mysqli_num_rows($resultLikes) == 1 ) { ?>
								<!-- Bruker har allerede likt kommentar -->
								<a class="unlike" href="#/" data-post-id="<?php echo $rowPost['id'];?>" data-com-id="<?php echo $rowCom['id'];?>">
									<i class="unliked fas fa-thumbs-up"></i> 
									<i class="liked hide fas fa-thumbs-up"></i> 
									<p class="ant-likes"><?php echo $rowCom['likes'];?></p>
								</a>
							<?php } else { ?>
								<!-- Bruker har ikke likt kommentar -->
								<a class="like" href="#/" data-post-id="<?php echo $rowPost['id'];?>" data-com-id="<?php echo $rowCom['id'];?>">
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
							<img src="../Pictures/upload/<?php echo $rowCom['avatar']; ?>" alt="Profilbilde"> <!-- Bilde av poster -->
						</div>
					</div>
					<div class="text-container">
						<h3><?php echo $rowCom['username']; ?></h3> <!-- Brukernavn -->
						<p><?php echo $rowCom['content']; ?></p> <!-- Kommentar innhold -->
						<div class="comment-stats">
							<p><?php echo $rowCom['made']; ?></p>
							<div class="like-button">
								<?php 
								if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {

								$resultLikes = mysqli_query($link, "SELECT * FROM application.likes WHERE user_id=$user_id AND post_id=$rowCom[4] AND commentary_id=$rowCom[0];");

								if (mysqli_num_rows($resultLikes) == 1 ) { ?>
									<!-- Bruker har allerede likt kommentar -->
									<a class="unlike" href="#/" data-post-id="<?php echo $rowPost[0];?>" data-com-id="<?php echo $rowCom['id'];?>">
										<i class="unliked fas fa-thumbs-up"></i> 
										<i class="liked hide fas fa-thumbs-up"></i> 
										<p class="ant-likes"><?php echo $rowCom['likes'];?></p>
									</a>
								<?php } else { ?>
									<!-- Bruker har ikke likt kommentar -->
									<a class="like" href="#/" data-post-id="<?php echo $rowPost[0];?>" data-com-id="<?php echo $rowCom['id'];?>">
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
					</div>
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
						<img src="<?php echo $userPictureURL;?>" alt="Profilbilde">
					</div>
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post">
					<div class="inputContainer">
						<input type="text" class="input" id ="comment-input" name="kommentar" placeholder="Skriv en kommentar" autocomplete="off" maxlength="850">
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