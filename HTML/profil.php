<!DOCTYPE html>
<html lang="no">
<head>
	<title>Hjemmeside</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600" rel="stylesheet">
</head>
<body>
	<!-- <section class="darken hide" id="darken"></section> -->
	<div class="wrapper">

	<?php
        session_start();
        include '../PHP/nav.php';?>
        <section class="profile-wrapper">
        	<div class="profile-container">

	        	<div class="profile-header">
	        		<div class="imgContainer">
	        		<img src="../Pictures/placeholder-profile.png">
	        		</div>
	        		<h1><?php echo htmlspecialchars($_SESSION["username"])?></h1>
	        	</div>

	        	<div class="profile-info">
	        		<div class="container">
	        			<h3>Brukernavn</h3>
	        			<div class="inputContainer">
                            <i class="fas fa-user"></i>
	        				<input type="text"class="input" disabled value="<?php echo htmlspecialchars($_SESSION["username"])?>">
	        			</div>
	        		</div>

	        		<div class="container">
	        			<h3>E-post</h3>
	        			<div class="inputContainer">
	        				<i class="fas fa-at"></i>
	        				<input type="text" class="input" disabled value="eksempel@outlook.com">
	        			</div>
	        			<!-- <h4>Sindre.h@outlook.com</h4> -->
	        		</div>

	        		<div class="container">
	        			<h3>Fullt navn</h3>
	        			<div class="inputContainer">
	        				<i class="fas fa-address-book"></i>
	        				<input type="text" class="input" value="Ola Nordmann" disabled>
	        			</div>
	        		</div>

	        		<div class="container">
	        			<h2>Endre passord</h2>
	        		</div>

	        		<div class="container">
	        			<h3>Gammelt passord</h3>
	        			<div class="inputContainer">
	        				<i class="fas fa-key"></i>
	        				<input class="input" type="password" placeholder="••••••••••">
	        			</div>
	        		</div>

	        		<div class="container">
	        			<h3>Nytt passord</h3>
	        			<div class="inputContainer">
	        				<i class="fas fa-key"></i>
	        				<input class="input" type="password" placeholder="••••••••••">
	        			</div>
	        		</div>

	        		<div class="container">
	        			<h3>Bekreft passord</h3>
	        			<div class="inputContainer">
	        				<i class="fas fa-key"></i>
	        				<input class="input" type="password" placeholder="••••••••••">
	        			</div>
	        		</div>

	        	</div>
        	</div>
        </section>
        
	</div>
        
<?php include '../PHP/footer.php';?>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../JS/js.js"></script>
<script src="../JS/NumberHandler.js"></script>
<script src="../JS/slider.js"></script>
</body>
</html>