<?php
if(!empty($_FILES['avatar']['name'])){
    //Inkluder config fil for databasen
    include_once 'config.php';
    
    //Konfigurer filopplastning
    $result = 0;
    $uploadDir = "../Pictures/upload/";
    $fileName = time().'_'.basename($_FILES['avatar']['name']);
    $targetPath = $uploadDir. $fileName;
    $userId = $_SESSION['id'];
    
    //Last opp fil til server
    if(@move_uploaded_file($_FILES['avatar']['tmp_name'], $targetPath)){
        
        
        
        //Oppdater bildenavn i databasen
        $update = $db->query("UPDATE user SET avatar = '".$fileName."' WHERE id = $userId");
        
        //Oppdater status
        if($update){
            $result = 1;
        }
    }
    
    //JavaScript function for å vise opplastningstatus
    echo '<script type="text/javascript">window.top.window.completeUpload(' . $result . ',\'' . $targetPath . '\');</script>  ';
}