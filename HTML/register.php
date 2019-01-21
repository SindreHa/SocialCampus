<?php
// Bruk Config fil
require_once "../PHP/config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    <title>Sign Up</title>
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
                    <h1><i class="fas fa-user-plus"></i>Registrer deg</h1>
                    <p>Fyll ut alle feltene for å lage en konto.</p>
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
                    <div class="form-login <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label>Bekreft passord</label>
                            <div class="inputContainer">
                            <i class="fas fa-key input-icon"></i>
                            <input type="password" name="confirm_password" placeholder="••••••••••" class="input" value="<?php echo $confirm_password; ?>">
                        </div>
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="button-wrapper">
                        <input type="submit" class="btn" value="Opprett bruker">
                        <input type="reset" class="btn" value="Klarer felt">
                    </div>

                    <p>Har du allerede en bruker? <a href="login.php">Logg inn her</a>.</p>
                    
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