<!DOCTYPE html>
<html>

<head>
    <title>Startseite - Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" media="screen" />
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js" async></script>
</head>
<div id="login" class="modal">
    <form class="modal-content">
        <div class="imgcontainer">
            <img src="assets/img/slotlogin.png" alt="Login" class="avatar">
        </div>
        <div class="container">
            <label for="username">Username:</label>
            <input type="text" placeholder="Benutzername" name="username" required>
            <button type="submit" style="background-color: green;" formaction="/login.php">Anmelden</button>
            <button type="submit" style="background-color: red;" formaction="/register.php">Registrieren</button>
        </div>
    </form>
</div>

</html>