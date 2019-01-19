<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
// require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>


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