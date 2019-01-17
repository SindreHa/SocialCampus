<form id='login' action='login.php' method='post' accept-charset='UTF-8'>
	<fieldset >
		<legend>Logg inn</legend>
		<input type='hidden' name='submitted' id='submitted' value='1'/>
		  <label for='username' >Brukernavn:</label>
		  <input type='text' name='username' id='username'  maxlength="40" />
		  <label for='password' >Passord:</label>
		<input type='password' name='password' id='password' maxlength="40" />
		<input type='submit' name='Submit' value='Submit' />
	</fieldset>
</form>