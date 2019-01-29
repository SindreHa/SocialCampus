<?php
session_start();
 
// Definer variabler initialiser med tomme verdier
require_once "config.php";
 
// Definer variabler initialiser med tomme verdier
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Definer variabler initialiser med tomme verdier
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Valider nytt passord
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Skriv inn et nytt passord";     
    } elseif(strlen(trim($_POST["new_password"])) < 8){
        $new_password_err = "Passord må ha minst 8 karakterer";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Valider confirm passord
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Bekreft ditt passord";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Passordene er ikke like";
        }
    }
        
    // Se etter input-error før insetting i database
    if(empty($new_password_err) && empty($confirm_password_err)){
        $sql = "UPDATE bruker SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Velg parametre 
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Utfør statement
            if(mysqli_stmt_execute($stmt)){
                // Passord endret, exit stopp session og gå til profilsiden
                session_destroy();
                header("location: profil.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Lukk statement
        mysqli_stmt_close($stmt);
    }
    
    // Lukk connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="no">
<head>
    <title>Tilbakestill Passord</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600" rel="stylesheet">
</head>
<body>
    <div class="wrapper profile-info">

    <form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]); ?>" method="post">

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

        <div class="container 
        	<?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
            <h3>Nytt passord</h3>
            <div class="inputContainer">
                <i class="fas fa-key"></i>
                <input class="input" type="password" name="new_password" placeholder="••••••••••" value="
                <?php echo $new_password; ?>">
                <span class="help-block">
                <?php echo $new_password_err; ?></span>
            </div>
        </div>

        <div class="container">
            <h3>Bekreft passord</h3>
            <div class="inputContainer <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <i class="fas fa-key"></i>
                <input class="input" type="password" ame="confirm_password" placeholder="••••••••••">
                <span class="help-block">
                <?php echo $confirm_password_err; ?></span>
            </div>
        </div>
    </form>

    </div>
</body>
</html>