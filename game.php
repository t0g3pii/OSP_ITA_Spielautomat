<?php
session_start();
if (!isset($_SESSION["UUID"])) {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    session_destroy();
    exit();
}
require("inc/db.inc.php");

$st = $pdo->prepare("SELECT username, credits, lastFree FROM `user` WHERE `UUID` = ?");
$st->execute(array($_SESSION["UUID"]));
$data = $st->fetch();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Slot Machine - Game</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js" async></script>
    <script>
        var wait = false;

        function update() {
            $.post("gameserver.php", {
                "action": "getData"
            }, (rawdata) => {
                let data = JSON.parse(rawdata);
                $("#game_value").val(data["credits"]);
            });
        }

        function getFree() {
            $.post("gameserver.php", {
                "action": "getFree"
            }, () => {
                update();
            });
        }

        function logout() {
            $.post("gameserver.php", {
                "action": "logout"
            }, () => {
                window.open("index.php", "_self")
            });
        }

        function stakeAdd(x) {
            let oldStake = $("#game_stake").val();
            let newStake = Number(oldStake) + x;
            $("#game_stake").val(newStake);
        }

        function stakeRem(x) {
            let oldStake = $("#game_stake").val();
            let newStake = oldStake - x;
            $("#game_stake").val(newStake);
        }

        function play() {
            if (wait) {
                alert("Gedulde dich du Sackratte!");
                return
            }
            wait = true;
            setTimeout(() => {
                wait = false;
            }, 3000);
            let stake = Number($("#game_stake").val());
            $.post("gameserver.php", {
                "action": "play",
                "stake": stake
            }, (rawData) => {
                console.log(rawData);
                update();
                let data = JSON.parse(rawData); // roleOne, roleTwo, roleThree, WinAmount
                document.getElementById("game_slot1").value = data[0];
                document.getElementById("game_slot2").value = data[1];
                document.getElementById("game_slot3").value = data[2];
                document.getElementById("game_win").value = data[3];
                document.getElementById("role1").src = "/assets/img/" + data[1] + ".jpg";
                document.getElementById("role2").src = "/assets/img/" + data[2] + ".jpg";
                document.getElementById("role3").src = "/assets/img/" + data[3] + ".jpg";
            });
        }
    </script>
</head>

<body style="width: 80%">
    <div class="center">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@ & Credits</span>
            <input class="form-control" id="game_username" value="<?php echo $data["username"]; ?>" disabled>
            <input class="form-control" id="game_value" value="<?php echo $data["credits"]; ?>" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Einsatz</span>
            <input class="form-control" id="game_stake" value="5" type="number" disabled>
        </div>
        <div class="input-group mb-3">
            <p>Wird noch entfernt, und durch Icons ersetzt</p></br>
            <span class="input-group-text" id="basic-addon1">Rolle 1,2,3 & Win</span>
            <input class="form-control" id="game_slot1" value=0 disabled>
            <input class="form-control" id="game_slot2" value=0 disabled>
            <input class="form-control" id="game_slot3" value=0 disabled>
            <input class="form-control" id="game_win" value=0 disabled>
        </div>
        <div id="buttons">
            <button class="btn btn-primary" onclick="play();">Spielen</button>
            <button class="btn btn-success btn-sm" onclick="stakeAdd(1);">Einsatz +</button>
            <button class="btn btn-warning btn-sm" onclick="stakeRem(1);">Einsatz -</button>
            <button class="btn btn-secondary" onclick="getFree();" <?php echo "disabled"; ?>>Freebee Kepie</button>
            <button class="btn btn-danger" onclick="logout();">Ausloggen</button>
        </div>
        </br></br></br>
        <img id="role1" style="height: 250px" src="/assets/img/1.jpg">
        <img id="role2" style="height: 250px" src="/assets/img/1.jpg">
        <img id="role3" style="height: 250px" src="/assets/img/1.jpg">
    </div>
</body>

</html>