<?php
    //Inkluder config fil for databasen
    include_once 'config.php';
    
    //Konfigurer filopplastning
    $userId = $_SESSION['id']; //Henter bruker id fra session variabel
    $name       = "USER_$userId ProfilePhoto.png"; //Setter filnavn  
    $temp_name  = $_FILES['avatar']['tmp_name']; //Setter opp temp navn som brukes til opplastning av fil

    if(isset($name)){      
        $location = '../Pictures/upload/';      
        if(move_uploaded_file($temp_name, $location.$name)){  //Hvis opplastning vellykket
            $update = $link->query("UPDATE user SET avatar = '".$name."' WHERE id = $userId"); //Setter inn url for bildet
            header("location: ../HTML/profil.php?upload=true"); // Sender inn php variabel til side som aktiverer meldingboks om at opplastning var vellykket
        } else { exit; }
    } else { exit; }
?>