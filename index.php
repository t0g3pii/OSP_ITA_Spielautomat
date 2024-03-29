<html>
<?php
    session_start();
    if (isset($_SESSION["UUID"])) {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'game.php';
        header("Location: http://$host$uri/$extra");
        exit();
    }
?>
<body oncontextmenu="return false">
<head>
    <title>Slot Machine - Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js" async></script>
</head>

<body oncontextmenu="return false">
    <div class="modal show" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-modal="true" role="dialog" style="display: block;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/img/slotlogin.png" style="width: 50px">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color: black;">Anmelden</h5>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control" placeholder="Benutzername" name="username"
                                minlength="4" maxlength="16" required>
                            <input type="password" pattern="[0-9]*" inputmode="numeric" class="form-control"
                                placeholder="4-Stelliger Zahlen PIN" name="pin" minlength="4" maxlength="4" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button style="width:auto;" type="submit" class="btn btn-success" formaction="/login.php">Anmelden</button>
                        <button style="width:auto;" type="submit" class="btn btn-danger" formaction="/register.php">Registrieren</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>