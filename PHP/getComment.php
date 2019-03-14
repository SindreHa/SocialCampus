
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
<?php

    }
}
?>