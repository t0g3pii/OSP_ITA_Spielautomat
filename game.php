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

$st = $pdo->prepare( "SELECT username, credits, lastFree FROM `user` WHERE `UUID` = ?" );
$st->execute(array($_SESSION["UUID"]));
$data = $st->fetch();
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
            var wait = false;
            function update() {
                $.post("gameserver.php",{"action":"getData"} ,(rawdata)=>{
                    let data = JSON.parse(rawdata);
                    $("#game_value").val(data["credits"]);
                });
            }

            function getFree() {
                $.post("gameserver.php",{"action":"getFree"} ,()=>{
                    update();
                });
            }

            function logout() {
                $.post("gameserver.php",{"action":"logout"} ,()=>{
                    window.open("index.php","_self")
                });
            }

            function stakeAdd(x) {
                let oldStake = $("#game_stake").val();
                let newStake = Number(oldStake) + x;
                $("#game_stake").val( newStake );
            }

            function stakeRem(x) {
                let oldStake = $("#game_stake").val();
                let newStake = oldStake - x;
                $("#game_stake").val( newStake );
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
                $.post("gameserver.php",{"action":"play", "stake": stake} ,(rawData)=>{
                    console.log(rawData);
                    update();
                    let data = JSON.parse(rawData); // roleOne, roleTwo, roleThree, WinAmount
                    document.getElementById("game_slot1").value = data[0];
                    document.getElementById("game_slot2").value = data[1];
                    document.getElementById("game_slot3").value = data[2];
                    document.getElementById("game_win").value = data[3];
                });
            }
        </script>
    </head>
    <body>
        <input id="game_username" value="<?php echo $data["username"]; ?>" disabled>
        <input id="game_value" value="<?php echo $data["credits"]; ?>" disabled>
        <input id="game_stake" value="5" type="number" disabled>;
        <input id="game_slot1" disabled>
        <input id="game_slot2" disabled>
        <input id="game_slot3" disabled>
        <input id="game_win" disabled>
        <button onclick="stakeAdd(1);">Einsatz +</button>
        <button onclick="stakeRem(1);">Einsatz -</button>
        <button onclick="play();">Spielen</button>
        <button onclick="getFree();" <?php echo "disabled"; ?>>Freebee Kepie</button>
        <button onclick="logout();">Ausloggen</button>
    </body>
</html>