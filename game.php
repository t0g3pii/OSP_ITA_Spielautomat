<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
            function update() {
                $.post("gameserver.php", (data)=>{
                    console.log(data);
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
        <button>Freebee Kepie</button>
        <button>Ausloggen</button>
    </body>
</html>


<!-- echo $_SESSION["UUID"]; -->
<!-- <?php
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
?> -->