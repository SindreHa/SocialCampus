<?php
// Initialize the session
session_start();
 

/* Check if the user is already logged in, if yes then redirect him to welcome page

 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){    header("location: ../HTML/index.php");
 exit;

}

*/

// Include config file
 require_once "../PHP/config.php";
 
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
        $sql = "SELECT id, username, password FROM bruker WHERE username = ?";
        
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
                    $username_err = "Ingen bruker funnet med valg brukernavn.";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logg inn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        
        <?php include '../PHP/nav.php';?>

        <div class="login-wrapper">
            <section class="login">

                <div class="login-header">
                    <h1><i class="fas fa-sign-in-alt"></i>Logg inn</h1>
                    <p>Fyll ut brukernavn og passord.</p>
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-login <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Brukernavn</label>
                        <div class="inputContainer">
                            <i class="fas fa-at input-icon"></i>
                            <input type="text" name="username" placeholder="Ola Nordmann" class="input" value="<?php echo $username; ?>">
                        </div>
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>    
                    <div class="form-login <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Passord</label>
                        <div class="inputContainer">
                            <i class="fas fa-key input-icon"></i>
                            <input type="password" name="password" placeholder="••••••••••" class="input" value="<?php echo $password; ?>">
                        </div>
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="button-wrapper">
                        <input type="submit" class="btn" value="Logg inn">
                    </div>

                    <p>Har du ikke en bruker? <a href="register.php">Registrer deg her</a>.</p>

                </form>
            </section>
        </div>
        
    </div>  

<?php include '../PHP/footer.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../JS/js.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHJDa2YV51FDV-MCD1V6JAxU5NqDgTQrc&callback=myMap"></script>
</body>
</html>