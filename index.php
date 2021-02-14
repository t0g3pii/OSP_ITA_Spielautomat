<!DOCTYPE html>
<html>
	<head>
		<title>Startseite - Login</title>
        <link rel="stylesheet" type="text/css" href="assets/css/main.css" media="screen"/>
        <script src="assets/js/main.js" async></script>
	</head>
    <form >
		<label for="username">Username:</label>
		<input name="username">
		<label for="password">Passwort:</label>
		<input type="password" name="password" />
		<button type="submit" formaction="/login.php">Anmelden</button>
		<button type="submit" formaction="/register.php">Registrieren</button>
	</form>
</html>