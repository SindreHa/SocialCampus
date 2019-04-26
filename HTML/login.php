<?php
// Inkluder config fil for tilkobling til database
require_once "../php/config.php";

if (isset($_GET['register'])){
    echo '
        <script> 
        timer = setTimeout(function() {
            TooltipMessage("Bruker registrert");
        }, 200);
        </script>
    ';
}
 
// Definer variabler med tomme verdier
$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Se om brukernavn er tomt
    if(empty(trim($_POST["username"]))){
        $username_err = "Vennligst oppgi brukernavn";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Se om passord er tomt
    if(empty(trim($_POST["password"]))){
        $password_err = "Vennligst oppgi passord";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Valider passord og brukernavn
    if(empty($username_err) && empty($password_err)){
        // Gjør klar en select spørring
        $sql = "SELECT id, username, password FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Koble variabler til spørringen
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            //  Velg parametere
            $param_username = $username;
            
            // Utfør spørring
            if(mysqli_stmt_execute($stmt)){
                // Lagre resultat
                mysqli_stmt_store_result($stmt);
                
                // Se om brukernavn eksister, hvis den gjør så valideres passord
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Riktig passord, ny sesjon startes
                            session_start();
                            
                            // Lagre data for bruker i sessions
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Send bruker til hjemmesiden
                            header("location: ../HTML/index.php?loggedin=true");
                        } else{
                            // Vis feilmelding om passord er feil
                            $password_err = "Feil brukernavn eller passord";
                        }
                    }
                } else{
                    // Vis feilmelding om brukenavn ikke finnes
                    $username_err = "Ingen bruker funnet med det brukernavnet";
                }
            } else{
                echo "Woops! Her skjedde det noe feil";
            }
        }
        
        // Lukk statement
        mysqli_stmt_close($stmt);
    }
    
    // Lukk tilkobling til database
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Logg inn - SocialCampus</title>
    <?php include '../PHP/head.php';?>
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
                        <i class="fas fa-user-tag"></i>
                        <input type="text" name="username" placeholder="OlaNord123" class="input" value="<?php echo $username; ?>">
                    <i class="fas fa-exclamation input-error"></i>
                    </div>
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-login <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Passord</label>
                    <div class="inputContainer">
                        <i class="fas fa-key"></i>
                        <input type="password" name="password" placeholder="••••••••••" class="input" value="<?php echo $password; ?>">
                    <i class="fas fa-exclamation input-error"></i>
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

</body>
</html>