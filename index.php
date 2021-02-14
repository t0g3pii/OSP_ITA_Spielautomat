<html>
<?php
    session_start();
    if (isset($_SESSION["UUID"])) {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'game.php';
        header("Location: http://$host$uri/$extra");
    }
?>
<head>
    <title>Game Testing Website</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js" async></script>
</head>

<body>
    <div class="modal show" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color: black;">Anmelden</h5>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control" placeholder="Benutzername" name="username" minlength="4" maxlength="16" required>
                            <input type="password" pattern="[0-9]*" inputmode="numeric" class="form-control" placeholder="4-Stelliger PIN" name="pin" minlength="4" maxlength="4" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" formaction="/login.php">Anmelden</button>
                        <button type="submit" class="btn btn-secondary" formaction="/register.php">Registrieren</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(window).load(function () {
            $('#myModal').modal('show');
        });
    </script>
</body>

</html>