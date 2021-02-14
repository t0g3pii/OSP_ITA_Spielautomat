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
echo json_encode($data);
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
        </script>
    </head>
    <body>
        <input id="game_username">
        <input id="game_value">
        <input id="game_slot1">
        <input id="game_slot2">
        <input id="game_slot3">
        <input id="game_win">
        <button>Einsatz +</button>
        <button>Einsatz -</button>
        <button>Spielen</button>
        <button onclick="getFree();">Freebee Kepie</button>
        <button>Ausloggen</button>
    </body>
</html>


<!-- echo $_SESSION["UUID"]; -->
 -->