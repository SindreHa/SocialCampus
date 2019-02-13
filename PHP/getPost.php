
<?php

require_once "../PHP/config.php";

$_SESSION['count'] = 4;
$antPoster = $_SESSION['count'];

$sql = "SELECT * FROM post ORDER BY post_id DESC LIMIT $antPoster";
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
		<div class="imgContainer">
			<img src="../Pictures/placeholder-profile.png">
		</div>
		<h4>Brukernavn</h4>
	</div>
	<div class="post-container">
		<h2>Tittel må inn i database 8)</h2>
		<p><?php echo $row[1]; ?> </p> <!-- PHP KOMMENTAR -->
		<div class="post-stats">
				<a href="#" class="like-button" onclick="IncrementPostLikes(this)">
					<i class="fas fa-thumbs-up"></i>
					<p class="ant-likes">132</p>
				</a>
				<a href="#" class="like-button" onclick="DecrementPostLikes(this)">
					<i class="fas fa-thumbs-down"></i>
				</a>
			<h4>Publisert</h4>
			<h4><?php echo $row[2]; ?></h4> <!-- PHP DATO -->
		</div>
	</div>
</div>
<?php

    }
}
?>