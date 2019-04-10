<?php 

require_once "../PHP/config.php";

$group_id = "6";

$postCountResult = mysqli_query($link, "SELECT COUNT(id) FROM post WHERE group_id=$group_id");
$postCount = mysqli_fetch_row($postCountResult);

$ant_poster = $postCount[0];

$userCountResult = mysqli_query($link, "SELECT COUNT(group_id) FROM groups_has_users WHERE group_id=$group_id");
$userCount = mysqli_fetch_row($userCountResult);

$ant_medlem = $userCount[0];

$groupSql = mysqli_query($link, "SELECT * FROM application.groups WHERE id=$group_id");
$groupResult = mysqli_fetch_array($groupSql); 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	$user_id = $_SESSION['id'];
}

if (isset($_POST['member'])) {
	$is_member = $_POST['member'];

	if($is_member == 0) {
		mysqli_query($link, "INSERT INTO application.groups_has_users (group_id, user_id) VALUES ($group_id, $user_id)");
		exit();
	} else {
		mysqli_query($link, "DELETE FROM application.groups_has_users WHERE group_id=$group_id AND user_id=$user_id");
		exit();
	}
}

include '../PHP/likes.php';
include '../PHP/savePost.php';
include '../PHP/saveComment.php';

?>

<!DOCTYPE html>
<html lang="no">
<head>
	<title>Golf</title>
	<?php include '../PHP/head.php';?>
</head>
<body>
	<!-- <section class="darken hide" id="darken"></section> -->
	<div class="wrapper">
        
	<?php include '../PHP/nav.php';?>

			<section class="group-info-wrapper">

			<div class="group-info">
				<div class="info-wrapper">
					<div class="group-name" data-group-id="<?php echo $group_id?>">
						<i class="<?php echo $groupResult['group_icon']?> fa-3x"></i>
						<h2><?php echo $groupResult['name']?></h2>
					</div>
					<div class="group-stats-wrapper">
					<div class="group-stats">
						<h5 id="ant-medlem"><?php echo $ant_medlem; ?></h5>
						<h6>Antall medlemmer</h6>
					</div>
					<div class="group-stats">
						<h5 id="num-posts"><?php echo $ant_poster; ?></h5>
						<h6>Antall poster</h6>
					</div>
					</div>
				</div>
				<div class="group-description">
					<p><?php echo $groupResult['description']?></p>
						<?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
						$userMemberSql = mysqli_query($link, "SELECT * FROM application.groups_has_users WHERE user_id=$user_id AND group_id=$group_id;");

						if(mysqli_num_rows($userMemberSql) == 1) { ?>
							<a id="become-member" class="btn member" href="<?php echo $groupResult['name']; ?>.php">Forlat gruppe</a>
							<a id="become-member" class="btn not-member hide" href="<?php echo $groupResult['name']; ?>.php">Bli medlem</a>
						<?php } else { ?>
							<a id="become-member" class="btn member hide" href="<?php echo $groupResult['name']; ?>.php">Forlat gruppe</a>
							<a id="become-member" class="btn not-member" href="<?php echo $groupResult['name']; ?>.php">Bli medlem</a>
						<?php } }?>
				</div>
			</div>
						
			<?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {?>
			<div class="group-post-creator-wrapper">
				<div class="post-input-header">
					<i class="far fa-comment fa-3x"></i>
					<h2>Publiser innlegg</h2>
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>"class="form-input" id="group-form" method="post">
					<input type="text" name="headline" placeholder="Tittel" class="tittel" id="post-title-ID" autocomplete="off">
					<textarea class="innhold" name="textarea" form="group-form" placeholder="Tekst" id="text-area-ID"maxlength="850"></textarea>
					<div class="post-submit-container">
						<button class="btn submit-post" id="post-submit-ID">Publiser</button>
						<h5 id="ord-teller-ID">0/850</h5>
					</div>
				</form>
				
			</div>
			<?php } else { ?>
			<div class="group-post-creator-wrapper">
				<div class="post-input-header">
					<i class="far fa-comment fa-3x"></i>
					<h2>Publiser innlegg</h2>
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>"class="form-input" id="group-form" method="post">
					<input disabled placeholder="Logg inn for å publisere innlegg" class="tittel" id="post-title-ID" autocomplete="off" maxlength="255">
					<textarea disabled class="innhold" name="textarea" form="group-form" id="text-area-ID" maxlength="850"></textarea>
					<div class="post-submit-container">
						<button class="btn submit-comment" onclick="TooltipMessage('Innlegg publisert')" id="post-submit-ID" >Publiser</button>
						<h5 id="ord-teller-ID">0/850</h5>
					</div>
				</form> 
			</div>
			<?php } ?>

			</section>

			<section class="group-post-wrapper">
				<div class="group-post">
				<!-- Plassering av poster -->
				</div>
			</section>
		
	</div>
		
<?php include '../PHP/footer.php';?>

<script src="../JS/PostManager.js"></script>
<script type="text/javascript">
    var groupId = "<?php echo $group_id; ?>"; 
</script>
<script src="../JS/PostFetch.js"></script>
<script src="../JS/likes.js"></script>
</body>
</html>