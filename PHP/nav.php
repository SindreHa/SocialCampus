<nav class="main-nav">
	<ul>
		<li><a href="index.php">Hjem</a></li>
		<li><a href="omoss.php">Om Oss</a></li>
		<li><a href="#">Grupper</a></li>
		<li id="click"><a>Logg Inn</a>
			
			<div class="log-in">
				<div class="dropdown-content" id="dropdown">
				<form id='login' action='login.php' method='post' accept-charset='UTF-8'>
	        	<label  for='username' >Brukernavn</label>
	        		<div class="inputContainer">
					<i class="fas fa-at input-icon"></i>
					<input type="text" class="input" name="brukernavn" placeholder="eksempel@epost.no" required>
					</div>
				<label for='password' >Passord</label>
					<div class="inputContainer" >
					<i class="fas fa-key input-icon"></i>
					<input type="password" class="input" name="passord" placeholder="••••••••••" required>
					</div>
				<p id="feil">Feil brukernavn eller passord</p>
				<input type="submit" class="btn" onclick="return checkPsw(form)" value="Logg inn" maxlength="40">
				</form>
				<p><a href="register.php">Har du ikke bruker?</a></p>
				<p><a href="Registrering.html">Glemt passord</a></p>
				</div>
        	</div> 
		</li>
	</ul>
</nav>