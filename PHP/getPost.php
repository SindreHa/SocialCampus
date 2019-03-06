
<?php

require_once "../PHP/config.php";

$_SESSION['count'] = 4;
$antPoster = $_SESSION['count'];

$sql = "SELECT * FROM post ORDER BY id DESC LIMIT $antPoster";
$result = mysqli_query($link, $sql);

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
				<img src="../Pictures/placeholder-profile.png"> <!-- Bilde av poster -->
			</div>
		</div>
		<h4>Brukernavn</h4> <!-- Brukernavn for innlegg -->
	</div>

	<div class="post-container">
		<h2><?php echo $row[1]; ?></h2> <!-- Tittel på innlegg -->
		<p><?php echo $row[2]; ?> </p> <!-- Innlegg innhold -->
		<div class="post-stats">
			<h4><a class="comment-collapse" href="#">2 kommentarer</a></h4> <!-- Antall kommentarer -->
				<div>
					<a href="#" class="like-button" onclick="IncrementPostLikes(this)">
						<i class="fas fa-caret-up"></i>
					</a>
					<p class="ant-likes">24</p>
					<a href="#" class="like-button" onclick="DecrementPostLikes(this)">
						<i class="fas fa-caret-down"></i>
					</a>
				</div>
			<h4>Publisert</h4>
			<h4><?php echo $row[3]; ?></h4> <!-- PHP DATO -->
		</div>
	</div>

	<div class="comment-container">

		<div class="comment-submit-container">
			<div class="user-container-comment">
				<div class="imgContainer">
					<img src="../Pictures/sindre.jpg"> <!-- Bilde av innlogget bruker -->
				</div>
			</div>
			<form>
				<div class="inputContainer">
					<input type="text" class="input" name="kommentar" placeholder="Skriv en kommentar" autocomplete="off">
					<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"tabindex="-1">
				</div>
			</form>
		</div>

		<div class="post-comment">
			<div class="user-container-comment">
				<div class="imgContainer">
					<img src="../Pictures/sindre.jpg"> <!-- Bilde av tilhørende bruker -->
				</div>
			</div>
			<div class="comment-content">
				<h3>Brukernavn</h3> <!-- Navn på bruker -->
				<p>Kommentar innhold</p> <!-- Innhold på kommentar -->
			</div>
		</div>

	</div>
</div>
<?php

    }
}
?>