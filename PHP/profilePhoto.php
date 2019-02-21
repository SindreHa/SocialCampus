<?php
if(!empty($_FILES['picture']['name'])){
    //Inkluder config fil for databasen
    include_once 'config.php';
    
    //Konfigurer filopplastning
    $result = 0;
    $uploadDir = "../Pictures/upload/";
    $fileName = time().'_'.basename($_FILES['picture']['name']);
    $targetPath = $uploadDir. $fileName;
    
    //Last opp fil til server
    if(@move_uploaded_file($_FILES['picture']['tmp_name'], $targetPath)){
        //Get current user ID from session
        $userId = 1;
        
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