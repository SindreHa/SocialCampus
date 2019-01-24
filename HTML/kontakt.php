<form action="../PHP/mail.php" method="POST">
<p>Navn</p> <input type="text" name="navn">
<p>Email</p> <input type="text" name="email">
    <p>Tema</p>
<select name="tema" size="1">
<option value="Option1">Hvorfor er jeg banna</option>
<option value="Option2">Jobb for oss</option>
<option value="Option3">Jan</option>
<option value="Option4">Annet</option>
</select>
<br />
<p>Melding</p><textarea name="melding" rows="6" cols="25"></textarea><br />
    

<input type="submit" value="Send melding"><input type="reset" value="Fjern alt  ">
</form>