<?php
$user="Hei12345"; 
$pull="select * from user WHERE username='$user'";
$allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
$extension = @end(explode(".", $_FILES["file"]["name"]));

if(isset($_POST['pupload'])){
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 10000000)
&& in_array($extension, $allowedExts))

    {
 if ($_FILES["file"]["error"] > 0)
 {
 echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
 }
 else
 {
 echo '<div class="plus">';
 echo "Opplastning vellykket";
 echo '</div>';echo"<br/><b><u>Bilde Detaljer></b><br/>";
 echo "Name: " . $_FILES["file"]["name"] . "<br/>";
 echo "Type: " . $_FILES["file"]["type"] . "<br/>";
 echo "Size: " . ceil(($_FILES["file"]["size"] / 1024)) . " KB";
     
     
     
 