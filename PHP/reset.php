<?php
 
// Definer variabler initialiser med tomme verdier
require_once "config.php";

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) 
    $user_id = $_SESSION['id'];

if (isset($_POST['password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
	$password = $_POST['password'];
	$new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    $userSql = mysqli_query($link, "SELECT password FROM user WHERE id = $user_id");
    $useRes = mysqli_fetch_row($userSql);
    $hashed_password = userRes[0];

    if(password_verify($password, $hashed_password)){

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
        $sql = "UPDATE user SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Velg parametre 
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Utfør statement
            if(mysqli_stmt_execute($stmt)){
                // Passord endret, exit stopp session og gå til profilsiden
                header("location: profil.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Lukk statement
        mysqli_stmt_close($stmt);
    }
} else {
    $password_err = "Feil passord";
}
}

if(!empty($_POST["password"]) && !empty($_POST["new_password"])) {
    // Se om passord er tomt
    if(empty(trim($_POST["password"]))){
        $password_err = "Vennligst oppgi passord";
    } else{
        $password = trim($_POST["password"]);
    }

    $userSql = mysqli_query($link, "SELECT password FROM user WHERE id = $user_id");
    $useRes = mysqli_fetch_row($userSql);
    $hashed_password = userRes['password'];

    if(password_verify($password, $hashed_password)){

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
        $sql = "UPDATE user SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Velg parametre 
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Utfør statement
            if(mysqli_stmt_execute($stmt)){
                // Passord endret, exit stopp session og gå til profilsiden
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

} else {
    echo "lol";
}
}
?>