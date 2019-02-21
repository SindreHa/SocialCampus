<?php
    //Inkluder config fil for databasen
    include_once 'config.php';
    
    //Konfigurer filopplastning
    $userId     = 2; // $_SESSION['id']; Returnerer null?
    $name       = "USER_$userId ProfilePhoto.png";  
    $temp_name  = $_FILES['avatar']['tmp_name']; 

    if(isset($name)){
        if(!empty($name)){      
            $location = '../Pictures/upload/';      
            if(move_uploaded_file($temp_name, $location.$name)){
                $update = $link->query("UPDATE user SET avatar = '".$name."' WHERE id = $userId");
                header("location: ../HTML/profil.php"); // Vei rundt blank skjerm
            }
        }
        else {
            exit;
        }       
    }  else {
        exit;
    }
?>