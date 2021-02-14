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
            function update() {
                $.post("gameserver.php",{"action":"getData"} ,(rawdata)=>{
                    let data = JSON.parse(rawdata);
                    $("#game_username").val(data["username"]);
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
        </script>
    </head>
    <body>
        <input id="game_username" value="<?php echo $data["username"]; ?>">
        <input id="game_value" value="<?php echo $data["credits"]; ?>">
        <input id="game_stake" value="5" type="number">;
        <input id="game_slot1">
        <input id="game_slot2">
        <input id="game_slot3">
        <input id="game_win">
        <button onclick="stakeAdd(1);">Einsatz +</button>
        <button onclick="stakeRem(1);">Einsatz -</button>
        <button>Spielen</button>
        <button onclick="getFree();" <?php echo "disabled"; ?>>Freebee Kepie</button>
        <button onclick="logout();">Ausloggen</button>
    </body>
</html>