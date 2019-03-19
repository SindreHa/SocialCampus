<?php
// Bruk Config fil
require_once "../PHP/config.php";
 
// Definer variabler initialiser med tomme verdier
$username = $email = $password = $confirm_password = $full_name = "";
$username_err = $email_err = $password_err = $confirm_password_err = $full_name_err ="";
 
// Tar i mot data fra et "post form"
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Valider username
    if(empty(trim($_POST["name"]))){
        $username_err = "Skriv inn brukernavn";
    } else{
        // Select spørring for username           
        $sql = "SELECT id FROM user WHERE username = ?";
         if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Velg parametre 
            $param_username = trim($_POST["name"]);
            
            // Utfør statement
            if(mysqli_stmt_execute($stmt)){
                /* Lagre resultatet */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Dette brukernavnet er allerede i bruk.";
                } else{
                    $username = trim($_POST["name"]);
                }
            } else{
                echo "Woops! De skjedde en feil med brukernavnet";
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
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Dine passord er ikke like";
        }
    }
    
    
        // Valider email
    if(empty(trim($_POST["email"]))){
        $email_err = "Skriv inn email";
    } else{
        // Select spørring for email           
        $sql = "SELECT id FROM user WHERE email = ?";
         if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Velg parametre 
            $param_email = trim($_POST["email"]);
            
            // Utfør statement
            if(mysqli_stmt_execute($stmt)){
                /* Lagre resultatet */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "Denne mailen er allerede i bruk.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Woops! Det skjedde noe feil med emailen";
            }
        }
         
        // Close username statement       
        mysqli_stmt_close($stmt);
    }
    
        // Valider navn
    if(empty(trim($_POST["full_name"]))){
        $full_name_err = "Skriv inn navn";
    } else{
        // Select spørring for navn           
        $sql = "SELECT id FROM user WHERE full_name = ?";
         if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_full_name);
            
            // Velg parametre 
            $param_full_name = trim($_POST["full_name"]);
            
            // Utfør statement
            if(mysqli_stmt_execute($stmt)){
                /* Lagre resultatet */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $full_name_err = "";
                } else{
                    $full_name = trim($_POST["full_name"]);
                }
            } else{
                echo "Woops! Det skjedde noe feil med navnet";
            }
        }
         
        // Close userfull_name statement       
        mysqli_stmt_close($stmt);
    }
    
    // Se etter input feil før insetting i database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($email_err)){
        
        // Lage insert for username og passord
        $sql = "INSERT INTO user (username, password, full_name, email) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_name, $param_email);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Lage passord hash
            $param_email = $email;
            $param_name = $full_name;
            
            if(mysqli_stmt_execute($stmt)){
                // sender bruker til login
                header("location: ../HTML/login.php");
            } else{
                echo "Something went wrong with insert. Please try again later.";
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
    <title>Sign Up</title>
    <?php include '../PHP/head.php';?>
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
                            <i class="fas fa-user-tag input-icon"></i>
                            <input type="text" name="name" autocomplete="cc-name" placeholder="OlaNord123" class="input" value="<?php echo $username; ?>" id="Username-ID">
                            <i class="fas fa-exclamation input-error" id="input-error-username"></i>
                            <i class="fa fa-check input-approved" id="input-approved-username"></i>
                        </div>
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>  

                     <div class="form-login <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label>Email</label>
                        <div class="inputContainer">
                            <i class="fas fa-at input-icon"></i>
                            <input type="email" name="email" autocomplete="email" placeholder="eksempel@email.com" class="input" value="<?php echo $email; ?>" id="Email-ID">
                            <i class="fas fa-exclamation input-error" id="input-error-email"></i>
                            <i class="fa fa-check input-approved" id="input-approved-email"></i>
                        </div>
                        <span class="help-block"><?php echo $email_err; ?></span>
                    </div> 

                     <div class="form-login <?php echo (!empty($full_name_err)) ? 'has-error' : ''; ?>">
                        <label>Fullt navn</label>
                        <div class="inputContainer">
                            <i class="fas fa-address-book"></i>
                            <input type="text" name="full_name" autocomplete="full_name" placeholder="Ola Nordmann" class="input" value="<?php echo $full_name; ?>" id="full_name-ID">
                            <i class="fas fa-exclamation input-error" id="input-error-full_name"></i>
                            <i class="fa fa-check input-approved" id="input-approved-full_name"></i>
                        </div>
                        <span class="help-block"><?php echo $full_name_err; ?></span>
                    </div> 

                    <div class="form-login <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Passord</label>
                        <div class="inputContainer">
                            <i class="fas fa-key input-icon"></i>
                            <input autocomplete="new-password" type="password" name="password" placeholder="••••••••••" class="input" value="<?php echo $password; ?>" id="Password-ID">
                            <i class="fas fa-exclamation input-error" id="input-error-password"></i>
                            <i class="fa fa-check input-approved" id="input-approved-password"></i>
                        </div>
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>

                    <div class="form-login <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label>Bekreft passord</label>
                            <div class="inputContainer">
                            <i class="fas fa-key input-icon"></i>
                            <input autocomplete="new-password" type="password" name="confirm_password" placeholder="••••••••••" class="input" value="<?php echo $confirm_password; ?>" id="ConfirmPassword-ID" >
                            <i class="fas fa-exclamation input-error" id="input-error-confirmPassword"></i>
                            <i class="fa fa-check input-approved" id="input-approved-confirmPassword"></i>
                        </div>
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>

                    <div class="button-wrapper">
                        <input type="submit" class="btn" value="Opprett bruker" id="Submit-Toggle">
                        <input type="reset" class="btn" value="Klarer felt">
                        <button type="reset" class="btn" onclick="TooltipMessage('Test melding')">Åpne tooltip</button>
                    </div>

                    <p>Har du allerede en bruker? <a href="login.php">Logg inn her</a>.</p>

                </form>
            </section>
        </div>
        
    </div>  

<?php include '../PHP/footer.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../JS/js.js"></script>
<script src="../JS/FormValidering.js"></script>
</body>
</html>