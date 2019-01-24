<?php 

$navn = $_POST['navn'];
$email = $_POST['email'];
$melding = $_POST['melding'];
$formcontent="Fra: $navn \n Melding: $melding";
$recipient = "Sindre.h@outlook.com";
$subject = "Kontaktskjema";
$mailheader = "Fra: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Sindre svarer neste uke";

?>