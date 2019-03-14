
<?php

require_once "../PHP/config.php";

$_SESSION['count'] = 4;
$antPoster = $_SESSION['count'];

$sql = "SELECT * FROM post ORDER BY id DESC LIMIT $antPoster";
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
				<?php if(empty($row[4])) 
				{?>
					<img src="../Pictures/upload/placeholder-profile.png">
				<?php } 
				else {?> 
					<img src="../Pictures/upload/USER_<?php echo $row[4]; ?> ProfilePhoto.png"> <!-- Bilde av poster --> <?php 
				}?>
			</div>
		</div>
		<h4>Brukernavn</h4> <!-- Brukernavn for innlegg -->
	</div>

	<div class="post-container">
		<h2><?php echo $row[1]; ?></h2> <!-- Tittel på innlegg -->
		<p><?php echo $row[2]; ?> </p> <!-- Innlegg innhold -->
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
			<h4><a class="comment-collapse" href="#/">2 kommentarer</a></h4> <!-- Antall kommentarer -->
			<h4>Publisert</h4>
			<h4><?php echo $row[3]; ?></h4> <!-- PHP DATO -->
		</div>
	</div>

	<div class="comment-container">
			<div class="comment-toggle"> <!-- Kommentarfelt innhold -->

			<div class="post-comment">
				<div class="user-container-comment">
					<div class="imgContainer">
						<img src="../Pictures/kristian.jpg">
					</div>
					<div class="comment-vote">
						<a href="#/" onclick="IncrementPostLikes(this)">
							<i class="fas fa-caret-up"></i>
						</a>
						<p class="ant-likes">2</p>
						<a href="#/" onclick="DecrementPostLikes(this)">
							<i class="fas fa-caret-down"></i>
						</a>
					</div>
				</div>
				<div class="comment-content">
					<h3>Kristian</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore magnam dolor hic harum? Facilis possimus, tenetur aperiam facere molestiae eaque, quis soluta perferendis blanditiis mollitia eos, illum odio deserunt maiores? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium dignissimos </p>
					<p>10.12.19 16:34:23</p>
				</div>
			</div>
			
			<div class="post-comment">
				<div class="user-container-comment">
					<div class="imgContainer">
						<img src="../Pictures/torbjorn.jpg">
					</div>
					<div class="comment-vote">
						<a href="#/" onclick="IncrementPostLikes(this)">
							<i class="fas fa-caret-up"></i>
						</a>
						<p class="ant-likes">4</p>
						<a href="#/" onclick="DecrementPostLikes(this)">
							<i class="fas fa-caret-down"></i>
						</a>
					</div>
				</div>
				<div class="comment-content">
					<h3>Torbjørb</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore magnam dolor hic harum? Facilis possimus, tenetur aperiam facere molestiae eaque, quis soluta perferendis blanditiis mollitia eos, illum odio deserunt maiores? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium dignissimos. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam vel assumenda distinctio at voluptas excepturi. Sapiente quam explicabo nesciunt veniam, doloremque fuga officia enim ipsa asperiores esse sed natus fugit? </p>
					<p>10.12.19 16:34:23</p>
				</div>
			</div>

			</div>
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
				<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>"class="comment-input" id="comment-form" method="post">
				<div class="inputContainer">
					<input type="text" class="input" name="kommentar" placeholder="Skriv en kommentar" autocomplete="off">
					<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"tabindex="-1">
				</div>
				</form>
			</div>
	</div>

</div>

<?php

    }
}
?>