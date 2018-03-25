<h1>Registreer nieuwe gebruiker.</h1>
<hr>

<form  action="<?= APP_BASE_URL ?>/accounts/registreren" method="POST">
Email Adres:<br /> <input type='text' name='username' required /><br />
Password:<br /> <input type="password" name='password' required /><br />
<input type='submit'/>
</form>
