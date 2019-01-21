<?php
// Bruk Config fil
require_once "config.php";
 
// Definer variabler initialiser med tomme verdier
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Tar i mot data fra et "post form"
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Valider username
    if(empty(trim($_POST["username"]))){
        $username_err = "Skriv inn brukernavn";
    } else{
        // Select spørring for username           
        $sql = "SELECT id FROM bruker WHERE username = ?";
         if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Velg parametre 
            $param_username = trim($_POST["username"]);
            
            // Utfør statement
            if(mysqli_stmt_execute($stmt)){
                /* Lagre resultatet */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Dette brukernavnet er allerede i bruk.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close username statement       
        mysqli_stmt_close($stmt);
    }
    
    // Valider passord
    if(empty(trim($_POST["password"]))){
        $password_err = "Skriv inn ett passord.";   
        
        // Passord må ha minst 8 tegn
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Passordet må ha minst 8 tegn.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Valider bekreft passord
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Bekreft passord.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty(password_err) && (password != $confirm_password)){
            $confirm_password_err = "Passord matchet ikke.";
        }
    }
    
    // Se etter input feil før insetting i database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Lage insert for username og passord
        $sql = "INSERT INTO bruker (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Lage passord hash
            
            if(mysqli_stmt_execute($stmt)){
                // sender bruker til login
                header("location: ../HTML/index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         

    }
    
    // Lukke tilkobling til database
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrer deg</title>
</head>
<body>
    <div class="wrapper">
        <h2>Registrer deg</h2>
        <p>Fyll ut skjema for å lage bruker</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Brukernavn</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Passord</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Bekreft passord</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Har du allerede en bruker <a href="login.php">Log inn her</a>.</p>
        </form>
    </div>    
</body>
</html>