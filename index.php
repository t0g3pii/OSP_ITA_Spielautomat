<!DOCTYPE html>
<html>

<head>
    <title>Startseite - Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" media="screen" />
    <script src="assets/js/main.js" async></script>
</head>
<div id="login" class="modal">
    <form class="modal-content">
        <div class="container">
            <label for="username">Username:</label>
            <input type="text" placeholder="Benutzername" name="username" required>
            <button type="submit" style="background-color: green;" formaction="/login.php">Anmelden</button>
            <button type="submit" style="background-color: red;" formaction="/register.php">Registrieren</button>
        </div>
    </form>
</div>

</html>