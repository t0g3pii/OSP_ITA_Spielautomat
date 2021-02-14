<html>

<head>
    <title>Game Testing Website</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js" async></script>
</head>

<body onload="start()">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" class="form-control" placeholder="Benutzername" name="username" required>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" formaction="/login.php">Anmelden</button>
                    <button type="submit" class="btn btn-secondary" formaction="/register.php">Registrieren</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function start() {
            var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {focus: true})
            myModal.show()
        }
    </script>
</body>

</html>