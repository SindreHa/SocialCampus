
<?php include '../PHP/saveComment.php';?>

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

		<section class="group-container">
			<section class="group-info-wrapper">

			<div class="group-info">
				<div class="info-wrapper">
					<div class="group-name">
						<i class="fas fa-golf-ball fa-3x"></i>
						<h2>Golf</h2>
					</div>
					<div class="group-stats">
						<h5>192</h5>
						<h6>Antall medlemmer</h6>
					</div>
					<div class="group-stats border">
						<h5>5</h5>
						<h6>Antall poster</h6>
					</div>
				</div>
				<div class="group-description">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</div>
			</div>

			<div class="group-post-creator-wrapper">
				<div class="post-input-header">
					<i class="far fa-comment fa-3x"></i>
					<h2>Publiser innlegg</h2>
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>"class="form-input" id="group-form" method="post">
					<input type="text" name="headline" placeholder="Tittel" id="post-title-ID" autocomplete="off">
					<textarea class="innhold" name="textarea" form="group-form" placeholder="Tekst" id="text-area-ID"maxlength="850"></textarea>
					<div class="post-submit-container">
						<button class="btn submit-comment" id="post-submit-ID">Publiser</button>
						<h5 id="ord-teller-ID">0/850</h5>
					</div>
				</form>
				
			</div>

			</section>

			<section class="group-post-wrapper">
				<div class="group-post-box">
						<div class="user-container">
							<div class="user-container-comment">
							<div class="imgContainer">
								<img src="../Pictures/jan.png">
							</div>
							</div>
							<h4>Jan</h4>
						</div>
						<div class="post-container">
							<h2>Lorem ipsum</h2>
							<p>Lorem ipsum</p> <!-- PHP KOMMENTAR -->
							<div class="post-stats">
									<div>
										<a href="#" class="like-button" onclick="IncrementPostLikes(this)">
											<i class="fas fa-caret-up"></i>
										</a>
										<p class="ant-likes">4</p>
										<a href="#" class="like-button" onclick="DecrementPostLikes(this)">
											<i class="fas fa-caret-down"></i>
										</a>
									</div>
								<h4><a class="comment-collapse" href="#">0 kommentarer</a></h4>
								<h4>10.12.19 16:34:23</h4> <!-- PHP DATO -->
							</div>
						</div>
						<div class="comment-container">
							<div class="comment-toggle">
								<div class="post-comment">
									<div class="user-container-comment">
										<div class="imgContainer">
											<img src="../Pictures/kristian.jpg">
										</div>
										<div class="comment-vote">
											<a href="#">
												<i class="fas fa-caret-up"></i>
											</a>
											<p class="ant-likes">2</p>
											<a href="#">
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
								</div>
							<div class="comment-submit-container">
								<div class="user-container-comment">
								<div class="imgContainer">
									<img src="../Pictures/sindre.jpg">
								</div>
								</div>
								<form>
								<div class="inputContainer">
									<input type="text" class="input" name="kommentar" placeholder="Skriv en kommentar" autocomplete="off">
									<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"tabindex="-1">
								</div>
								</form>
							</div>
							
						</div>
					</div>

					<div class="group-post-box">
						<div class="user-container">
							<div class="user-container-comment">
							<div class="imgContainer">
								<img src="../Pictures/kristian.jpg">
							</div>
							</div>
							<h4>Kristian</h4>
						</div>
						<div class="post-container">
							<h2>Lorem ipsum</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> <!-- PHP KOMMENTAR -->
							<div class="post-stats">
									<div>
										<a href="#" class="like-button" onclick="IncrementPostLikes(this)">
											<i class="fas fa-caret-up"></i>
										</a>
										<p class="ant-likes">24</p>
										<a href="#" class="like-button" onclick="DecrementPostLikes(this)">
											<i class="fas fa-caret-down"></i>
										</a>
									</div>
								<h4><a class="comment-collapse" href="#">2 kommentarer</a></h4>
								<h4>10.12.19 16:34:23</h4> <!-- PHP DATO -->
							</div>
						</div>
						<div class="comment-container">
							<div class="comment-toggle">
								<div class="post-comment">
									<div class="user-container-comment">
										<div class="imgContainer">
											<img src="../Pictures/sindre.jpg">
										</div>
										<div class="comment-vote">
											<a href="#">
												<i class="fas fa-caret-up"></i>
											</a>
											<p class="ant-likes">27</p>
											<a href="#">
												<i class="fas fa-caret-down"></i>
											</a>
										</div>
									</div>
									<div class="comment-content">
										<h3>Sosinondodrore</h3>
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore magnam dolor hic harum? Facilis possimus, tenetur aperiam facere molestiae eaque, quis soluta perferendis blanditiis mollitia eos, illum odio deserunt maiores? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium dignissimos illum quos reiciendis! Dolorem ea rem eligendi accusamus qui dolore cupiditate delectus vel? Vel enim optio repellat quasi, quo excepturi.</p>
										<p>10.12.19 16:34:23</p>
									</div>
								</div>
								<div class="post-comment">
									<div class="user-container-comment">
									<div class="imgContainer">
										<img src="../Pictures/torbjorn.jpg">
									</div>
										<div class="comment-vote">
											<a href="#">
												<i class="fas fa-caret-up"></i>
											</a>
											<p class="ant-likes">5</p>
											<a href="#">
												<i class="fas fa-caret-down"></i>
											</a>
										</div>
									</div>
									<div class="comment-content">
									<h3>Turbobjørn</h3>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
									<p>11.06.19 12:34:13</p>
									</div>
								</div>
							</div>
							<div class="comment-submit-container">
								<div class="user-container-comment">
								<div class="imgContainer">
									<img src="../Pictures/sindre.jpg">
								</div>
								</div>
								<form>
								<div class="inputContainer">
									<input type="text" class="input" name="kommentar" placeholder="Skriv en kommentar" autocomplete="off">
									<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"tabindex="-1">
								</div>
								</form>
							</div>
						</div>
					</div>
			<div class="button-wrapper">
				<button class="btn" id="newCommentButton-ID" onclick="loadMorePosts()">Last inn innlegg</button>
			</div>
			</section>
			
			
		</section>
		
	</div>
		
<?php include '../PHP/footer.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../JS/js.js"></script>
<script src="../JS/PostManager.js"></script>
<script src="../JS/Kommentarfelt.js"></script>
</body>
</html>